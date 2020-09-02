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
    $('.form').validate({
        rules: {
            'Register[tin]': {
                required: true,
                minlength: 12,
                maxlength: 12,
                number: true
            },
            'Register[phone]': {
                required: true
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
    // alert("Для продолжения регистрации необходимо дать согласие на обработку персональных данных");
});