$("document").ready(function () {
    popup();
});
function popup() {
    console.log($("select[name='Slides[display_order]']").val());
    if ($("select[name='Slides[display_order]']").val() != null) {
        $("input[id='set-number-people-1']").attr('checked', 'checked');
    } else {
        $("select[name='Slides[display_order]']").hide();
        $("input[id='set-number-people-0']").attr('checked', 'checked');
    }
    if ($(".set_number_people-0").on('click', function () {
            $("select[name='Slides[display_order]']").hide();
        }));
    if ($(".set_number_people-1").on('click', function () {
            $("select[name='Slides[display_order]']").show();
        }));
}
function get_slide_ajax(){
    $("select[name='table_name']").on('change', function () {
        if ($(this).val()) {
            $.ajax({
                url: BASE_URL + 'admin/slides/getAjax',
                data: {
                    'model_index': $(this).val(),
                },
                dataType: 'JSON',
                type: 'POST',
                success: function (data) {
                    $('#appendRecord').empty();
                    $.each(data, function (key, value) {
                        $('#appendRecord').append("<option value='" + key + "'>" + value + "</option>")
                    });
                }
            })
        }
    });
}