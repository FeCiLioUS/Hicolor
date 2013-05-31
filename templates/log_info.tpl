<style>
{literal}
.logInfo .memberLogIn { width: 164px; background:url('../images/lelt_1.jpg') no-repeat; padding-top: 41px; text-align: center; }
.logInfo .logInLabel { width: 60px; height: 57px; float: left; background:url('../images/login_cont.jpg') no-repeat;}
.logInfo .userInput { width:104px; height:57px; float: left; text-align: left;}
.logInfo .loginAccount, .logInfo .loginPWD { font-size: 12px; width:65px; height: 14px; margin-top: 4px; margin-bottom: 3px;}
.logInfo .memberLogIn input.loginButton, .logInfo .memberLogOut input.logoutButton { width:40; height:22px; font-size: 12px; margin-top: 4px; margin-bottom: 2px;}
.logInfo .join { margin: 0 auto; width:118px; height: 33px; background:url('../images/lelt_6.jpg') no-repeat center top; cursor: pointer;}
.logInfo .memberLogOut { text-align: center;}
.logInfo .hotKey { text-align: center; margin:5px 0px;}
.logInfo .hotKey li a{ font-size: 12px; color: #990033; line-height:24px;}
.logInfo .categories h1{ font-size:12px; line-height:21px; text-align:center; letter-spacing: 3px; margin: 9px 0px 5px 22px; width: 112px; height: 21px; color:#FFF; background:#666699;}
.logInfo .categories .list{ margin-left:18px; width: 120px; text-align: center;}
.logInfo .categories .list li a{ text-decoration: none; font-size: 12px; color: #333; line-height:24px;}
.logInfo .categories .list li a:hover{ text-decoration: underline;}
{/literal}
</style>
{if $loginStatus == 'true'}
<div class="logInfo">
	<form action="user_logout_action.php" method="post" name="user_login">
		<div class="memberLogOut">
			<input type="submit" class="logoutButton" name="Submit" value="登出">
		</div>
		<ul class="hotKey">
			<li><a href="status.php">查詢交易記錄</a></li>
			<li><a href="sales_car.php">我的購物車</a></li>
		</ul>
		<input type="hidden" name="MODE" id="arriMode"/>
	</form>
</div>
{else}
<div class="logInfo">
	<form action="user_login_action.php" method="post" name="user_login">
		<div class="memberLogIn">
			<div class="logInLabel"></div>
			<div class="userInput">
				<input type="text" class="loginAccount" name="user_name">
				<input type="password" class="loginPWD" name="user_pass">
			</div>
			<input type="button" class="loginButton" name="Submit" value="登入">
		</div>
		<div class="join" title="加入會員"></div>
		<input type="hidden" name="MODE" id="arriMode"/>
	</form>
</div>
{/if}
<div class="categories">
	<h1>產品項目</h1>
	<ul class="list">
{if count($productArray) == 0}
		<li>尚無任何產品!</li>
{else}
	{foreach from=$productArray item= list key= label }
		<li><a href="arri.php?MODE={$list[0].SEQ_NBR}">{$list[1]}</a></li>
	{/foreach}
{/if}		
	</ul>
</div>
<script>
{literal}
;(function($){
{/literal}
	$("#arriMode").val({$mode});
{literal}
	var formDom = $('.logInfo input').not(".logoutButton"), logInfo = $(".logInfo"), loginButton = $(".logInfo .loginButton"), join = $(".logInfo .join");
	logInfo.append($(".categories"));
	loginButton.click(function(){
		var user_name = document.user_login.user_name.value, user_pass=document.user_login.user_pass.value;
		if(user_name=="" || user_name.length<4 || user_name.length>32){
			alert("必需輸入4個字元以上及32個字元以下的帳號名稱！");
			document.user_login.user_name.focus();
			return; 		
		}else if(user_name.match(/[\"|\'|\$]/g)){
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.user_login.user_name.focus();
			return; 
		}else if(user_pass.length<6 || user_pass.length>32){	    
			alert("必需輸入6個字元以上32個字元以下的帳號密碼！");
			document.user_login.user_pass.focus();
			return;		
		}else if(user_pass.match(/[\"|\'|\$]/g)){
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.user_login.user_pass.focus();
			return;
		}
		document.user_login.submit();
	});
	join.click(function(){
		document.location.href= "regist.php";
	});
	logInfo.bind('keypress', function (evt) {
		if(evt.keyCode == 13) {
			loginButton.trigger('click');
		}		
	});
})(jQuery);
{/literal}
</script>