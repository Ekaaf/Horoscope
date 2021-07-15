$(document).ready(function() {
    $("#yearForm").validate({
        rules: {
            year: "required"
        },
        // Specify validation error messages
        messages: {
            year: "Please select year"
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#horoscopeForm").validate({
        rules: {
            zodiac_id: "required",
            year: "required"
        },
        // Specify validation error messages
        messages: {
            zodiac_id: "Please select your zodiac sign",
            year: "Please select year"
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
