<?php
/* Smarty version 3.1.30, created on 2018-01-16 14:26:29
  from "/var/www/html/wordy/templates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d8d05c3eb22_15607400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7693386e1af068c77a12f71639f81d964054b50e' => 
    array (
      0 => '/var/www/html/wordy/templates/error.tpl',
      1 => 1516080387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5d8d05c3eb22_15607400 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>エラー | Wordy</title>
</head>
<body>
  <h1>Error</h1>

  <section>
    <h2>申し訳ございません。障害が発生しました。</h2>

    <p>
      以下のメッセージをご確認ください。<br>
      <?php echo $_smarty_tpl->tpl_vars['errorMsg']->value;?>

    </p>
  </section>

  <p><a href="/Wordy/">TOPへ戻る</a></p>
</body>
</html>
<?php }
}
