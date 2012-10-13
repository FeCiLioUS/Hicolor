<?php /* Smarty version 2.6.26, created on 2012-07-21 16:33:12
         compiled from standard_template.tpl */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="verify-v1" content="7fGIHfU9vg/fCCkXJQOjOyrkpfS45t6PxvZ8hKptNBQ=" />
<meta name="google-site-verification" content="NfKofW6XSnpSVZQhOtckPcHWUHvDkR_5GL4gLf1f7qk" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>
<?php if ($this->_tpl_vars['pageTitle']): ?>
<?php echo $this->_tpl_vars['pageTitle']; ?>

<?php else: ?>
印刷購物網-HiColor-高品質合版印刷
<?php endif; ?>
</title>
<script src="../lib/framework/jquery/jquery-1.6.4.js"></script>
<script src="../js/jquery-text-overflow/jquery.text-overflow.js"></script>
<script src="../js/jquery-getUrlParam/jquery.getUrlParam.js"></script>
<script src="../js/jquery-cookie/jquery.cookie.js"></script>
<script>
<?php echo '
function Msg(msg){
	if(msg.length!=0){
		alert(msg);
		return;
	}
}
'; ?>

</script>
</head>
<body>
<style>
<?php echo '
/**
  * Compressed Reset
  */
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,tafble,caption,tabody,tafoot,tahead,tar,tah,tad{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}:focus{outline:0}ins{text-decoration:none}del{text-decoration:line-through}tabfle{border-collapse:collapse;border-spacing:0}

body{ margin: 0px; padding: 0px; background: #999999;}
.wrapper{ margin: 0 auto; width:950px; background: #FFFFFF;}
.wrapper .mainContent{ width: 100%; float: left; background: url(\'../images/bk.png\') left top repeat-y #FFF;}
.wrapper .mainContent .leftContent { width: 164px; float: left;}
.wrapper .mainContent .middleContent { width: 665px; padding:30px 40px 30px; float: left;}
.wrapper .mainContent .middleContent .title { border-bottom: 1px solid #999;}
.wrapper .mainContent .middleContent .title img { vertical-align: bottom; }
.wrapper .footer{ clear: both; width: 950px; height: 104px;}
.wrapper .contactUs{ width: 140px; height: 104px; background: url(\'../images/down_1_out.jpg\') no-repeat; float: left;}
.wrapper .contactUs:hover{ background: url(\'../images/down_1_in.jpg\') no-repeat; }
.wrapper .preLoad { display: none; background: url(\'../images/down_1_in.jpg\') no-repeat;}
.wrapper .copyright{ color: #333; width: 746px; height: 104px; background: url(\'../images/down_2.jpg\') no-repeat; float: left; }
.wrapper .copyright div{ float: right; padding: 35px 0 0 0; text-align: center; line-height:18px; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 2px;}
.wrapper .footerRight { width: 64px; height: 104px; background: url(\'../images/down_3.jpg\') no-repeat; float: left; }
.pagination { text-align: center; margin:25px 0 15px 0;}
.pagination span { color: #666666; font-family: "Times New Roman",Times,serif; font-size: 12px; letter-spacing: 3px; line-height: 17px;}
.pagination span.mark { font-weight: bold; color: #bd0000;}
.listIcon { clear:both; width: 13px; height: 33px; background:#dbe6ec; display: block; float: left; margin-right:5px;}
.listIconSN { float: left; margin-top: 21px;}
'; ?>

</style>
<div class="wrapper">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['headerPath'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="mainContent">
<div class="leftContent">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['logInfo'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="middleContent">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['contentPath'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
<div class="footer">
	<img class="preLoad" src="../images/down_1_in.jpg" />
	<div class="contactUs"></div>
	<div class="copyright">
		<div>
		<?php echo $this->_tpl_vars['requirement']; ?>
<BR>
		<?php echo $this->_tpl_vars['copyright']; ?>
<BR>
		<?php echo $this->_tpl_vars['address']; ?>

		</div>
	</div>
	<div class="footerRight"></div>
</div>
</div>
<script>
Msg('<?php echo $this->_tpl_vars['Msg']; ?>
');
<?php echo '
;(function($){
	$(".contactUs").click(function(){
		document.location.href= "contect.php";
	});
})(jQuery);
'; ?>

</script>
</body>
</html>