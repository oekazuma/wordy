<?php
/* Smarty version 3.1.30, created on 2018-01-16 15:14:58
  from "/var/www/html/wordy/templates/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5d98628485d0_95852977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e31620c0568aac6d4b8813845629cc5526fbe7d2' => 
    array (
      0 => '/var/www/html/wordy/templates/signup.tpl',
      1 => 1516083264,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5d98628485d0_95852977 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>仮会員登録 | Wordy</title>
  <link rel="icon" href="images/favicon.ico">
</head>
<body>
  <h1>仮会員登録</h1>

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
    <p>以下項目を入力し、仮登録をクリックしてください。</p>

    <form action="/Wordy/siginup.php" method="post">
      <table>
        <tbody>
        <tr>
          <th>ユーザー名</th>
          <td><input type="text" title="signName" id="signName" name="signName" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['signName']->value)===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="text" title="signMail" id="signMail" name="signMail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['signMail']->value)===null||$tmp==='' ? '' : $tmp);?>
"></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type="password" title="signPw" id="signPw" name="signPw"></td>
        </tr>
        <tr>
          <th>パスワード(確認)</th>
          <td><input type="password" title="signPwCon" id="signPwCon" name="signPwCon"></td>
        </tr>
        <tr>
          <td colspan="2" class="submit"><input type="submit" value="仮登録"/></td>
        </tr>
        </tbody>
      </table>
    </form>
  </section>
</body>
</html>
<?php }
}
