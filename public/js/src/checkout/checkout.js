$(document).ready(function () {
    $('#closePopup').click(function () {
        $('#blackContainer').css('display','none');
    });
    $('#pilihPembayaran').click(function () {
        $('#blackContainer').css('display','flex');
        $('#paymentPopup').css('display','block');
    });
    $('#bayar').click(function () {
        $('#paymentPopup').css('display','none');
        $('#pembayaranVerifikasi').css('display','flex');
    });
    $('#kembaliBeranda').click(function () {
        $('#pembayaranVerifikasi').css('display','none');
        $('#blackContainer').css('display','none');
    });

    var didCheckout = 0;
    var didTryToExit = 0;

    $('#kembaliBeranda').on('click', function () {
        didCheckout = 1;

        if(didTryToExit == 1) {
            let _token = $('meta[name="_token"]').attr('content');
            var payment_id = payment.id;

            $.ajax({
                url: '/undeletepayment',
                method: 'post',
                data: {
                    id: payment_id,
                    _token: _token
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });

    $(window).on('beforeunload', function () {
        let _token = $('meta[name="_token"]').attr('content');
        var payment_id = payment.id;

        if(didCheckout == 0) {
            setTimeout(function() {
                setTimeout(function() {
                    console.log('exit cancelled');
                    return undefined;
                }, 1);
            },1);

            $.ajax({
                url: '/deletepayment',
                method: 'post',
                data: {
                    id: payment_id,
                    _token: _token
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                }
            });

            didTryToExit = 1;
            return `Are you sure you want to cancel the checkout?`;
        } else {
            return undefined;
        }
    });
});

// window.onbeforeunload = notificationSession;
// function notificationSession() {
//     $.ajax({
//         url: "/notifikasi",
//         async: false,
//         type: "POST",
//     });
//
//     return undefined;
// }

// Prompt before unload
// window.addEventListener('beforeunload', (event) => {
//     event.returnValue = `Are you sure you want to leave?`;
// });

// const data = JSON.stringify()

// window.addEventListener('beforeunload', ev => {
//     console.log(ev);
//     deleteUnusedPayment(ev);
// })
//
// function deleteUnusedPayment(ev) {
//     let url = '/deletepayment/' + payment.id;
//     // let data = JSON.stringify({ departure: 'hahaha' });
//     let data = 'hahaha';
//
//     console.log(url);
//     navigator.sendBeacon(url);
//     console.log(data);
// }
