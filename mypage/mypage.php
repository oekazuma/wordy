<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/UserDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

if (loginCheck()) {
    header("Location: /wordy/index.php");
}
else {
	if (isset($_SESSION['flashMsg'])) {
        $flashMsg = $_SESSION['flashMsg'];
        $smarty->assign('flashMsg', $flashMsg);
        unset($_SESSION['flashMsg']);
    }
	$tplPath = 'mypage/mypage.tpl';
	$smarty->assign('loginName', $_SESSION['name']);
}

$smarty->display($tplPath);