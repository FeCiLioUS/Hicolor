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
.header .navigationMenu .subMenu { z-index: 1; display: none; position: absolute; border: 1px #999999 solid; left:-12px; top:92px; min-width:120px;}
.header .navigationMenu .subMenu li{ background: url('../images/menu_sub_out.jpg') no-repeat #FFFFFF; height: 30px; padding:0px 5px; text-align: center; line-height:37px; }
.header .navigationMenu .subMenu li a{ text-decoration: none; color: #999; font-family: "Times New Roman",Times,serif; font-size: 12px; letter-spacing: 2px;}
.header .navigationMenu .subMenu li a:hover{ color: #666;}
.header .navigationMenu .about .subMenu li:hover{ background: url('../images/menu_sub_in.jpg') no-repeat #FFFFFF;}
.header .navigationMenu .product .subMenu li:hover{ background: url('../images/menu_arri_sub_in.jpg') no-repeat #FFFFFF;}
.header .navigationMenu .qanda .subMenu li:hover{ background: url('../images/menu_qa_sub_in.jpg') no-repeat #FFFFFF;}
.header .navigationMenu .memberCenter .subMenu li:hover{ background: url('../images/menu_pers_sub_in.jpg') no-repeat #FFFFFF;}
.header .navigationMenu .about { width: 100px; background:url('../images/menu_about_out.jpg') no-repeat;}
.header .navigationMenu .about:hover { background:url('../images/menu_about_in.jpg') no-repeat;}
.header .navigationMenu .about.selected { background:url('../images/menu_about_in.jpg') no-repeat;}
.header .navigationMenu .product { width: 102px; background:url('../images/menu_arri_out.jpg') no-repeat;}
.header .navigationMenu .product:hover { background:url('../images/menu_arri_in.jpg') no-repeat;}
.header .navigationMenu .product.selected { background:url('../images/menu_arri_in.jpg') no-repeat;}
.header .navigationMenu .qanda { width: 102px; background:url('../images/menu_q_and_a_out.jpg') no-repeat;}
.header .navigationMenu .qanda:hover { background:url('../images/menu_q_and_a_in.jpg') no-repeat;}
.header .navigationMenu .qanda.selected { background:url('../images/menu_q_and_a_in.jpg') no-repeat;}
.header .navigationMenu .memberCenter { width: 103px; background:url('../images/menu_pers_out.jpg') no-repeat;}
.header .navigationMenu .memberCenter:hover { background:url('../images/menu_pers_in.jpg') no-repeat;}
.header .navigationMenu .memberCenter.selected { background:url('../images/menu_pers_in.jpg') no-repeat;}
.header .navigationMenu .ServiceCenter { width: 101px; background:url('../images/menu_service_out.jpg') no-repeat;}
.header .navigationMenu .ServiceCenter:hover { background:url('../images/menu_service_in.jpg') no-repeat;}
.header .navigationMenu .ServiceCenter.selected { background:url('../images/menu_service_in.jpg') no-repeat;}
.header .navigationMenu .kindlyLink { width: 99px; background:url('../images/menu_link_out.jpg') no-repeat;}
.header .navigationMenu .kindlyLink:hover { background:url('../images/menu_link_in.jpg') no-repeat;}
.header .navigationMenu .kindlyLink.selected { background:url('../images/menu_link_in.jpg') no-repeat;}
.header .navigtionMiddle { float: left; width:35px; height: 113px; background:url('../images/TOP_3.jpg') no-repeat left top;}
.header .websiteMode { float: left;}
.header .websiteMode>li{ width: 65px; height: 19px; cursor: pointer;}
.header .websiteMode>li.selected { cursor: default;}
.header .websiteMode .traditionalChinese { background:url('../images/menu_tra_out.jpg') no-repeat;}
.header .websiteMode .traditionalChinese:hover { background:url('../images/menu_tra_in.jpg') no-repeat;}
.header .websiteMode .traditionalChinese.selected { background:url('../images/menu_tra_in.jpg') no-repeat;}
.header .websiteMode .English { background:url('../images/menu_eng_out.jpg') no-repeat;}
.header .websiteMode .English:hover { background:url('../images/menu_eng_in.jpg') no-repeat;}
.header .websiteMode .English.selected { background:url('../images/menu_eng_in.jpg') no-repeat;}
.header .websiteMode .SimpleChinese { height: 20px; background:url('../images/menu_chi_out.jpg') no-repeat;}
.header .websiteMode .SimpleChinese:hover { background:url('../images/menu_chi_in.jpg') no-repeat;}
.header .websiteMode .SimpleChinese.selected { background:url('../images/menu_chi_in.jpg') no-repeat;}
.header .websiteMode .discussion { background:url('../images/menu_dis_out.jpg') no-repeat;}
.header .websiteMode .discussion:hover { background:url('../images/menu_dis_in.jpg') no-repeat;}
.header .websiteMode .discussion.selected { background:url('../images/menu_dis_in.jpg') no-repeat;}
.header .websiteMode .navigtionMiddleBottom { height: 36px; background:url('../images/TOP_4.jpg	') no-repeat;}
.header .navigtionRight { float: left; width: 48px; height: 113px; background: url('../images/TOP_5.jpg') no-repeat; }

{/literal}
</style>
<div class="preload">
	<img src="../images/menu_about_out.jpg"/><img src="../images/menu_about_in.jpg"/>
	<img src="../images/menu_arri_out.jpg"/><img src="../images/menu_arri_in.jpg"/>
	<img src="../images/menu_q_and_a_out.jpg"/><img src="../images/menu_q_and_a_in.jpg"/>
	<img src="../images/menu_pers_out.jpg"/><img src="../images/menu_pers_in.jpg"/>
	<img src="../images/menu_service_out.jpg"/><img src="../images/menu_service_in.jpg"/>
	<img src="../images/menu_link_out.jpg"/><img src="../images/menu_link_in.jpg"/>
	<img src="../images/menu_tra_out.jpg"/><img src="../images/menu_tra_in.jpg"/>
	<img src="../images/menu_eng_out.jpg"/><img src="../images/menu_eng_in.jpg"/>
	<img src="../images/menu_chi_out.jpg"/><img src="../images/menu_chi_in.jpg"/>
	<img src="../images/menu_dis_out.jpg"/><img src="../images/menu_dis_in.jpg"/>
</div>
<div class="header">
	<div class="logo"><a href="about.php"><img src="../images/logo.jpg" width="164" height="159" border="0"></a></div>
	<div class="navigtion">
		<div class="navigtionLeft"></div>
		<div class="navigtionTop"></div>
		<ul class="navigationMenu">
			<li class="about">
				<ol class="subMenu">
					<li><a href="about.php">最新消息</a></li>
					<li><a href="about_company.php">公司簡介</a></li>
				</ol>
			</li>
			<li class="product">
				<ol class="subMenu">
					{foreach from=$productArray item= list key=attr}						
						<li>							
							<a href="arri.php?MODE={$list[0].SEQ_NBR}">{$list[1]}</a>
						</li>
					{/foreach}
				</ol>
			</li>
			<li class="qanda">
				<ol class="subMenu">
					<li><a href="files_mo.php">檔案製作規則</a></li>
					<li><a href="files_trans.php">檔案傳輸方式</a></li>
				</ol>
			</li>
			<li class="memberCenter">
				<ol class="subMenu">
					{if $loginStatus == false}
					<li><a href="regist.php">加入會員</a></li>
					{else}
					<li><a href="fix_regist.php">會員資料修改</a></li>
					<li><a href="fix_secu.php">密碼修改</a></li>
					<li><a href="sales_car.php">購物車</a></li>
					<li><a href="status.php">交易狀態及紀錄</a></li>
					{/if}					
					<li><a href="interest.php">會員權益和義務</a></li>					
				</ol>
			</li>
			<li class="ServiceCenter"></li>
			<li class="kindlyLink"></li>
		</ul>
		<div class="navigtionMiddle"></div>
		<ul class="websiteMode">
			<li class="traditionalChinese" title="繁體中文"></li>
			<li class="English" title="英文"></li>
			<li class="SimpleChinese" title="簡體中文"></li>			
			<li class="discussion" title="留言板"></li>
			<li class="navigtionMiddleBottom"></li>
		</ul>
		<div class="navigtionRight"></div>				
	</div>	
</div>
<script>
{literal}
;(function($){
	$(".websiteMode .traditionalChinese").addClass("selected");
	$(".header .navigationMenu .ServiceCenter").click(function(){
		document.location.href= "service.php";
	});
	$(".header .navigationMenu .kindlyLink").click(function(){
		document.location.href= "link.php";
	});
	$(".header .navigationMenu>li").hover(
		function(){			
			$(this).children().show();
		},
		function(){
			$(this).children().hide();
		}
	);
})(jQuery);
{/literal}
</script>