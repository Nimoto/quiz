function init() {
    $('.emulate').on('click', function () {
        var error = false;

        $('.required').removeClass('error');

        var minDiff = Number($('#minDiff').val());
        var maxDiff = Number($('#maxDiff').val());


        if (minDiff >= maxDiff
            || maxDiff < 0
            || maxDiff > 100
            || minDiff < 0
            || minDiff > 100
        ) {
            $('#minDiff').addClass('error');
            $('#maxDiff').addClass('error');
            error = true;
        }

        if ($('#userIQ').val() < 0
            || $('#userIQ').val() > 100
        ) {
            $('#userIQ').addClass('error');
            error = true;
        }

        $.each($('.required'), function (i, item) {
            if ($(item).val() == '') {
                $(item).addClass('error');
                error = true;
            }
        });

        if (!error) {
            $.ajax({
                method: 'post',
                url: '/?action=emulate',
                data: {maxDiff: $('#maxDiff').val(), minDiff: $('#minDiff').val(), userIQ: $('#userIQ').val()},
                success: function (msg) {
                    $('.ajax-field').html(msg);
                    init();
                }
            });
        }
    });
}

$(document).ready(function () {
    init();
});