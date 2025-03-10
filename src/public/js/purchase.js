
$(document).ready(function () {
    $('#select').change(function () {
        var selectedValue = $(this).val();
        $('#paymentConfirm').text(selectedValue);
    });
});