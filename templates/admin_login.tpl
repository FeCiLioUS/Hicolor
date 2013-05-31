<style>
{literal}
.logInfo .memberLogIn { width: 164px; background:url('../images/admin_lelt_1.jpg') no-repeat; padding-top: 41px; text-align: center; }
.logInfo .logInLabel { width: 60px; height: 57px; float: left; background:url('../images/login_cont.jpg') no-repeat;}
.logInfo .userInput { width:104px; height:57px; float: left; text-align: left;}
.logInfo .loginAccount, .logInfo .loginPWD { font-size: 12px; width:65px; height: 14px; margin-top: 4px; margin-bottom: 3px;}
.logInfo .memberLogIn input.loginButton, .logInfo .memberLogOut input.logoutButton { width:40; height:22px; font-size: 12px; margin-top: 4px; margin-bottom: 2px;}
.logInfo .memberLogOut { text-align: center;}
.logInfo .hotKey { text-align: center; margin:5px 0px;}
.logInfo .hotKey li a{ font-size: 12px; color: #990033; line-height:24px;}
.logInfo .categories h1{ font-size:12px; line-height:21px; text-align:center; letter-spacing: 3px; margin: 9px 0px 5px 22px; width: 112px; height: 21px; color:#FFF; background:#666699;}
.logInfo .categories .list{ margin-left:18px; width: 120px; text-align: center;}
.logInfo .categories .list li a{ text-decoration: none; font-size: 12px; color: #333; line-height:24px;}
.logInfo .categories .list li a:hover{ text-decoration: underline;}
.visitedCount { font-size: 12px; padding: 0; text-align: center; margin-top: 20px; }
.count { font-weight: bold; color: #CC0000;}
{/literal}
</style>
{if $loginStatus == 'true'}
<div class="logInfo">
	<form action="../pages/admin_logout_action.php" method="post" name="admin_login">
		<div class="memberLogOut">
			<input type="submit" class="logoutButton" name="Submit" value="登出">
		</div>
	</form>	
</div>
<div class="visitedCount">造訪次數為 <span class="count">{$counter}</span> 人</div>
{else}
<div class="logInfo">
	<form action="../pages/admin_login_action.php" method="post" name="admin_login">
		<div class="memberLogIn">
			<div class="logInLabel"></div>
			<div class="userInput">
				<input type="text" class="loginAccount" name="admin_name">
				<input type="password" class="loginPWD" name="admin_pass">
			</div>
			<input type="button" class="loginButton" name="Submit" value="登入">
		</div>
	</form>	
</div>
{/if}
<script>
{literal}
;(function($){
	var formDom = $('.logInfo input'),
		logInfo = $(".logInfo"), 
		loginButton = $(".logInfo .loginButton");
	loginButton.click(function(){
		var admin_name = document.admin_login.admin_name.value, admin_pass = document.admin_login.admin_pass.value;
		if(admin_name=="" || admin_name.length<4 || admin_name.length>32){
			alert("必需輸入4個字元以上及32個字元以下的帳號名稱！");
			document.admin_login.admin_name.focus();
			return; 		
		}else if(admin_name.match(/[\"|\'|\$]/g)){
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.admin_login.admin_name.focus();
			return; 
		}else if(admin_pass.length<6 || admin_pass.length>32){	    
			alert("必需輸入6個字元以上32個字元以下的帳號密碼！");
			document.admin_login.admin_pass.focus();
			return;		
		}else if(admin_pass.match(/[\"|\'|\$]/g)){
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.admin_login.admin_pass.focus();
			return;
		}
		document.admin_login.submit();
	});	
	formDom.bind('keypress', function (evt) {
		if(evt.keyCode == 13) {
			loginButton.trigger('click');
		}		
	});
})(jQuery);
{/literal}
</script>