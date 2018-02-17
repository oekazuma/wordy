<!DOCTYPE html>
<html lang="ja">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>投稿|Wordy</title>
  <link rel="icon" href="wordy/img/favicon.ico">
  <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,60/0italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/wordy/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/wordy/css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/wordy/css/header.css" type="text/css">
    <link rel="stylesheet" href="/wordy/css/creative.css" type="text/css">
  </head>
  <body>
  <nav id="mainNav" class="navbar-default navbar-fixed-top affix">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/wordy/">Wordy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="/wordy/word/showList.php">LIST</a>
              </li>
              <li>
                <a href="/wordy/word/goAdd.php">POST</a>
              </li>
              <li>
                <a href="/Wordy/mypage/mypage.php">MYPAGE</a>
              </li>
              <li>
                <a href="/wordy/logout.php">LOGOUT</a>
              </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
	</head>
	<body>

	<section class="bg-default" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h1>ワード登録</h1>
                <p>情報を入力し、登録ボタンをクリックしてください。</p>
                <div class="well">
                {if isset($validationMsgs)}
                <div class="alert alert-danger">
                  {foreach from=$validationMsgs item="msg" name="validationMsgsLoop"}
                    <p>{$msg}</p>
                  {/foreach}
                </div>
                {/if}
                <form action="/wordy/word/add.php" method="post">
                <div class="form-group">
                  <label for="inputWord">読み方を決めたいワード&nbsp;<font color="red">必須</font></label>
                  <input class="form-control"　type="text" id="word" name="word" placeholder="英字で入力" autocomplete="off" value="{$word->getWord()|default:''}">
                </div>
                <div class="form-group">
                  <label for="inputRead">読み方その1&nbsp;<font color="red">必須</font></label>
                  <input class="form-control" type="text" id="read_1" name="read_1" placeholder="カタカナで入力" autocomplete="off" value="{$word->getRead1()|default:''}">
                </div>
                <div class="form-group">
                  <label for="inputRead">読み方その2&nbsp;<font color="red">必須</font></label>
                  <input class="form-control" type="text" id="read_2" name="read_2" placeholder="カタカナで入力" autocomplete="off" value="{$word->getRead2()|default:''}">
                </div>
                <div class="form-group">
                  <label for="inputRead">読み方その3</label>
                  <input class="form-control" type="text" id="read_3" name="read_3" placeholder="カタカナで入力" autocomplete="off" value="{$word->getRead3()|default:''}">
                </div>
                <div class="form-group">
                  <label for="inputRead">読み方その4</label>
                  <input class="form-control" type="text" id="read_4" name="read_4" placeholder="カタカナで入力" autocomplete="off" value="{$word->getRead4()|default:''}">
                </div>
                <div class="form-group">
                  <label for="inputGenre">ジャンル&nbsp;<font color="red">必須</font></label>
                  <select id="genre" name="genre">
                    {foreach from=$genreList item="genre" name="genreListLoop"}
                      {if !is_null($genre->getId())}
                        <option value="{$genre->getGenre()}">{$genre->getGenre()}</option>
                      {/if}
                    {/foreach}
                  </select>
                </div>
              <input type="submit" value="登録" class="btn btn-primary">
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
	</section>
</body>
</html>