<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>投票|Wordy</title>
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

<section class="bg-default text-center">
  {if isset($flashMsg)}
    <div class="alert alert-success">
      <p>{$flashMsg}</p>
    </div>
  {/if}

    <div class="well">
      {if empty($favorite)}
      <a href="/wordy/favorite/favorite.php?ster=on&word={$word}&user={$loginId}&id={$wordId}"><img src="/wordy/img/ster_off.png" width="30"></a>
      {else}
      <a href="/wordy/favorite/favorite.php?ster=off&word={$word}&user={$loginId}&id={$wordId}"><img src="/wordy/img/ster_on.png" width="30"></a>
      {/if}
      <h1>{$wordList->getWord()}</h1>

    {if isset($vote)}
      <div class="alert alert-success">
        <p>{$vote->getVote()}に投票済みです！</p>
      </div>
    {/if}

      <p>
          {$wordList->getRead1()}：
          <span id="num">{$wordList->getReadPoints1()}</span>
          <button id="1" name="{$wordList->getRead1()}" class="btn btn-primary">投票する</button>
      </p>
      <p>
          {$wordList->getRead2()}：
          <span id="num">{$wordList->getReadPoints2()}</span>
          <button id="2" name="{$wordList->getRead2()}" class="btn btn-primary">投票する</button>
      </p>
      {if !empty ({$wordList->getRead3()}) }
      <p>
          {$wordList->getRead3()}:
          <span id="num">{$wordList->getReadPoints3()}</span>
          <button id="3" name="{$wordList->getRead3()}" class="btn btn-primary">投票する</button>
      </p>
      {/if}
      {if !empty ({$wordList->getRead4()}) }
      <p>
          {$wordList->getRead4()}:
          <span id="num">{$wordList->getReadPoints4()}</span>
          <button id="4" name="{$wordList->getRead4()}" class="btn btn-primary">投票する</button>
      </p>
      {/if}
      <a href="http://twitter.com/share?url=http://localhost:4567/wordy/word/showDetail.php?wordId={$wordId}%26word={$word}&text=あなたはどの読み方？投票して決めよう！&hashtags=Wordy" target="_blank"><img src="../img/twitter.png" width="40" height="30"></a>
    </div>

    <hr>

    <form action="/Wordy/word/showDetail.php" method="GET">
      <h2>コメント</h2>
      <textarea name="comment" cols="50" rows="10"></textarea>
      <br>
      <input type="submit" id="add" value="書き込む" class="btn btn-primary">
      <input type="hidden" name="wordId" value="{$wordId}">
      <input type="hidden" name="word" value="{$word}">
      <input type="hidden" name="isAdd" value="true">
    </form>

    <hr>

    <p>コメント数：<strong>{$commentDAO->count($wordId)}件</strong></p>

    {foreach $commentList as $comment}
    <form action="/Wordy/word/showDetail.php" method="GET">
    <div class="panel panel-default">
      <div class="panel-heading">{$comment->getName()}</div>
        <div class="panel-body">
          {$comment->getComment()|escape|nl2br}
          <BR>
          {$comment->getCreatedAt()}
        </div>
        {if $comment->getName() == $loginName}
          <input type="submit" id="delete" value="削除" class="btn">
          <input type="hidden" name="commentId" value="{$comment->getId()}">
          <input type="hidden" name="wordId" value="{$wordId}">
          <input type="hidden" name="word" value="{$word}">
          <input type="hidden" name="isDelete" value="true">
        {/if}
      </div>
    
    </form>

    {/foreach}

    {if $pageNo == 1}
            &lt;&lt;最初へ
            &lt;前へ
{else}    
{$prevPageNo = $pageNo - 1}
            <a href="/wordy/word/showDetail.php?wordId={$wordId}&word={$word}&page=1">&lt;&lt;最初へ</a>&nbsp;
            <a href="/wordy/word/showDetail.php?wordId={$wordId}&word={$word}&page={$prevPageNo}">&lt;前へ</a>&nbsp;
{/if}
{section name=pages start=1 loop=$totalPage+1 step=1}
    {if $smarty.section.pages.index == $pageNo}
            {$smarty.section.pages.index}&nbsp;
    {else}
            <a href="/wordy/word/showDetail.php?wordId={$wordId}&word={$word}&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a>&nbsp;
    {/if}
    {if $smarty.section.pages.index != $totalPage}
            |&nbsp;
    {/if}
{/section}
{if $pageNo >= $totalPage}
            次へ&gt;
            最後へ&gt;&gt;
{else}
  {$nextPageNo = $pageNo + 1}
          <a href="/wordy/word/showDetail.php?wordId={$wordId}&word={$word}&page={$nextPageNo}">次へ&gt;</a>&nbsp;
          <a href="/wordy/word/showDetail.php?wordId={$wordId}&word={$word}&page={$totalPage}">最後へ&gt;&gt;</a>
{/if}



<!-- jQuery -->
<script src="../js/jquery.js"></script>

<script src="../js/vote.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/jquery.fittext.js"></script>
<script src="../js/wow.min.js"></script>
</body>
</html>
