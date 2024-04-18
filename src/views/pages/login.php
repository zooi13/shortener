<?php
$activMenu = 'login';
require "views/pages/maket/header.php";

if (isset($_SESSION['user_id'])){
    echo '<script>window.location.href = "/home"</script>';
}

?>
    <div class="container">
        <div class="container p-3 w-50 mx-auto">
            <h2>Авторизация:</h2>
            <form action="" class="login-form">
                <div class="row g-3">
                    <div class="col-9">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input id="form-login-name" type="text" class="form-control" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row g-3">
                    <div class="col-6">
                        <input id="form-login-password" type="password" class="form-control" id="validationDefault05" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-secondary mb-3">Авторизация</button>
                    </div>
                    <div id="validationServerUsernameFeedback" style="color: red" class="log-pas-error">

                    </div>
                </div>
                <div class="row g-3">
                    <a href="/register">Регистрация</a>
                </div>
            </form>
        </div>
    </div>
<?php
require "views/pages/maket/footer.php";