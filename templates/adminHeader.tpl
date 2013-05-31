<style>
{literal}
.preload { display: none;}
.header { width: 950px; height: 159px;}
.header .logo { width: 164px; height: 159px; float: left;}
.header .navigtion { float: left; width: 786px; height:159px;}
.header .navigtionLeft { float: left; width: 31px; height:159px; background:url('../images/TOP_1.jpg') no-repeat left top;}
.header .navigtionTop { float: left; width:755px; height: 46px; background:url('../images/TOP_2.jpg') no-repeat left top;}
.header .navigationMenu { float: left;}
.header .navigationMenu>li { height: 113px; cursor: pointer; float: left; position: relative;}
.header .navigationMenu .news { width: 100px; background:url('../images/menu_news_out.jpg') no-repeat;}
.header .navigationMenu .news:hover { background:url('../images/menu_news_in.jpg') no-repeat;}
.header .navigationMenu .news.selected { background:url('../images/menu_news_in.jpg') no-repeat;}
.header .navigationMenu .product { width: 102px; background:url('../images/menu_product_out.jpg') no-repeat;}
.header .navigationMenu .product:hover { background:url('../images/menu_product_in.jpg') no-repeat;}
.header .navigationMenu .product.selected { background:url('../images/menu_product_in.jpg') no-repeat;}
.header .navigationMenu .trans { width: 102px; background:url('../images/menu_trans_out.jpg') no-repeat;}
.header .navigationMenu .trans:hover { background:url('../images/menu_trans_in.jpg') no-repeat;}
.header .navigationMenu .trans.selected { background:url('../images/menu_trans_in.jpg') no-repeat;}
.header .navigationMenu .memberCenter { width: 103px; background:url('../images/menu_cont_admin_out.jpg') no-repeat;}
.header .navigationMenu .memberCenter:hover { background:url('../images/menu_cont_admin_in.jpg') no-repeat;}
.header .navigationMenu .memberCenter.selected { background:url('../images/menu_cont_admin_in.jpg') no-repeat;}
.header .navigationMenu .order { width: 101px; background:url('../images/menu_order_out.jpg') no-repeat;}
.header .navigationMenu .order:hover { background:url('../images/menu_order_in.jpg') no-repeat;}
.header .navigationMenu .order.selected { background:url('../images/menu_order_in.jpg') no-repeat;}
.header .navigationMenu .admin { width: 99px; background:url('../images/menu_admin_out.jpg') no-repeat;}
.header .navigationMenu .admin:hover { background:url('../images/menu_admin_in.jpg') no-repeat;}
.header .navigationMenu .admin.selected { background:url('../images/menu_admin_in.jpg') no-repeat;}
.header .navigationMenu .email { width: 100px; background:url('../images/TOP_12.jpg') no-repeat;}
.header .navigationMenu .email:hover { background:url('../images/TOP_11.jpg') no-repeat;}
.header .navigationMenu .email.selected { background:url('../images/TOP_11.jpg') no-repeat;}
.header .navigtionMiddle { float: left; width:35px; height: 113px; background:url('../images/TOP_3.jpg') no-repeat left top;}
.header .navigtionRight { float: right; width: 48px; height: 113px; background: url('../images/TOP_5.jpg') no-repeat; }
{/literal}
</style>
<div class="preload">
	<img src="../images/menu_news_out.jpg"/><img src="../images/menu_news_in.jpg"/>
	<img src="../images/menu_product_out.jpg"/><img src="../images/menu_product_in.jpg"/>
	<img src="../images/menu_trans_out.jpg"/><img src="../images/menu_trans_in.jpg"/>
	<img src="../images/menu_cont_admin_out.jpg"/><img src="../images/menu_cont_admin_in.jpg"/>
	<img src="../images/menu_order_out.jpg"/><img src="../images/menu_order_in.jpg"/>
	<img src="../images/menu_admin_out.jpg"/><img src="../images/menu_admin_in.jpg"/>	
	<img src="../images/TOP_12.jpg"/><img src="../images/TOP_11.jpg"/>	
</div>
<div class="header">
	<div class="logo"><a href="admin.php"><img src="../images/logo.jpg" width="164" height="159" border="0"></a></div>
	<div class="navigtion">
		<div class="navigtionLeft"></div>
		<div class="navigtionTop"></div>
		<ul class="navigationMenu">
			<li class="news"></li>
			<li class="product"></li>
			<li class="trans"></li>
			<li class="memberCenter"></li>
			<li class="order"></li>
			<li class="admin"></li>
			<li class="email"></li>
		</ul>		
		<div class="navigtionRight"></div>				
	</div>	
</div>
<script>
{literal}
;(function($){
	$('.navigationMenu li').bind('click', function(evt) {
		var target = $(evt.target), className = target.attr('class');
		switch(className) {
		case "news":
			document.location.href = 'admin_news.php';
			break;
		case "product":
			document.location.href = 'admin_products.php';
			break;
		case "trans":
			document.location.href = 'admin_trans.php';
			break;
		case "memberCenter":
			document.location.href = 'admin_members.php';
			break;
		case "order":
			document.location.href = 'admin_orders.php';
			break;
		case "admin":
			document.location.href = 'admin_managers.php';
			break;
		case "email":
			document.location.href = 'admin_emails.php';
			break;
		}
	});
})(jQuery);
{/literal}
</script>