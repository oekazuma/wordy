<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/UserDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Favorite.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/FavoriteDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'mypage/mypage.tpl';

if (loginCheck()) {
    header("Location: /wordy/index.php");
}
else {
	if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];
        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }

    $favList = [];

    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $favDAO = new FavoriteDAO($db);

        $favList = $favDAO->findFav($_SESSION['id']);
        $smarty->assign('favList', $favList);
        $smarty->assign('wordDAO', $wordDAO);

        if (isset($_SESSION['name'])) {
            $smarty->assign('loginName', $_SESSION['name']);
        }

    } catch (PDOException $ex) {
        print_r($ex);

        $smarty->assign('errorMsg', 'DB接続に失敗しました。');

        $tplPath = 'error.tpl';
    } finally {
        $db = null;
    }
}

$smarty->display($tplPath); 