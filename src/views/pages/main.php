<?php
$activMenu = 'home';
require "views/pages/maket/header.php";
?>

<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class="container p-3 w-50 mx-auto">
                <form class="row g-3 short-form" action="action/short" method="post">
                    <div class="col-5">
                        <h2>Сократитель</h2>
                    </div>
                    <div class="col-5">
                        <input type="text" name="link" class="form-control" placeholder="Введите ссылку">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-secondary mb-3">Сократить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row link-bloc pt-3" id="linkBlock">
        <hr class="pb-3">
        <div class="col" >
            <div class="container p-3 w-50 mx-auto">
                <div class="row g-3">
                    <div class="col-5">
                        <h2>Ваша ссылка:</h2>
                    </div>
                    <div class="col-5" id="div-a">

                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-outline-secondary mb-3" id="copy-button">Копировать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "views/pages/maket/footer.php";