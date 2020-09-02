$(document).ready(function(){
    //terms and conditions need
    // jQuery.validator.addMethod("lettersonly", function(value, element) {
    //     return this.optional(element) || /^[a-z а-я]+$/i.test(value);
    // }, "Letters only please");
    jQuery.validator.addMethod("lettersonly", function( value, element ) {
        var regex = new RegExp("[.,\/#!$%\^&\*;:{}=\-_`~()0-9]+$");
        var key = value;

        if (regex.test(key)) {
            return false;
        }
        return true;
    }, "Пожалуйста, используйте только буквенные символы");
    jQuery.validator.addMethod("inn", function( value, element ) {
        var iin = value;
        if (!iinCheck(iin)) {
            return false;
        }
        return true;
    }, "ИИН не правильный");
    jQuery.validator.addMethod("mins", function( value, element ) {
        var mins = value;
        var i= mins.length-mins.replace(/\d/gm,'').length;
        if ((i < 11)) {
            return false;
        }
        return true;
    }, "Пожалуйста, введите полностью номер");
    $('.form').validate({
        rules: {
            'Register[tin]': {
                required: true,
                minlength: 12,
                maxlength: 12,
                number: true,
                inn: true
            },
            'Register[phone]': {
                required: true,
                mins: true,
            },
            'Register[email]': {
                required: true,
                email: true
            },
            'Register[surname]': {
                required: true,
                lettersonly: true
            },
            'Register[name]': {
                required: true,
                lettersonly: true
            },
            'Register[residence]': {
                required: true,
                lettersonly: true
            },
        },
        messages: {
            'Register[tin]': {
                number: "Пожалуйста, введите полностью ИИН",
                required: "Пожалуйста, введите полностью ИИН"
            },
            'Register[phone]': {
                required: "Пожалуйста, введите полностью номер"
            },
            'Register[email]': {
                required: "Введите e-mail!",
                email: "Адрес должен быть вида name@domain.com"
            },
            'Register[surname]': {
                required: "Пожалуйста, введите фамилию"
            },
            'Register[name]': {
                required: "Пожалуйста, введите имя",
            },
            'Register[residence]': {
                required: "Пожалуйста, введите место проживания",
            },
        }
    });



    $.each($('input#phone1'), function (index, val) {
        $(this).focus(function () {
            $(this).inputmask("+7 (799) 999-99-99");
        });
    });
});