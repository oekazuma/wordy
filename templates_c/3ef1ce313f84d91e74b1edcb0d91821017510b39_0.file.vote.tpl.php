<?php
/* Smarty version 3.1.30, created on 2018-01-26 10:42:45
  from "/var/www/html/wordy/templates/word/vote.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6a87955de888_01706351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ef1ce313f84d91e74b1edcb0d91821017510b39' => 
    array (
      0 => '/var/www/html/wordy/templates/word/vote.tpl',
      1 => 1516930964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6a87955de888_01706351 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
  <?php if (isset($_smarty_tpl->tpl_vars['flashMsg']->value)) {?>
    <div class="alert alert-success">
      <p><?php echo $_smarty_tpl->tpl_vars['flashMsg']->value;?>
</p>
    </div>
  <?php }?>

    <div class="well">
      <?php if (empty($_smarty_tpl->tpl_vars['favorite']->value)) {?>
      <a href="/wordy/favorite/favorite.php?ster=on&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&user=<?php echo $_smarty_tpl->tpl_vars['loginId']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
"><img src="/wordy/img/ster_off.png" width="30"></a>
      <?php } else { ?>
      <a href="/wordy/favorite/favorite.php?ster=off&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&user=<?php echo $_smarty_tpl->tpl_vars['loginId']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
"><img src="/wordy/img/ster_on.png" width="30"></a>
      <?php }?>
      <h1><?php echo $_smarty_tpl->tpl_vars['wordList']->value->getWord();?>
</h1>

    <?php if (isset($_smarty_tpl->tpl_vars['vote']->value)) {?>
      <div class="alert alert-success">
        <p><?php echo $_smarty_tpl->tpl_vars['vote']->value->getVote();?>
に投票済みです！</p>
      </div>
    <?php }?>

      <p>
          <?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead1();?>
：
          <span id="num"><?php echo $_smarty_tpl->tpl_vars['wordList']->value->getReadPoints1();?>
</span>
          <button id="1" name="<?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead1();?>
" class="btn btn-primary">投票する</button>
      </p>
      <p>
          <?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead2();?>
：
          <span id="num"><?php echo $_smarty_tpl->tpl_vars['wordList']->value->getReadPoints2();?>
</span>
          <button id="2" name="<?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead2();?>
" class="btn btn-primary">投票する</button>
      </p>
      <?php ob_start();
echo $_smarty_tpl->tpl_vars['wordList']->value->getRead3();
$_prefixVariable1=ob_get_clean();
if (!empty($_prefixVariable1)) {?>
      <p>
          <?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead3();?>
:
          <span id="num"><?php echo $_smarty_tpl->tpl_vars['wordList']->value->getReadPoints3();?>
</span>
          <button id="3" name="<?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead3();?>
" class="btn btn-primary">投票する</button>
      </p>
      <?php }?>
      <?php ob_start();
echo $_smarty_tpl->tpl_vars['wordList']->value->getRead4();
$_prefixVariable2=ob_get_clean();
if (!empty($_prefixVariable2)) {?>
      <p>
          <?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead4();?>
:
          <span id="num"><?php echo $_smarty_tpl->tpl_vars['wordList']->value->getReadPoints4();?>
</span>
          <button id="4" name="<?php echo $_smarty_tpl->tpl_vars['wordList']->value->getRead4();?>
" class="btn btn-primary">投票する</button>
      </p>
      <?php }?>
      <a href="http://twitter.com/share?url=http://localhost:4567/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
%26word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&text=あなたはどの読み方？投票して決めよう！&hashtags=Wordy" target="_blank"><img src="../img/twitter.png" width="40" height="30"></a>
    </div>

    <hr>

    <form action="/Wordy/word/showDetail.php" method="GET">
      <h2>コメント</h2>
      <textarea name="comment" cols="50" rows="10"></textarea>
      <br>
      <input type="submit" id="add" value="書き込む" class="btn btn-primary">
      <input type="hidden" name="wordId" value="<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
">
      <input type="hidden" name="word" value="<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
">
      <input type="hidden" name="isAdd" value="true">
    </form>

    <hr>

    <p>コメント数：<strong><?php echo $_smarty_tpl->tpl_vars['commentDAO']->value->count($_smarty_tpl->tpl_vars['wordId']->value);?>
件</strong></p>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['commentList']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
    <form action="/Wordy/word/showDetail.php" method="GET">
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['comment']->value->getName();?>
</div>
        <div class="panel-body">
          <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->getComment(), ENT_QUOTES, 'UTF-8', true));?>

          <BR>
          <?php echo $_smarty_tpl->tpl_vars['comment']->value->getCreatedAt();?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['comment']->value->getName() == $_smarty_tpl->tpl_vars['loginName']->value) {?>
          <input type="submit" id="delete" value="削除" class="btn">
          <input type="hidden" name="commentId" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value->getId();?>
">
          <input type="hidden" name="wordId" value="<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
">
          <input type="hidden" name="word" value="<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
">
          <input type="hidden" name="isDelete" value="true">
        <?php }?>
      </div>
    
    </form>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php if ($_smarty_tpl->tpl_vars['pageNo']->value == 1) {?>
            &lt;&lt;最初へ
            &lt;前へ
<?php } else { ?>    
<?php $_smarty_tpl->_assignInScope('prevPageNo', $_smarty_tpl->tpl_vars['pageNo']->value-1);
?>
            <a href="/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&page=1">&lt;&lt;最初へ</a>&nbsp;
            <a href="/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['prevPageNo']->value;?>
">&lt;前へ</a>&nbsp;
<?php }
$__section_pages_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_pages']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages'] : false;
$__section_pages_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['totalPage']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_pages_0_start = min(1, $__section_pages_0_loop);
$__section_pages_0_total = min(($__section_pages_0_loop - $__section_pages_0_start), $__section_pages_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = new Smarty_Variable(array());
if ($__section_pages_0_total != 0) {
for ($__section_pages_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] = $__section_pages_0_start; $__section_pages_0_iteration <= $__section_pages_0_total; $__section_pages_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']++){
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null) == $_smarty_tpl->tpl_vars['pageNo']->value) {?>
            <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null);?>
&nbsp;
    <?php } else { ?>
            <a href="/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null);?>
</a>&nbsp;
    <?php }?>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null) != $_smarty_tpl->tpl_vars['totalPage']->value) {?>
            |&nbsp;
    <?php }
}
}
if ($__section_pages_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_pages'] = $__section_pages_0_saved;
}
if ($_smarty_tpl->tpl_vars['pageNo']->value >= $_smarty_tpl->tpl_vars['totalPage']->value) {?>
            次へ&gt;
            最後へ&gt;&gt;
<?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('nextPageNo', $_smarty_tpl->tpl_vars['pageNo']->value+1);
?>
          <a href="/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['nextPageNo']->value;?>
">次へ&gt;</a>&nbsp;
          <a href="/wordy/word/showDetail.php?wordId=<?php echo $_smarty_tpl->tpl_vars['wordId']->value;?>
&word=<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
">最後へ&gt;&gt;</a>
<?php }?>



<!-- jQuery -->
<?php echo '<script'; ?>
 src="../js/jquery.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="../js/vote.js"><?php echo '</script'; ?>
>

<!-- Bootstrap Core JavaScript -->
<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>

<!-- Plugin JavaScript -->
<?php echo '<script'; ?>
 src="../js/jquery.easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/jquery.fittext.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/wow.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
