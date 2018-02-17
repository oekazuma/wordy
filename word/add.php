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

if (loginCheck()) {
    header("Location: /wordy/index.php");
} 
else {
    $isRedirect = false;

    $tplPath = 'word/add.tpl';

    $word = $_POST['word'];
    $read_1 = $_POST['read_1'];
    $read_2 = $_POST['read_2'];
    $read_3 = $_POST['read_3'];
    $read_4 = $_POST['read_4'];
    $genre =  $_POST['genre'];

    $word = trim($word);
    $read_1 = trim($read_1);
    $read_2 = trim($read_2);
    $read_3 = trim($read_3);
    $read_4 = trim($read_4);
    $genre = trim($genre);

    $read1_points = 0;
    $read2_points = 0;
    $read3_points = 0;
    $read4_points = 0;

    $words = new Word();
    $words->setWord($word);
    $words->setRead1($read_1);
    $words->setRead2($read_2);
    $words->setRead3($read_3);
    $words->setRead4($read_4);
    $words->setGenre($genre);
    $words->setReadPoints1($read1_points);
    $words->setReadPoints2($read2_points);
    $words->setReadPoints3($read3_points);
    $words->setReadPoints4($read4_points);
    $words->setCreatedAt(date('Y/m/d H:i:s'));
    $words->setUserId($_SESSION['id']);

    $validationMsgs = [];

    if(!ctype_alpha($word)) {
        $validationMsgs[] = "[読み方を決めたいワード]英字で入力してください。";
    }

    if(preg_match('/[^ァ-ヶー]/u',$read_1)) {
        $validationMsgs[] = "[読み方1]カタカナで入力してください。";
    }

    if(preg_match('/[^ァ-ヶー]/u',$read_2)) {
        $validationMsgs[] = "[読み方2]カタカナで入力してください。";
    }

    if(preg_match('/[^ァ-ヶー]/u',$read_3)) {
        $validationMsgs[] = "[読み方3]カタカナで入力してください。";
    }

    if(preg_match('/[^ァ-ヶー]/u',$read_4)) {
        $validationMsgs[] = "[読み方4]カタカナで入力してください。";
    }

    if (empty($read_1)||empty($read_2)) {
        $validationMsgs[] = "読み方は最低限2つ入力してください。";
    }

    if (!wordCheck($word)) {
        $validationMsgs[] = "[読み方を決めたいワード]NGワードが含まれています。";
    }

    if(!wordCheck($read_1)) {
        $validationMsgs[] = "[読み方1]NGワードが含まれています。";
    }

    if(!wordCheck($read_2)) {
        $validationMsgs[] = "[読み方2]NGワードが含まれています。";
    }

    if(!wordCheck($read_3)) {
        $validationMsgs[] = "[読み方3]NGワードが含まれています。";
    }

    if(!wordCheck($read_4)) {
        $validationMsgs[] = "[読み方4]NGワードが含まれています。";
    }

    if (empty($validationMsgs)) {
        try {
            $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $WordDAO = new WordDAO($db);

            $wordDB = $WordDAO->findByWord($words->getWord());

            if (!empty($wordDB)) {
                $validationMsgs[] = 'その単語は既に登録されています';
            } else {

                $result = $WordDAO->insert($words);

                if ($result) {
                    $isRedirect = true;
                }  
                else {
                    $smarty->assign('errorMsg', '情報登録に失敗しました。もう一度はじめからやり直してください。');
                    $tplPath = 'error.tpl';
                }
            }
        } catch (PDOException $ex) {
            var_dump($ex);
            $smarty->assign('errorMsg', 'DB接続に失敗しました。');
            $tplPath = 'error.tpl';
        } finally {
            $db = null;
        }
    }

    if ($isRedirect) {
        $_SESSION['flashMsg'] = '読み方を投稿しました。';
    	header('Location: /wordy/word/showList.php');

        exit;
    } else {
        if (!empty($validationMsgs)) {
            $smarty->assign('validationMsgs', $validationMsgs);

            $smarty->assign('word', $words);

            try {
                $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                $genreDAO = new GenreDAO($db);

                $genreList = $genreDAO->findAll();

                $smarty->assign('genreList', $genreList);
            } 
            catch (PDOException $ex) {
                print_r($ex);
                var_dump($ex);

                $smarty->assign('errorMsg', 'DB接続に失敗しました。');

                $tplPath = 'error.tpl';
            } 
            finally {
                $db = null;
            }

            if (isset($_SESSION['name'])) {
            	$smarty->assign('loginName', $_SESSION['name']);
            }
        }

        $smarty->display($tplPath);
    }
}