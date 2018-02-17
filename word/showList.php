<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/WordDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Genre.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/GenreDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'word/list.tpl';

if (isset($_SESSION['flashMsg'])) {
    $flashMsg = $_SESSION['flashMsg'];

    $smarty->assign('flashMsg', $flashMsg);
    unset($_SESSION['flashMsg']);
}

if (isset($_SESSION['name'])) {
    cleanSession();
}


$linePerPage = 10;
$pageNo = 1;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $pageNo = $_GET['page'];
}

$offset = $linePerPage * ($pageNo - 1);

$wordList = [];
$genreList = [];

try {
    $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $wordDAO = new WordDAO($db);
    $genreDAO = new GenreDAO($db);
    $genreList = $genreDAO->findAll();

    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $smarty->assign('keyword', $keyword);
        $wordList = $wordDAO->findByWordKeyword($keyword);
        $count = $wordDAO->countKeyword($keyword);
        $totalPage = ceil($wordDAO->countKeyword($keyword) / $linePerPage);
        $smarty->assign('wordList', $wordList);
        $smarty->assign('wordDAO', $wordDAO);
        $smarty->assign('totalPage', $totalPage);
        $smarty->assign('pageNo', $pageNo);
        $smarty->assign('count', $count);
    } else if(isset($_GET['genre'])) {
        $totalPage = ceil($wordDAO->countGenre($_GET['genre']) / $linePerPage);
        $count = $wordDAO->countGenre($_GET['genre']);
        $wordList = $wordDAO->wordGenre($_GET['genre'],$linePerPage,$offset);
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

    $smarty->assign('genreList', $genreList);

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


$smarty->display($tplPath);