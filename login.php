<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/config/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/entity/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/wordy/dao/UserDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/wordy/templates_c/');

$isRedirect = false;
$tplPath = 'index.tpl';

if(!empty($_POST)){ 
    $loginMail = $_POST['loginMail'];
    $loginPw = $_POST['loginPw'];

    $loginMail = trim($loginMail);
    $loginPw = trim($loginPw);

    $validationMsgs = [];

    if (strlen($loginMail) == 0) {
        $validationMsgs[] = 'メールアドレスを入力してください。';
    }

    if (strlen($loginPw) == 0) {
        $validationMsgs[] = 'パスワードを入力してください。';
    }
}
if (empty($validationMsgs) && !empty($_POST)) {
    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $userDAO = new UserDAO($db);

        $user = $userDAO->findByLoginId($loginMail);

        if ($user == null) {
            $validationMsgs[] = '存在しないメールアドレスです。正しいメールアドレスを入力してください。';
        } else {
            $userPw = $user->getPasswd();
            if (password_verify($loginPw, $userPw)) {
                $id = $user->getID();
                $name = $user->getName();
                $mail = $user->getMail();
                $auth = $user->getAuth();

                $_SESSION['loginFlg'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['mail'] = $mail;
                $_SESSION['name'] = $name;
                $_SESSION['auth'] = $auth;
                $isRedirect = true;
            } else {
                $validationMsgs[] = 'パスワードが違います。正しいパスワードを入力してください。';
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
    header('Location: /wordy/word/showList.php');

    exit;
} else {
    if (!empty($validationMsgs)) {
        $smarty->assign('validationMsgs', $validationMsgs);
        $smarty->assign('loginMail', $loginMail);
    }

    $smarty->display($tplPath);
}
