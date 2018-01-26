<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/WordDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'word/list.tpl';

if (loginCheck()) {
    header("Location: /wordy/index.php");
} else {
    if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];

        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }

    cleanSession();

    $linePerPage = 10;
    $pageNo = 1;

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $pageNo = $_GET['page'];
    }

    $offset = $linePerPage * ($pageNo - 1);

    $wordList = [];

    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $wordDAO = new WordDAO($db);

        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $smarty->assign('keyword', $keyword);
            $wordList = $wordDAO->findByWordKeyword($keyword);
            $count = $wordDAO->countKeyword($keyword);
            $totalPage = ceil($wordDAO->count() / $linePerPage);
            $smarty->assign('wordList', $wordList);
            $smarty->assign('wordDAO', $wordDAO);
            $smarty->assign('totalPage', $totalPage);
            $smarty->assign('pageNo', $pageNo);
            $smarty->assign('count', $count);
        } else {
            $totalPage = ceil($wordDAO->count() / $linePerPage);
            $wordList = $wordDAO->wordsRow($linePerPage,$offset);
            $smarty->assign('wordList', $wordList);
            $smarty->assign('wordDAO', $wordDAO);
            $smarty->assign('totalPage', $totalPage);
            $smarty->assign('pageNo', $pageNo);
        }

        if (isset($_SESSION['name'])) {
            $smarty->assign('loginName', $_SESSION['name']);
        }
        if (isset($_SESSION['id'])) {
            $smarty->assign('loginId', $_SESSION['id']);
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