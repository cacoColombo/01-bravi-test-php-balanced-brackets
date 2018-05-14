$.validator.setDefaults({
    ignore        : "",
    errorElement  : 'div',
    errorPlacement: function (error, element) {
        error.insertAfter(element);
    },
    invalidHandler: function (form, validator) {
        if (!validator.numberOfInvalids()) {
            return;
        }
        $('html, body').animate({
            scrollTop: $(validator.errorList[0].element).offset().top - $('header').height() - 20
        }, 500);
    }
});

$(function() {
    $("#formCheck").validate({
        rules: {
            brackets: {
               required: true
            }
        },
        messages: {
            brackets: {
                required: "Please, input a string of brackets."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});