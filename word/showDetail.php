<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/WordDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Comment.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/CommentDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Vote.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/VoteDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Favorite.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/FavoriteDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'word/vote.tpl';

if (loginCheck()) {
    header("Location: /wordy/index.php");
} else {
    if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];

        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }

    $wordId = $_GET["wordId"];
    $_SESSION['word'] = $_GET["word"];

    $linePerPage = 5;
    $pageNo = 1;

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $pageNo = $_GET['page'];
    }

    $offset = $linePerPage * ($pageNo - 1);

    $commentList = [];

    if(isset($_GET['isAdd']) && $_GET['comment'] != ''){
    	$comments = new Comment();
    	$comments->setUserId($_SESSION['id']);
    	$comments->setWord($wordId);
    	$comments->setComment($_GET['comment']);
    	$comments->setCreatedAt(date('Y/m/d H:i:s'));
    	$comments->setDisp(1);
    }

    $votes = new Vote();
    $votes->setWord($_SESSION['word']);
    $votes->setUserId($_SESSION['id']);

    $ster = new Favorite();
    $ster->setWord($_SESSION['word']);
    $ster->setUserId($_SESSION['id']);

    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $wordDAO = new WordDAO($db);
        $commentDAO = new CommentDAO($db);
        $voteDAO = new VoteDAO($db);
        $favoriteDAO = new FavoriteDAO($db);

        $totalPage = ceil($commentDAO->count($wordId) / $linePerPage);
        $commentList = $commentDAO->commentRow($wordId,$linePerPage,$offset);

        $smarty->assign('commentList', $commentList);
        $smarty->assign('commentDAO', $commentDAO);
        $smarty->assign('totalPage', $totalPage);
        $smarty->assign('pageNo', $pageNo);

        $wordList = $wordDAO->findByPk($wordId);

        $smarty->assign('wordList', $wordList);
        $smarty->assign('wordDAO', $wordDAO);

        $smarty->assign('wordId', $wordId);
        $smarty->assign('word', $_SESSION['word']);

        $vote = $voteDAO->findByVote($votes);
        $smarty->assign('vote', $vote);

        $favorite = $favoriteDAO->findByFav($ster);
        $smarty->assign('favorite', $favorite);

        if (isset($_SESSION['name'])) {
            $smarty->assign('loginName', $_SESSION['name']);
        }
        if (isset($_SESSION['id'])) {
            $smarty->assign('loginId', $_SESSION['id']);
        }

        if(isset($_GET['isAdd']) && $_GET['comment'] != ''){
        	$commentDAO->insert($comments);
            $_SESSION['flashMsg'] = 'コメントをしました。';
        	header('Location:/wordy/word/showDetail.php?wordId='.$wordId.'&word='.$word);
        }

        if(isset($_GET['isDelete'])){
        	$commentId = $_GET['commentId'];
        	$commentDAO->delete($commentId);
            $_SESSION['flashMsg'] = 'コメントを削除しました。';
        	header('Location:/wordy/word/showDetail.php?wordId='.$wordId.'&word='.$word);
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