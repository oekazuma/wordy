<?php
/* Smarty version 3.1.30, created on 2018-01-15 00:11:26
  from "/var/www/html/wordy/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5b731ef31955_36360691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afe7622cdb34932e2e057f35121300136b84b005' => 
    array (
      0 => '/var/www/html/wordy/templates/home.tpl',
      1 => 1515942487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b731ef31955_36360691 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ホーム | Wordy</title>
	<link rel="icon" href="images/favicon.ico">
	</head>
	<body>
	<header>
		<ul>
			<li><a href="#!"><img src="images/logo_wide.png"></li></a>
			<li><a href="login.php">ログイン</a></li>
			<li><a href="logout.php">ログアウト</a></li>
		</ul>
	</header>
	<p>
	<p>ようこそ<?php echo $_smarty_tpl->tpl_vars['loginName']->value;?>
さん</p>
	<a href="post.php">投稿</a><br>
	<a href="showlist.php">投稿を見る</a><br>
	</body>
</html><?php }
}
