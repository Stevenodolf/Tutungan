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