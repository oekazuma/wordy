<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Favorite.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/FavoriteDAO.class.php';

$ster = $_GET['ster'];
$word = $_GET['word'];
$user = $_GET['user'];
$id = $_GET['id'];

$sters = new Favorite();
$sters->setWord($word);
$sters->setUserId($user);
$sters->setWordId($id);

if ($ster == 'on') {
    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $FavoriteDAO = new FavoriteDAO($db);

        $FavoriteDAO->insert($sters);

    } catch (PDOException $ex) {
            var_dump($ex);
    } finally {
            $db = null;
    }
    $_SESSION['flashMsg'] = 'お気に入りに追加しました。';
}

if ($ster == 'off') {
    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $FavoriteDAO = new FavoriteDAO($db);

        $FavoriteDAO->delete($sters);

    } catch (PDOException $ex) {
            var_dump($ex);
    } finally {
            $db = null;
    }
}

header("Location:/wordy/word/showDetail.php?wordId=".$id."&word=".$word);

