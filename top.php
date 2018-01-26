<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
}
else {
	if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];
        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }
	$tplPath = 'word/list.tpl';
	$smarty->assign('loginName', $_SESSION['name']);
}

$smarty->display($tplPath);