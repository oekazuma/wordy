<?php
/* Smarty version 3.1.30, created on 2018-01-24 01:50:20
  from "/var/www/html/wordy/templates/top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6767cc550b08_10489803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d58d133c52d23f4e9e9e563cc9b4b73c428d7a6' => 
    array (
      0 => '/var/www/html/wordy/templates/top.tpl',
      1 => 1516726338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6767cc550b08_10489803 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/vagrant/wordy/libs/plugins/modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ホーム | Wordy</title>
	<link rel="icon" href="img/favicon.ico">
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
	</head>
	<body>
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
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
              	<a href="word/goAdd.php">POST</a>
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

	<section class="bg-default" id="about">
    <div class="container">
        <div class="row">
                <?php if (isset($_smarty_tpl->tpl_vars['flashMsg']->value)) {?>
    				<div class="alert alert-success">
      				<p><?php echo $_smarty_tpl->tpl_vars['flashMsg']->value;?>
</p>
    				</div>
  				<?php }?>

				
				<section>
    <form action="/wordy/word/showList.php" method="get">
      知りたい英単語を <input type="text" name="keyword" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['keyword']->value)===null||$tmp==='' ? '' : $tmp);?>
">で<input type="submit" value="検索">
    </form>
  </section>

  <section>
    <p>投稿は<a href="/wordy/word/goAdd.php">こちら</a>から</p>
    <p>単語登録数：<?php echo $_smarty_tpl->tpl_vars['wordDAO']->value->count();?>
件</p>
  </section>

  <section>
    <?php if ($_smarty_tpl->tpl_vars['pageNo']->value == 1) {?>
            &lt;&lt;最初へ
            &lt;前へ
<?php } else { ?>    
<?php $_smarty_tpl->_assignInScope('prevPageNo', $_smarty_tpl->tpl_vars['pageNo']->value-1);
?>
            <a href="/wordy/word/showList.php?page=1">&lt;&lt;最初へ</a>&nbsp;
            <a href="/wordy/word/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['prevPageNo']->value;?>
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
            <a href="/wordy/word/showList.php?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pages']->value['index'] : null);?>
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
if ($_smarty_tpl->tpl_vars['pageNo']->value == $_smarty_tpl->tpl_vars['totalPage']->value) {?>
            次へ&gt;
            最後へ&gt;&gt;
<?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('nextPageNo', $_smarty_tpl->tpl_vars['pageNo']->value+1);
?>
          <a href="/wordy/word/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['nextPageNo']->value;?>
">次へ&gt;</a>&nbsp;
          <a href="/wordy/word/showList.php?page=<?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
">最後へ&gt;&gt;</a>
<?php }?>
      </p>
  </section>

  <section>
    <table border="1">
      <thead>
      <tr>
        <th>投稿日時</th>
        <th>単語名</th>
        <th>投稿者</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wordList']->value, 'words');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['words']->value) {
?>
        <tr>
          <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['words']->value->getCreatedAt(),"%Y年%m月%d日");?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['words']->value->getWord();?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['words']->value->getUserName();?>
</td>
          <td>
            <form action="/wordy/word/showDetail.php" method="get">
              <input type="hidden" id="wordId" name="wordId" value="<?php echo $_smarty_tpl->tpl_vars['words']->value->getId();?>
">
              <input type="hidden" id="word" name="word" value="<?php echo $_smarty_tpl->tpl_vars['words']->value->getWord();?>
">
              <input type="submit" value="投票">
            </form>
          </td>
        </tr>
        <?php
}
} else {
?>

        <tr>
          <td colspan="5">単語は存在しません。</td>
        </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </tbody>
    </table>
  </section>
			</div>
        </div>
    </div>
	</section>
	
	</body>
</html><?php }
}
