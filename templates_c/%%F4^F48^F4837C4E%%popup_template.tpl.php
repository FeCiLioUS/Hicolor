<?php /* Smarty version 2.6.26, created on 2012-09-22 02:24:11
         compiled from popup_template.tpl */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>
<?php if ($this->_tpl_vars['pageTitle']): ?>
<?php echo $this->_tpl_vars['pageTitle']; ?>

<?php else: ?>
印刷購物網-HiColor-高品質合版印刷
<?php endif; ?>
</title>
<style>
<?php echo '
/**
  * Compressed Reset
  */
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,tafble,caption,tabody,tafoot,tahead,tar,tah,tad{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}:focus{outline:0}ins{text-decoration:none}del{text-decoration:line-through}tabfle{border-collapse:collapse;border-spacing:0}
body{ margin: 0px; padding: 0px; background: #FFF;}
img{
	vertical-align: top;
}
td{
	font-size:12px;
}
'; ?>

</style>
<script src="../lib/framework/jquery/jquery-1.6.4.js"></script>
<script src="../js/jquery-text-overflow/jquery.text-overflow.js"></script>
<script src="../js/jquery-cookie/jquery.cookie.js"></script>
<script src="../js/jquery-getUrlParam/jquery.getUrlParam.js"></script>
<script>
<?php echo '
function Msg(msg){
	if(msg.length!=0){
		if(Msg == "您尚未登入，請先登入會員！"){
			alert(Msg);
			if(window.opener) {
				window.close();
			}
		}else {
			alert(msg);
		}		
		return;
	}
}
'; ?>

</script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['contentPath'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script>
Msg('<?php echo $this->_tpl_vars['Msg']; ?>
');
</script>
</body>
</html>