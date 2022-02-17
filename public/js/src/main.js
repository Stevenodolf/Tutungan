$(document).ready(function () {
    $('#closeLogin').click(function () {
        $('#blackContainer').css('display','none');
    });

    // $('#buttonLogin').click(function () {
    //     $('#blackContainer').css('display','flex');
    //     //Kosongin Form
    //     $('#email').val('');
    //     $('#password').val('');
    //     //Ubah warna button jadi default state nya
    //     $('.buttonMasuk').css({background:'rgba(49, 53, 59, 0.15)'})
    //     $('.buttonMasuk').css({color:'rgba(49, 53, 59, 0.6)'})
    // });

    $("#email, #password").on("input", function () {
        canChangeColor();
    });

    function canChangeColor(){

        let can = true;

        $("#email, #password").each(function(){
            if($(this).val()==''){
                can = false;
            }
        });

        if(can){
            $('.buttonMasuk').css({background:'#FFD901'})
            $('.buttonMasuk').css({color:'black'})
        }else{
            $('.buttonMasuk').css({background:'rgba(49, 53, 59, 0.15)'})
            $('.buttonMasuk').css({color:'rgba(49, 53, 59, 0.6)'})
        }
    }
    $("#parentDropdownKeranjang").on({
        mouseenter: function () {
            $('#dropdownKeranjang').css('display','block');
        },
        mouseleave: function () {
            $('#dropdownKeranjang').css('display','none');
        }
    });
    $("#parentDropdownNotifikasi").on({
        mouseenter: function () {
            $('#dropdownNotif').css('display','block');
        },
        mouseleave: function () {
            $('#dropdownNotif').css('display','none');
        }
    });
    $("#parentDropdownProfil").on({
        mouseenter: function () {
            $('#dropdownList').css('display','block');
        },
        mouseleave: function () {
            $('#dropdownList').css('display','none');
        }
    });

    if(user_image != "0") {
        getProfilePicture(user_image);
    }

});

function openLoginPopup () {
    $('#blackContainer').css('display','flex');
    //Kosongin Form
    $('#email').val('');
    $('#password').val('');
    //Ubah warna button jadi default state nya
    $('.buttonMasuk').css({background:'rgba(49, 53, 59, 0.15)'})
    $('.buttonMasuk').css({color:'rgba(49, 53, 59, 0.6)'})
}

function openUserDropdown() {
    if($('#dropdownList').css('display') === "block"){
        $('#dropdownList').css('display','none');
    }else{
        $('#dropdownList').css('display','block');
        $('#dropdownNotif').css('display','none');
        $('#dropdownKeranjang').css('display','none');
    }
}

function openNotifDropdown() {
    if($('#dropdownNotif').css('display') === "block"){
        $('#dropdownNotif').css('display','none');
    }else{
        $('#dropdownNotif').css('display','block');
        $('#dropdownKeranjang').css('display','none');
        $('#dropdownList').css('display','none');
    }
}

function openKeranjangDropdown() {
    if($('#dropdownKeranjang').css('display') === "block"){
        $('#dropdownKeranjang').css('display','none');
    }else{
        $('#dropdownKeranjang').css('display','block');
        $('#dropdownList').css('display','none');
        $('#dropdownNotif').css('display','none');
    }
}

function getProfilePicture(image_name) {
    $('#user_image').attr('src', image_name);
}
