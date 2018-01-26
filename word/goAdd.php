<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/Word.class.php';

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
}

if (isset($_SESSION['name'])) {
	$smarty->assign('loginName', $_SESSION['name']);
}

$smarty->assign('word', new Word());

$smarty->display($tplPath);