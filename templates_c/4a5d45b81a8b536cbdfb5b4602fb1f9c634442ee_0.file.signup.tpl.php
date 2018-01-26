<?php
/* Smarty version 3.1.30, created on 2018-01-24 17:37:39
  from "/var/www/html/wordy/templates/signup/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6845d3537355_81770009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a5d45b81a8b536cbdfb5b4602fb1f9c634442ee' => 
    array (
      0 => '/var/www/html/wordy/templates/signup/signup.tpl',
      1 => 1516780804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6845d3537355_81770009 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>会員登録 | Wordy</title>
  <link rel="icon" href="wordy/img/favicon.ico">
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
    </div>
    <!-- /.container-fluid -->
</nav>

<section class="bg-default" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h1>会員登録</h1>
                <div class="well">
                <?php if (isset($_smarty_tpl->tpl_vars['validationMsgs']->value)) {?>
                <div class="alert alert-danger">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['validationMsgs']->value, 'msg', false, NULL, 'validationMsgsLoop', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                    <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
                <?php }?>
                <form action="/Wordy/signup/signup.php" method="post">
                <div class="form-group">
                  <label for="inputName">ユーザー名</label>
                  <input class="form-control"　type="text" title="signName" id="signName" name="signName" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getName())===null||$tmp==='' ? '' : $tmp);?>
">
                </div>
                <div class="form-group">
                  <label for="inputEmail">メールアドレス</label>
                  <input class="form-control" type="email" title="signMail" id="signMail" name="signMail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getMail())===null||$tmp==='' ? '' : $tmp);?>
">
                </div>
                <div class="form-group">
                  <label for="inputPassword">パスワード</label>
                  <input class="form-control" type="password" title="signPw" id="signPw" name="signPw">
                </div>
                <div class="form-group">
                  <label for="inputPassword">パスワード(確認)</label>
                  <input class="form-control" type="password" title="signPwCon" id="signPwCon" name="signPwCon">
                </div>
              <input type="submit" value="登録" class="btn btn-primary">
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<?php }
}
