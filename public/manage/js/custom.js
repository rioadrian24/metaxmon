$(".select2").select2();

$(".input-tag").keyup(function () {
    $val = $(this).val();
    modified_val = $val.replace(" ", "").toLowerCase();
    $(".input-tag").val(modified_val);
});

$(".dropify").dropify();
