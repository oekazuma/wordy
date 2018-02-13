<!DOCTYPE html>
<html lang="ja">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>マイページ|Wordy</title>
	<link rel="icon" href="/wordy/img/favicon.ico">
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
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
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
  <section class="bg-default">
    <p class="text-right">{$loginName}さんログイン中</p>
    <div class="container">
      <h1>お気に入り一覧</h1>
    	<table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th class="text-center">単語名</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          {foreach $favList as $favorite}
            <tr>
              <td class="text-center">{$favorite->getWord()}</td>
              <td>
                <form action="/wordy/word/showDetail.php" method="get">
                  <input type="hidden" id="wordId" name="wordId" value="{$favorite->getWordId()}">
                  <input type="hidden" id="word" name="word" value="{$favorite->getWord()}">
                  <input type="submit" value="投票" class="btn btn-primary btn-block">
                </form>
              </td>
            </tr>
            {foreachelse}
            <tr>
              <td colspan="5">お気に入りは登録されていません。</td>
            </tr>
          {/foreach}
          </tbody>
        </table>
   </div>
  </section>

	</body>
</html>