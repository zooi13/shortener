<?php
$activMenu = 'login';
require "views/pages/maket/header.php";

require_once "app/Services/DB.php";
require_once "app/Services/LinksDB.php";
require_once "views/pages/action/helper.php";

$arr = [];
if (isset($_SESSION['user_id'])){
    $db = new DB();
    $arr = LinksDB::getLinksUser($_SESSION['user_id'], $db);
}else{
    echo '<script>window.location.href = "/"</script>';
}
?>

    <div class="row pt-3">
        <div class="col" >
            <div class="container p-3 w-50 mx-auto">
                <div class="row">
                    <table class="table table-striped" style="width: 1000px">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ссылка</th>
                            <th scope="col">Короткая ссылка</th>
                            <th scope="col">Переходы</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($arr as $link){?>
                            <tr>
                                <th scope="row"><?= $link['id']?></th>
                                <td><?= $link['url']?></td>
                                <td><a class="link-secondary" href="http:/<?= $link['url_key']?>"><p className="h4" id="valueLink"><?= $link['url_key']?></p></a></td>
                                <td><?= $link['count']?></td>
                                <td id="activeLabel_<?= $link['id']?>"><p><?php if ($link['action'] === 1){echo 'Активная';}else{echo 'НЕ активная';}?></p></td>
                                <td id="linkA_<?= $link['id']?>" style="<?php if ($link['action'] === 1){echo 'display: none';}?>"><div onclick="linkActivate(<?= $link['id']?>)" class="btn btn-outline-secondary">Активировать</div></td>
                                <td id="linkD_<?= $link['id']?>" style="<?php if ($link['action'] === 0){echo 'display: none';}?>"><div onclick="linkDeactivate(<?= $link['id']?>)" class="btn btn-outline-secondary">Деактивировать</div></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
require "views/pages/maket/footer.php";