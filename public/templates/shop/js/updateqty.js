$(document).ready(function() {
    $('.update').click(function () {
        var rowid = $(this).attr('id');
        var qty   = $(this).parent().find('.qty').val();
        var token = $("input[name='_token']").val();
        var button = 'rowid'+rowid;
        $.ajax({
            url: 'update/'+rowid+'/'+qty,
            type: 'GET',
            cache:false,
            data:{
                "_token":token,
                'id':rowid,
                'qty'  : qty,
            },
            success: function (data) {
                const obj = JSON.parse(data);
               $('#'+button).html(obj.amountProduct);
               $('#subtotal').html(obj.subtotal);
               $('#tax').html(obj.tax);
               $('#total').html(obj.total);
            }
        });
    });
});