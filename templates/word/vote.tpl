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
        </div>
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

  {if isset($ngMsg)}
    <div class="alert alert-danger">
      <p>{$ngMsg}</p>
    </div>
  {/if}

  {if !isset ($loginId)}
    <p>投票、コメントをするにはログインをしてください。</p>

  {else}
  
    <div class="well">
      {if empty($favorite)}
      <a href="/wordy/favorite/favorite.php?ster=on&word={$word}&user={$loginId}&id={$wordId}"><img src="/wordy/img/ster_off.png" width="30"></a>
      {else}
      <a href="/wordy/favorite/favorite.php?ster=off&word={$word}&user={$loginId}&id={$wordId}"><img src="/wordy/img/ster_on.png" width="30"></a>
      {/if}
  {/if}
      <h1>{$wordList->getWord()}</h1>

    {if isset($vote)}
      <div class="alert alert-success">
        <p>{$vote->getVote()}に投票済みです！</p>
      </div>
    {/if}
    <div class="row">
  <div class="col-sm-7">
    <p id="graf"><img src="/wordy/img/graf.png"></p>
  </div>
  <BR>
  <BR>
  <div class="col-sm-3">
    <p>
          <span id="read1">{$wordList->getRead1()}</span>：
          <span id="num1">{$wordList->getReadPoints1()}</span>&nbsp;&nbsp;
          {if isset ($loginId)}
          <button id="1" name="{$wordList->getRead1()}" class="btn btn-primary">投票する</button>
          {/if}
      </p>
      <BR>
      <p>
          <span id="read2">{$wordList->getRead2()}</span>：
          <span id="num2">{$wordList->getReadPoints2()}</span>&nbsp;&nbsp;
          {if isset ($loginId)}
          <button id="2" name="{$wordList->getRead2()}" class="btn btn-primary">投票する</button>
          {/if}
      </p>
      <BR>
      {if !empty ({$wordList->getRead3()}) }
      <p>
          <span id="read3">{$wordList->getRead3()}</span>:
          <span id="num3">{$wordList->getReadPoints3()}</span>&nbsp;&nbsp;
          {if isset ($loginId)}
          <button id="3" name="{$wordList->getRead3()}" class="btn btn-primary">投票する</button>
          {/if}
      </p>
      <BR>
      {/if}
      {if !empty ({$wordList->getRead4()}) }
      <p>
          <span id="read4">{$wordList->getRead4()}</span>:
          <span id="num4">{$wordList->getReadPoints4()}</span>&nbsp;&nbsp;
          {if isset ($loginId)}
          <button id="4" name="{$wordList->getRead4()}" class="btn btn-primary">投票する</button>
          {/if}
      </p>
      {/if}
      {if $wordList->getReadPoints1() == 0 && $wordList->getReadPoints2() == 0}
      {else}
      <p><button class="btn">グラフを表示する</button></p>
      {/if}
  </div>
</div>
    

      
      <a href="http://twitter.com/share?url=http://localhost:4567/wordy/word/showDetail.php?wordId={$wordId}%26word={$word}&text=あなたはどの読み方？投票して決めよう！&hashtags=Wordy" target="_blank"><img src="../img/twitter.png" width="40" height="30"></a>
    </div>

    {if isset ($loginId)}
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
    {/if}
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
        {if isset ($loginId)}
          {if $comment->getName() == $loginName}
            <input type="submit" id="delete" value="削除" class="btn">
            <input type="hidden" name="commentId" value="{$comment->getId()}">
            <input type="hidden" name="wordId" value="{$wordId}">
            <input type="hidden" name="word" value="{$word}">
            <input type="hidden" name="isDelete" value="true">
          {/if}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script type="text/javascript">
  function loadContents(){
  $.ajax({
    type: "GET",
    url: "/wordy/word/showDetail.php?wordId={$wordId}&word={$word}",
    success: function(data) {
      var read1 = $('#read1').text();
      var read2 = $('#read2').text();
      var read3 = $('#read3').text();
      var read4 = $('#read4').text();

      var num1 = $('#num1').text();
      var num2 = $('#num2').text();
      var num3 = $('#num3').text();
      var num4 = $('#num4').text();

      $("button").click(function() {
        $("#graf").html("<canvas id='mycanvas' height='400' width='400'></canvas>");
      });


      var data = [
       {
        value: num1,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: read1
       },
       {
        value: num2,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: read2
       },
       {
        value: num3,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: read3
       },
      {
        value: num4,
        color: "#00FF66",
        highlight: "#00FF99",
        label: read4
       }
      ];

      var option = {
        animation: false
      };

      var myChart = new Chart(document.getElementById("mycanvas").getContext("2d")).Pie(data,option);
    }
  });
}
$(function() {
  loadContents(); 
  setInterval("loadContents()", 1000);
});
</script>
</body>
</html>
