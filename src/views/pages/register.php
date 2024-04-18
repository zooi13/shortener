<?php
$activMenu = 'login';
require "views/pages/maket/header.php";

if (isset($_SESSION['user_id'])){
    echo '<script>window.location.href = "/home"</script>';
}
?>
    <div class="container">
        <div class="container p-3 w-50 mx-auto">
            <h2>Регистрация:</h2>
            <form action="" class="register-form">
                <div class="row g-3">
                    <div class="col-9">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="login-register" type="text" class="form-control" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="basic-addon1" required>
<!--                            <input type="text" class="form-control is-invalid" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="basic-addon1">-->
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Данное имя занято
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <label for="validationDefault05" class="form-label">Пароль:</label>
                    <div class="col-6">
                        <input type="password" class="form-control" id="password" required>
                    </div>
                </div>

                <br>
                <div class="row g-3">
                    <div class="col-6">
                        <input type="password" class="form-control" id="dublePassword" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-secondary mb-3">Регистрация</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div id="validationServerUsernameFeedback" style="color: red" class="reg-pas-error">

                    </div>
                </div>
                <div class="row g-3">
                    <a href="/login">Авторизация</a>
                </div>
            </form>
        </div>
    </div>
<?php
require "views/pages/maket/footer.php";