<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$tplPath = 'index.tpl';

if(isset($_SESSION['name'])){
	header("Location: /wordy/word/showList.php");
}

$smarty->display($tplPath);