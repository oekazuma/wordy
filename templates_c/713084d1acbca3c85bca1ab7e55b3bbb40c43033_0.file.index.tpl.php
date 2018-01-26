<?php
/* Smarty version 3.1.30, created on 2018-01-24 17:37:32
  from "/var/www/html/wordy/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6845cc5680e0_67870911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '713084d1acbca3c85bca1ab7e55b3bbb40c43033' => 
    array (
      0 => '/var/www/html/wordy/templates/index.tpl',
      1 => 1516783050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6845cc5680e0_67870911 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wordy</title>
    <link rel="icon" href="/wordy/img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

</head>

<body id="page-top">

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
            <a class="navbar-brand page-scroll" href="#page-top">Wordy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            	<li>
            		<a data-toggle="modal" data-target="#myModal">Login</a>
            	</li>
                <li>
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>その読み方投票で決めませんか？</h1>
            <hr>
            <p>プログラミングやWEBデザインを行う過程で、WidthやHeightなどを始め、多くの英単語を利用することがあります。その読み方を投票でみんなで決めて見ませんか？</p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">Let's Go Wordy!</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">会員登録をしてWordyを始めよう！</h2>
                <hr class="light">
                <p class="text-faded">Wordyは会員制のサービスです。1分で完了できる簡単な登録なのですぐ始められます。</p>
                <a href="/wordy/signup/goSignup.php" class="btn btn-default btn-xl wow tada">Wordy Started!</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">サービス概要</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-user wow bounceIn text-primary"></i>
                    <h3>会員登録機能</h3>
                    <p class="text-muted">会員制なので管理しやすく、荒らし行為も防止します。</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                    <h3>投稿＆投票機能</h3>
                    <p class="text-muted">気になる英単語を投稿したり、投票に参加して楽しめます。</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-star wow bounceIn text-primary" data-wow-delay=".2s"></i>
                    <h3>お気に入り機能</h3>
                    <p class="text-muted">気になる英単語はお気に入りに登録して後からでも確認できます。</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-twitter wow bounceIn text-primary" data-wow-delay=".3s"></i>
                    <h3>ツイート機能</h3>
                    <p class="text-muted">気になる英単語をTwitterで共有することができます。</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">お問い合わせはこちら</h2>
                <hr class="primary">
                <p>Wordyについてのお問い合わせやご意見をお願いします。</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x wow bounceIn"></i>
                <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                <p><a href="mailto:your-email@your-domain.com">wordy@wordy.com</a></p>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">ログイン</h4>
          </div>
          	<div class="modal-body">
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
	              <form action="/Wordy/login.php" method="post">
	              <div class="form-group">
	                <label for="inputEmail">メールアドレス</label>
	                <input class="form-control" type="email" title="loginMail" id="loginMail" name="loginMail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['loginMail']->value)===null||$tmp==='' ? '' : $tmp);?>
">
	              </div>
	              <div class="form-group">
	                <label for="inputPassword">パスワード</label>
	                <input class="form-control" type="password" title="loginPw" id="loginPw" name="loginPw">
	              </div>
	              <p class="text-right"><a href="#">パスワードをお忘れですか？</a></p>
          	</div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	            <input type="submit" value="ログイン" class="btn btn-primary">
	          </div>
      		</form>
  	</div>
</div>

<!-- jQuery -->
<?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>

<!-- Bootstrap Core JavaScript -->
<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

<!-- Plugin JavaScript -->
<?php echo '<script'; ?>
 src="js/jquery.easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/jquery.fittext.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/wow.min.js"><?php echo '</script'; ?>
>

<!-- Custom Theme JavaScript -->
<?php echo '<script'; ?>
 src="js/creative.js"><?php echo '</script'; ?>
>
<?php if (isset($_smarty_tpl->tpl_vars['validationMsgs']->value)) {
echo '<script'; ?>
 type="text/javascript">
	$(window).on('load',function(){
    $('#myModal').modal('show');
});
<?php echo '</script'; ?>
>
<?php }?>
</body>

</html>



































<?php }
}
