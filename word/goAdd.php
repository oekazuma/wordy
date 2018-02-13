<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Genre.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/GenreDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'word/add.tpl';

if (loginCheck()) {
    header("Location: /wordy/index.php");
} else {
    if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];
        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }

    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $genreDAO = new GenreDAO($db);

        $genreList = $genreDAO->findAll();

        $smarty->assign('word', new Word());
        $smarty->assign('genreList', $genreList);

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