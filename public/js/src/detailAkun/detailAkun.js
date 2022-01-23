
$(document).ready(function(){
    $('#closeTambahAlamat').click(function () {
        $('#tambahAlamat').css('display','none');
    });
    $('#closeUbahAlamat').click(function () {
        $('#ubahAlamat').css('display','none');
    });
    $('#closeTambahCreditDebit').click(function () {
        $('#tambahCreditDebit').css('display','none');
    });

    $('#provinsi').on('change',function () {
        let _token = $('meta[name="_token"]').attr('content');
        $.ajax({
            url: "/getKota",
            type:"POST",
            data:{
                provinsi:this.value,
                _token: _token
            },
            success:function(response){
                // console.log(response);
                $('#kota').empty();
                $('#kota').append('<option value="" disabled selected hidden>Pilih Kota/Kabupaten</option>');
                $('#kecamatan').empty();
                $('#kecamatan').append('<option value="" disabled selected hidden>Pilih Kecamatan</option>');
                $.each(response, function(key, value) {
                    $('#kota').append('<option value="'+value+'">'+key+'</option>');
                });
            },
            error: function(error) {
                // console.log(error);
            }
        });
    });

    $('#kota').on('change',function () {
        let _token = $('meta[name="_token"]').attr('content');
        // console.log(this.value);
        $.ajax({
            url: "/getKecamatan",
            type:"POST",
            data:{
                kabupaten:this.value,
                _token: _token
            },
            success:function(response){
                // console.log(response);
                $.each(response, function(key, value) {
                    $('#kecamatan').append('<option value="'+value+'">'+key+'</option>');
                });
            },
            error: function(error) {
                // console.log(error);
            }
        });
    });

    $('#ubahProvinsi').on('change',function () {
        let _token = $('meta[name="_token"]').attr('content');
        $.ajax({
            url: "/getKota",
            type:"POST",
            async: false,
            global: false,
            data:{
                provinsi:this.value,
                _token: _token
            },
            success:function(response){
                // console.log(response);
                $('#ubahKota').empty();
                $('#ubahKota').append('<option value="" disabled selected hidden>Pilih Kota/Kabupaten</option>');
                $('#ubahKecamatan').empty();
                $('#ubahKecamatan').append('<option value="" disabled selected hidden>Pilih Kecamatan</option>');
                $.each(response, function(key, value) {
                    $('#ubahKota').append('<option value="'+value+'">'+key+'</option>');
                });
            },
            error: function(error) {
                // console.log(error);
            }
        });
    });

    $('#ubahKota').on('change',function () {
        let _token = $('meta[name="_token"]').attr('content');
        // console.log(this.value);
        $.ajax({
            url: "/getKecamatan",
            type:"POST",
            async: false,
            global: false,
            data:{
                kabupaten:this.value,
                _token: _token
            },
            success:function(response){
                // console.log(response);
                $.each(response, function(key, value) {
                    $('#ubahKecamatan').append('<option value="'+value+'">'+key+'</option>');
                });
            },
            error: function(error) {
                // console.log(error);
            }
        });
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
function popupUbahAlamat(id) {
    $('#ubahAlamat').css('display','flex');
    let _token = $('meta[name="_token"]').attr('content');
    $('#ubahId').val(id);
    let info;

    $.ajax({
        url: "/getDetail",
        async: false,
        global: false,
        type:"POST",
        data:{
            id:id,
            _token: _token
        },
        success:function(response){
            // console.log(response);
            info = {
                'provID':response.address_provinsi_id,
                'kabId':response.address_kabupaten_id,
                'kecId':response.address_kecamatan_id
            };
            $('#ubahFullname').val(response.fullname);
            $('#ubahPhoneNumber').val(response.phone_number);
            $('#ubahLabelAlamat').val(response.address_label);
            $('#ubahKodePos').val(response.kode_pos);
            $('#ubahDetilAlamat').val(response.address_detail);
            $('#ubahNote').val(response.note);
        },
        error: function(error) {
            // console.log(error);
        }
    });
    $.ajax({
        url: "/getProvinsi",
        type:"GET",
        async: false,
        global: false,
        data:{
            _token: _token
        },
        success:function(response){
            // console.log(response);
            $.each(response, function(key, value) {
                $('#ubahProvinsi').append('<option value="'+key+'">'+value+'</option>');
            });
            $("#ubahProvinsi").val(info.provID).change();
        },
        error: function(error) {
            // console.log(error);
        }
    });
    $.ajax({
        url: "/getKota",
        type:"POST",
        async: false,
        global: false,
        data:{
            provinsi:info.provID,
            _token: _token
        },
        success:function(response){
            // console.log(response);
            $.each(response, function(key, value) {
                $('#ubahKota').append('<option value="'+value+'">'+key+'</option>');
            });
            $("#ubahKota").val(info.kabId).change();
        },
        error: function(error) {
            // console.log(error);
        }
    });
    $.ajax({
        url: "/getKecamatan",
        type:"POST",
        async: false,
        global: false,
        data:{
            kabupaten:info.kabId,
            _token: _token
        },
        success:function(response){
            // console.log(response);
            $.each(response, function(key, value) {
                $('#ubahKecamatan').append('<option value="'+value+'">'+key+'</option>');
            });
            $("#ubahKecamatan").val(info.kecId).change();
        },
        error: function(error) {
            // console.log(error);
        }
    });

}


function popupTambahCreditDebit() {
    $('#tambahCreditDebit').css('display','flex');
}

function bukaBagian(angka){
    $('[id^=content]').css('display', 'none');
    $('#content'+angka).css('display', 'block');
}


