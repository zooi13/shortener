<?php
require_once "app/Services/DB.php";
class LinksDB
{
    public static function countUpgrade($url, $db)
    {
        //Возвращает url_key из url
        $params = [
            'url' => $url,
        ];
        $arr = $db->query('SELECT id, count FROM `links` WHERE url = :url', $params);

        $params = [
            'id' => $arr[0]['id'],
            'count' => $arr[0]['count'] + 1,
        ];
        $db->query('UPDATE `links` SET count = :count WHERE id = :id', $params);
    }
    public static function getShortLink($url, $db)
    {
        //Возвращает url_key из url
        $params = [
            'url' => $url,
        ];
        return $db->query('SELECT url_key FROM `links` WHERE url = :url', $params)['0']['url_key'];
    }

    public static function getLink($url_key, $db)
    {
        //Возвращает url_key из url
        $params = [
            'url_key' => $url_key,
        ];

        $arr = $db->query('SELECT url, action FROM `links` WHERE url_key = :url_key', $params);
        if ($arr === []){
            return false;
        }else{
            return $arr['0'];
        }
    }

    public static function getLinksUser($user_id, $db)
    {
        //Возвращает url_key из url
        $params = [
            'user_id' => $user_id,
        ];

        $arr = $db->query('SELECT * FROM `links` WHERE user_id = :user_id', $params);
        return $arr;
//        if ($arr === []){
//            return false;
//        }else{
//            return $arr['0']['url'];
//        }
    }

    public static function checkUrlKey($url, $db)
    {
        //Возвращает true если можно добавить данный  link
        $params = [
            'url_key' => $url,
        ];
        $arr = $db->query('SELECT id FROM `links` WHERE url_key = :url_key', $params);
        if ($arr === []) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUrl($url, $db)
    {
        //Возвращает true если можно добавить данный  link
        $params = [
            'url' => $url,
        ];
        $arr = $db->query('SELECT id FROM `links` WHERE url = :url', $params);
        if ($arr === []) {
            return true;
        } else {
            return false;
        }
    }

    public static function linkDeactivate($id, $db)
    {
        $params = [
            'id' => $id,
            'action' => 0,
        ];

        $db->query('UPDATE `links` SET action = :action WHERE id = :id', $params);
    }

    public static function linkActivate($id, $db)
    {
        $params = [
            'id' => $id,
            'action' => 1,
        ];

        $db->query('UPDATE `links` SET action = :action WHERE id = :id', $params);
    }
}