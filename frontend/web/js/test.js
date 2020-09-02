$(document).ready(function(){
    //terms and conditions need
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
                required: true
            },
            'Register[name]': {
                required: true,
            },
            'Register[residence]': {
                required: true,
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
});