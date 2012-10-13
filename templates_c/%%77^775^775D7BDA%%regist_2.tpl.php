<?php /* Smarty version 2.6.26, created on 2012-10-10 16:05:10
         compiled from ../templates/regist_2.tpl */ ?>
<style type="text/css">
<?php echo '
.registContent { bordder: 1px #999 solid; padding: 10px;}
.registContent .NotFoundData { color: #bd0000; font-size: 14px; text-align: center; font-weight: bold; line-height: 50px; letter-spacing: 2px;}
.registContent li { border-bottom: 1px #666 solid; width: 100%; display: inline-block; margin-top:20px; padding-bottom: 20px;}
.registContent li:first-child { margin-top:0px;}
.registContent li.last{border-bottom: none;}
.registContent li .completeTitle { color: #666666; text-decoration: underline; font-size: 12px; line-height:54px; margin-left:15px; letter-spacing: 3px;}
.registContent li .completeTitle.regist { color: #660000;}
.registContent li .registContentDetail { color: #666666; font-family: Times New Roman,Times,serif; font-size: 12px; letter-spacing: 3px; line-height: 20px;}
.registContent li .registContentDetail li{ border: none; margin: 0px; padding: 0px; text-align: center;}
.registContent li .registContentDetail li .policy{font-size:9pt;width:560;height:255px; margin: 0 auto;}
#registTable{ border: 1px #999 solid;}
.registContent li .registContentDetail li .contents {
    color: #666666;
    font-family: "Times New Roman",Times,serif;
    font-size: 12px;
    letter-spacing: 3px;
    line-height: 17px;
}
.registContent li .registContentDetail li .style38 {
    color: #990000;
    font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    font-variant: normal;
    letter-spacing: 4px;
    line-height: 20px;
}
.registFooter {clear:both; width: 100%; text-align:center; margin-top: 25px; }
.registFooter .footerTop{ background: url(\'../images/Aarrowhand_b1.jpg\') no-repeat center top; height: 23px;}
.registFooter .footerBottom{ background: url(\'../images/Aarrowhand_b2.jpg\') no-repeat center top; height: 23px;}
.registFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:30px; padding-top:7px;}
.registFooter .subCateSelection .reset,
.registFooter .subCateSelection .cancel,
.registFooter .subCateSelection .submit{ font-size:9pt;width:50;height:22px; }
'; ?>

</style>
<script>
<?php echo '
$(".navigationMenu .memberCenter").addClass("selected");
'; ?>

</script>
<div class="title">
	<img src="../images/arrie_tile_member.jpg" width="153" height="27">
</div>
<form action="regist_3.php" method="post" name="cont">
<ul class="registContent">
	<li>
		<span class="listIcon"></span><img src="../images/sub_number_0.jpg" class="listIconSN" /><img src="../images/sub_number_2.jpg" class="listIconSN" />
		<span class="completeTitle regist">設定帳號及密碼</span>
		<ul class="registContentDetail">
			<li>				
				<table id="registTable" width="100%" height="215" border="0" cellpadding="0" cellspacing="3">
					<tr valign="middle" bgcolor="#D9D9D9" class="contents">
						<td width="15%" height="17" rowspan="2">
							<div align="center">帳號設定</div>
						</td>
						<td height="40" valign="middle" bgcolor="#E6E6E6">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="35%">
										<div align="center">
											<input type="text" name="ACCOUNT" style="font-size:9pt;width:150px;height:20px;">
										</div>
									</td>
									<td width="65%">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr valign="middle" bgcolor="#D9D9D9" class="contents">
						<td height="46" bgcolor="#E6E6E6">
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="18" height="53"><div align="center"></div></td>
									<td width="484" height="53">
										<div align="left">
											<span class="style38">※（填入4～32個字元的英文或及數字或及_符號，第一個字元需為英文字母。）</span>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr valign="middle" bgcolor="#D9D9D9" class="contents">
						<td height="17" rowspan="2">
							<div align="center">密碼設定</div>
						</td>
						<td height="40" bgcolor="#E6E6E6">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="35%">
										<div align="center">
											<input type="password" name="PWD" style="font-size:9pt;width:150px;height:20px;">
										</div>
									</td>
									<td width="70%">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr valign="middle" bgcolor="#D9D9D9" class="contents">
						<td height="17" bgcolor="#E6E6E6">
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="18" height="35"><div align="center"></div></td>
									<td width="484" height="35">
										<div align="left">
											<span class="style38">※（填入不含任何符號之6～32個字元的小寫英文或及數字。）</span>
										</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr valign="middle" bgcolor="#D9D9D9" class="contents">
						<td height="17">
							<div align="center">確認密碼</div>
						</td>
						<td height="40" bgcolor="#E6E6E6">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="35%">
										<div align="center">
											<input type="password" name="CPWD" style="font-size:9pt;width:150px;height:20px;">
										</div>
									</td>
									<td width="70%">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>				
			</li>
		</ul>
	</li>		
</ul>
<div class="registFooter">
	<div class="footerTop"></div>
	<div class="subCateSelection">
		<input type="button" name="Submit" value="送出" class="submit" />　
		<input name="reset" type="reset" value="重新設定" class="reset">
		<input name="cancel" type="button" value="上一步" class="cancel">
	</div>
	<div class="footerBottom"></div>
</div>
</form>
<script>
<?php echo '
function regist_2(){
    var ACCOUNT=document.cont.ACCOUNT.value;
	var ACCOUNT_check=ACCOUNT.substr(0,1);
	var PWD=document.cont.PWD.value;
	var CPWD=document.cont.CPWD.value;
    if(ACCOUNT.length<4 || ACCOUNT.length>32){
	    alert(\'請輸入４個字元以上或32個字元以下的帳號！\');
		document.cont.ACCOUNT.focus();
		return;
	}
	if(ACCOUNT_check.match(/[^a-z|^A-Z]/g)){	
        alert("帳號第一個字元是英文字母！") 
		document.cont.ACCOUNT.focus();
        return;  
	}
	if(ACCOUNT.match (/\\W/)){
	    alert("帳號裡不得有英文字母、數字或底線以外的符號！") 
		document.cont.ACCOUNT.focus();
        return;  
	}
	if(PWD.length<6 || PWD.length>32){
	    alert("請輸入6個字元以上或32個字元以下的密碼！") 
		document.cont.PWD.focus();
        return;  
	}
	if(PWD.match(/[^a-z|^0-9]/g)){
	    alert("密碼裡不得有小寫英文字母或數字以外的字元！") 
		document.cont.PWD.focus();
        return;  
	}
	if((CPWD.indexOf(PWD,0))<0){
	    alert("確認密碼與密碼不同，請確認您所輸入的密碼！")		
        return; 
	}	
	document.cont.submit();	
	
}
function cancel(){
	document.location.href= "regist.php";
}
$(".submit").bind("click", regist_2);
$(".cancel").bind("click", cancel);
'; ?>

</script>