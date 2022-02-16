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
            $('#buttonDropdownKeranjang').click();
        },
        mouseleave: function () {
            $('#buttonDropdownKeranjang').click();
        }
    });
    $("#parentDropdownNotifikasi").on({
        mouseenter: function () {
            $('#buttonDropdownNotif').click();
        },
        mouseleave: function () {
            $('#buttonDropdownNotif').click();
        }
    });
    $("#parentDropdownProfil").on({
        mouseenter: function () {
            $('#buttonDropdownUser').click();
        },
        mouseleave: function () {
            $('#buttonDropdownUser').click();
        }
    });

    getProfilePicture();

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

function getProfilePicture() {
    // let _token = $('meta[name="_token"]').attr('content');

    var image_name = user_image;

    $.ajax({
        url: '/getprofilepicture',
        method: 'get',
        data: {
            image_name: image_name,
            // _token: _token
        },
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        success: function (response) {
            console.log(response);

            if(image_name) {
                $('#user_image').attr('src', URL.createObjectURL(image_name));
            }
            // location.reload();

        }
    });
}
