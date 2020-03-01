$(document).ready(function() {
    $('#giftcode').click(function () {
        var giftcode   = $(this).parent().find('#inputcode').val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: 'giftcode',
            type: 'POST',
            cache:false,
            data:{
                "_token":token,
                "giftcode":giftcode
            },
            success: function (data) {
                $('#result').html(data);
            }
        });
    });
});