<?php
/* Smarty version 3.1.30, created on 2018-01-15 00:14:44
  from "/var/www/html/wordy/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5b73e4e884c8_09514372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2665066f858481b1c588664a3c8faae9c8c17d9d' => 
    array (
      0 => '/var/www/html/wordy/templates/login.tpl',
      1 => 1515942504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b73e4e884c8_09514372 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ログイン | Wordy</title>
  <link rel="icon" href="images/favicon.ico">
</head>
<body>
  <h1>ログイン</h1>

  <?php if (isset($_smarty_tpl->tpl_vars['validationMsgs']->value)) {?>
    <section id="errorMsg">
      <p>以下のメッセージをご確認ください</p>
      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['validationMsgs']->value, 'msg', false, NULL, 'validationMsgsLoop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
          <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
    </section>
  <?php }?>

  <section>
    <p>メールアドレスとパスワードを入力し、ログインをクリックしてください。</p>

    <form action="/Wordy/login.php" method="post">
      <table>
        <tbody>
        <tr>
          <th>メールアドレス</th>
          <td><input type="text" title="loginMail" id="loginMail" name="loginMail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['loginMail']->value)===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type="password" title="loginPw" id="loginPw" name="loginPw"></td>
        </tr>
        <tr>
          <td colspan="2" class="submit"><input type="submit" value="ログイン"/></td>
        </tr>
        </tbody>
      </table>
    </form>
  </section>
</body>
</html>
<?php }
}
