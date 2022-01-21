
$(document).ready(function(){
    $('#closeTambahAlamat').click(function () {
        $('#tambahAlamat').css('display','none');
    });
    $('#closeTambahCreditDebit').click(function () {
        $('#tambahCreditDebit').css('display','none');
    });
});

function inputChange() {
    const [file] = $('#inputProfil').prop('files');
    if (file) {
        $('#fotoProfil').attr('src',URL.createObjectURL(file));
    }
}

function popupTambahAlamat() {
    $('#tambahAlamat').css('display','flex');
}
function popupTambahCreditDebit() {
    $('#tambahCreditDebit').css('display','flex');
}

function bukaBagian(angka){
    $('[id^=content]').css('display', 'none');
    $('#content'+angka).css('display', 'block');
}


