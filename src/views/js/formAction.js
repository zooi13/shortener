$( document ).ready(function() {
    $('#linkBlock').attr("style", "display: none");
});

//Сокращение ссылки
$('.short-form').submit(function (e){
    e.preventDefault();
    let th = $(this);
    let linkBlock = $('.link-bloc');

    $.ajax({
        url: 'action/short',
        method: 'POST',
        data: th.serialize(),
        success: function(data) {
            let result = ('<a className="link-secondary" href="http:' + data + '"><p className="h4" id="valueLink">http://localhost:8000/' + data + '</p></a>');
            $('#div-a').empty();
            $('#div-a').append(result);
            $('#linkBlock').attr("style", "");
        }
    });
})

$('#copy-button').click(function (){
    var value = $('#valueLink').text();
    var input = $('<textarea>').val(value).appendTo('body').select();
    document.execCommand('copy');
    input.remove();

    alert('Ссылка скопирована');
})



//Авторизация

$('.register-form').submit(function (e){
    e.preventDefault();
    $('#login-register  ').attr("class", "form-control");
    let login = $('#login-register').val()
    $.ajax({
        url: 'action/checkLogin',
        method: 'POST',
        data: {
            login: login,
        },
        success: function(data) {
            if (data === '+'){
                //Логин уникален
                $('.reg-pas-error').empty();
                $('#password').attr("class", "form-control");
                $('#dublePassword').attr("class", "form-control");

                let pas1 = $('#password').val()
                let pas2 = $('#dublePassword').val()
                if (pas1 === pas2){
                    let arr = validatePassword(pas1)
                    if (arr[0] === false){
                        errAdd(arr[1])
                        $('#password').attr("class", "form-control is-invalid");
                        $('#dublePassword').attr("class", "form-control is-invalid");
                    }else {
                        console.log('Регистрация')
                        registerUser(login, pas1)
                        window.location.href = "/login";
                    }
                }else {
                    errAdd('Пароли не совпадают')
                    $('#password').attr("class", "form-control is-invalid");
                    $('#dublePassword').attr("class", "form-control is-invalid");
                }
            }else {
                $('#login-register').attr("class", "form-control is-invalid");
            }
        }
    });
})

function registerUser(login, password){
    $.ajax({
        url: 'action/regUser',
        method: 'POST',
        data: {
            login: login,
            password: password,
        },
        success: function(data) {
            console.log(data)
        }
    });
}
function errAdd(message){
    $('.reg-pas-error').empty();
    $('.reg-pas-error').append('<p>'+ message +'</p>');
}

function validatePassword(str) {
    if (typeof str !== 'string') {
        return [false, 'Ошибка валидации'];
    }
    if (str.length < 8) {
        return [false, 'Длина пароля: минимум 8 символов'];
    }
    if (str.search(/[a-z]/) === -1) {
        return [false, 'Пароль должен иметь один строчны символ'];
    }
    if (str.search(/[A-Z]/) === -1) {
        return [false, 'Пароль должен иметь один заглавный символ'];
    }
    if (str.search(/[0123456789]/) === -1) {
        return [false, 'Пароль должен иметь цифры'];
    }
    return [true];
}




$('.login-form').submit(function (e){
    e.preventDefault();
    let login = $('#form-login-name').val();
    let password = $('#form-login-password').val();
    $.ajax({
        url: 'action/logUser',
        method: 'POST',
        data: {
            login: login,
            password: password,
        },
        success: function(data) {
            console.log(data)
            if (data === 'error'){
                $('.log-pas-error').empty();
                $('.log-pas-error').append('<p>Некорректные данные</p>');
            }else {
                window.location.href = "/home";
            }
        }
    });
})


function linkDeactivate(id){
    $.ajax({
        url: 'action/deactivateLink',
        method: 'POST',
        data: {
            id: id,
        },
        success: function(data) {
            $('#activeLabel_'+id).empty();
            $('#activeLabel_'+id).append('<p>НЕ активная</p>');
            $('#linkA_'+id).attr("style", "");
            $('#linkD_'+id).attr("style", "display: none");
        }
    });
}

function linkActivate(id){
    $.ajax({
        url: 'action/activateLink',
        method: 'POST',
        data: {
            id: id,
        },
        success: function(data) {
            $('#activeLabel_'+id).empty();
            $('#activeLabel_'+id).append('<p>Активная</p>');
            $('#linkA_'+id).attr("style", "display: none");
            $('#linkD_'+id).attr("style", "");
        }
    });
}