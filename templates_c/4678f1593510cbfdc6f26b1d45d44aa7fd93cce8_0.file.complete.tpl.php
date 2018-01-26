<?php
/* Smarty version 3.1.30, created on 2018-01-17 03:29:45
  from "/var/www/html/wordy/templates/signup/complete.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5e4499df45e4_48925881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4678f1593510cbfdc6f26b1d45d44aa7fd93cce8' => 
    array (
      0 => '/var/www/html/wordy/templates/signup/complete.tpl',
      1 => 1516127360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5e4499df45e4_48925881 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>会員登録完了 | Wordy</title>
  <link rel="icon" href="images/favicon.ico">
</head>
<body>
  <h1>会員登録完了</h1>

  <section>
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん Wordyへようこそ！ 楽しんで下さい！</p>
    <p><a href="/wordy/top.php">TOPへ</a></p>

  </section>


</body>
</html>
<?php }
}
