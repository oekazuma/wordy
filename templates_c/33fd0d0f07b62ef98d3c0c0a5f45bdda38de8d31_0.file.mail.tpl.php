<?php
/* Smarty version 3.1.30, created on 2018-01-16 17:39:39
  from "/var/www/html/wordy/templates/signup/mail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5dba4b6f89f8_51669571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33fd0d0f07b62ef98d3c0c0a5f45bdda38de8d31' => 
    array (
      0 => '/var/www/html/wordy/templates/signup/mail.tpl',
      1 => 1516092235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5dba4b6f89f8_51669571 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>確認メール送信完了 | Wordy</title>
  <link rel="icon" href="images/favicon.ico">
</head>
<body>
  <h1>確認メール送信完了</h1>

  <section>
    <p><?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
に確認メールを送信しました。メールに添付されているURLから登録を完了させてください。</p>
  </section>


</body>
</html>
<?php }
}
