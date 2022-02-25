$(document).ready(function () {
    $(document).on('click', 'button[data-role=delete]', function () {

        let _token = $('meta[name="_token"]').attr('content');
        var cart_item_id = $(this).data('id');

        $.ajax({
            url: '/cart/delete',
            method: 'post',
            data: {
                cart_item_id: cart_item_id,
                _token: _token
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // console.log(response);
                location.reload();
            }
        });
    });
});
