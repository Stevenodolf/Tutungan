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
window.addEventListener('beforeunload', (event) => {
    event.returnValue = `Are you sure you want to leave?`;
});

// const data = JSON.stringify()

window.addEventListener('beforeunload', ev => {
    console.log(ev);
    deleteUnusedPayment(ev);
})

function deleteUnusedPayment(ev) {
    let url = '/deletepayment/' + payment.id;
    // let data = JSON.stringify({ departure: 'hahaha' });
    let data = 'hahaha';

    console.log(url);
    navigator.sendBeacon(url);
    console.log(data);
}
