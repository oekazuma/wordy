<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/UserDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$isRedirect = false;
$tplPath = 'signup/signup.tpl';

$signName = $_POST['signName'];
$signMail = $_POST['signMail'];
$signPw = $_POST['signPw'];
$signPwCon = $_POST['signPwCon'];
$signAuth = 2;
$signKey = sha1(uniqid(rand(),1));

$signName = trim($signName);
$signMail = trim($signMail);
$signPw = trim($signPw);
$signPwCon = trim($signPwCon);

$user = new User();
$user->setName($signName);
$user->setMail($signMail);
$user->setPasswd(password_hash($signPw, PASSWORD_DEFAULT));
$user->setAuth($signAuth);
$user->setKey($signKey);

$validationMsgs = [];

if (strlen($signName) == 0) {
    $validationMsgs[] = 'ユーザー名を入力してください。';
}
if (strlen($signMail) == 0) {
    $validationMsgs[] = 'メールアドレスを入力してください。';
}
if (strlen($signPw) == 0) {
    $validationMsgs[] = 'パスワードを入力してください。';
}
if (strlen($signPwCon) == 0) {
    $validationMsgs[] = 'パスワード(確認)を入力してください。';
}
if(!empty($signPwCon)) {
    if($signPw != $signPwCon) {
        $validationMsgs[] = 'パスワードが一致しません。';
    }
}

if (empty($validationMsgs)) {
    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $UserDAO = new UserDAO($db);

        $userDB = $UserDAO->findByLoginId($user->getMail());

        if (!empty($userDB)) {
            $validationMsgs[] = 'そのメールアドレスは既に登録されています';
        } else {
            $result = $UserDAO->insert($user);

            if ($result) {
                $isRedirect = true;
            } 
            else {
                $smarty->assign('errorMsg', '情報登録に失敗しました。もう一度はじめからやり直してください。');
                $tplPath = 'error.tpl';
            }
        }
    } catch (PDOException $ex) {
        print_r($ex);
        $smarty->assign('errorMsg', 'DB接続に失敗しました。');
        $tplPath = 'error.tpl';
    } finally {
        $db = null;
    }
}

if ($isRedirect) {
    $userDB = $UserDAO->findByLoginId($user->getMail());
    $id = $userDB->getID();
    $name = $userDB->getName();
    $mail = $userDB->getMail();
    $auth = $userDB->getAuth();

    $_SESSION['loginFlg'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['mail'] = $mail;
    $_SESSION['name'] = $name;
    $_SESSION['auth'] = $auth;

    $_SESSION['flashMsg'] = $signName.'さん Wordyへようこそ！';
    header("Location:/wordy/word/showList.php");
} 
else {
    if (!empty($validationMsgs)) {
        $smarty->assign('validationMsgs', $validationMsgs);

        $smarty->assign('user', $user);

        if (isset($_SESSION['name'])) {
            $smarty->assign('loginName', $_SESSION['name']);
        }
    }
}
$smarty->display($tplPath);
