<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/WordDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Vote.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/VoteDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

if($_POST['id']) {

	$id = $_POST['id'];
	$word = $_SESSION['word'];
	$read = $_POST['read'];
	$userId = $_SESSION['id'];
	$read_points = 'read'.$id.'_points';

	$votes = new Vote();
    $votes->setWord($word);
    $votes->setUserId($userId);
    $votes->setVote($read);

	try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $VoteDAO = new VoteDAO($db);
        $WordDAO = new WordDAO($db);

        $voteDB = $VoteDAO->findByVote($votes);

        if (empty($voteDB)) {
        	$VoteDAO->insert($votes);

			$WordDAO->vote($read_points, $word);

		}
		$vote_value = $WordDAO->findByVote($read_points, $word);

	} catch (PDOException $ex) {
        var_dump($ex);
        $smarty->assign('errorMsg', 'DB接続に失敗しました。');
        $tplPath = 'error.tpl';
        $smarty->display($tplPath);
    } finally {
        $db = null;
    }

	echo $vote_value;
}