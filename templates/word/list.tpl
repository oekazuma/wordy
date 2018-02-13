<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>リスト|Wordy</title>
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

        {if isset ($loginId)}
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
        {else}
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="/wordy/login.php">Login</a>
              </li>
              <li>
                <a href="/wordy/word/showList.php">LIST</a>
              </li>
            </ul>
        </div>
        {/if}

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

<section class="bg-default">
  {if isset($flashMsg)}
    <div class="alert alert-success">
      <p>{$flashMsg}</p>
    </div>
  {/if}
  {if !isset($count)}
    <p class="text-uppercase">単語登録数：<strong>{$wordDAO->count()}</strong>件</p>
  {else}
    <p class="text-uppercase">単語登録数：<strong>{$count}</strong>件</p>
  {/if}
  <div class="well">
    <form action="/wordy/word/showList.php" method="get">
      知りたい英単語を <input class='form-search' type="text" name="keyword" value="{$keyword|default:''}">で<input type="submit" value="検索" class="btn">
    </form>
    <BR>
    {foreach $genreList as $genres}
      <a href="/wordy/word/showList.php?genre={$genres->getGenre()}" class="btn btn-primary">{$genres->getGenre()}</a>
    {/foreach}
  </div>

    <table class="table table-striped table-bordered">
      <thead>
      <tr>
        <th>単語名</th>
        <th>票数</th>
        <th>ジャンル</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      {foreach $wordList as $words}
        <tr>
          <td>{$words->getWord()}</td>
          <td>{$words->getRead1()}：{$words->getReadPoints1()}&nbsp;&nbsp;
              {$words->getRead2()}：{$words->getReadPoints2()}&nbsp;&nbsp;
            {if !empty ({$words->getRead3()}) }
              {$words->getRead3()}：{$words->getReadPoints3()}&nbsp;&nbsp;
            {/if}
            {if !empty ({$words->getRead4()}) }
              {$words->getRead4()}：{$words->getReadPoints4()}
            {/if}
          </td>
          <td>{$words->getGenre()}</td>
          <td>
            <form action="/wordy/word/showDetail.php" method="get">
              <input type="hidden" id="wordId" name="wordId" value="{$words->getId()}">
              <input type="hidden" id="word" name="word" value="{$words->getWord()}">
              <input type="submit" value="詳細" class="btn btn-primary btn-block">
            </form>
          </td>
        </tr>
        {foreachelse}
        <tr>
          <td colspan="5">検索結果が見つかりませんでした。</td>
        </tr>
      {/foreach}
      </tbody>
    </table>

{if $pageNo == 1}
            &lt;&lt;最初へ
            &lt;前へ
{else}    
{$prevPageNo = $pageNo - 1}
            <a href="/wordy/word/showList.php?page=1">&lt;&lt;最初へ</a>&nbsp;
            <a href="/wordy/word/showList.php?page={$prevPageNo}">&lt;前へ</a>&nbsp;
{/if}
{section name=pages start=1 loop=$totalPage+1 step=1}
    {if $smarty.section.pages.index == $pageNo}
            {$smarty.section.pages.index}&nbsp;
    {else}
            <a href="/wordy/word/showList.php?page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a>&nbsp;
    {/if}
    {if $smarty.section.pages.index != $totalPage}
            |&nbsp;
    {/if}
{/section}
{if $pageNo == $totalPage}
            次へ&gt;
            最後へ&gt;&gt;
{else}
  {$nextPageNo = $pageNo + 1}
          <a href="/wordy/word/showList.php?page={$nextPageNo}">次へ&gt;</a>&nbsp;
          <a href="/wordy/word/showList.php?page={$totalPage}">最後へ&gt;&gt;</a>
{/if}
</section>
</body>
</html>
