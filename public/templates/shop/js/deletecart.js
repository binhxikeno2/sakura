/*
$(document).ready(function() {
    $('.delete').click(function () {
        var rowid = $(this).attr('id');
        var token = $("input[name='_token']").val();
        $.ajax({
            url: 'delCart/'+rowid,
            type: 'GET',
            cache:false,
            data:{
                "_token":token,
                'id':rowid,

            },
            success: function (data) {
                $('#product').html(data);
            }
        });
    });
});*/
