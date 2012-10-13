<style type="text/css">
{literal}
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
#registTable{ border: 1px #999 solid; margin: 0 auto; margin-top: 45px;}
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
.registFooter {clear:both; width: 100%; text-align:center; margin-top: 5px; }
.registFooter .footerTop{ background: url('../images/Aarrowhand_b1.jpg') no-repeat center top; height: 23px;}
.registFooter .footerBottom{ background: url('../images/Aarrowhand_b2.jpg') no-repeat center top; height: 23px;}
.registFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:30px; padding-top:7px;}
.registFooter .subCateSelection .reset,
.registFooter .subCateSelection .submit{ font-size:9pt;width:50;height:22px; }
{/literal}
</style>
<script>
{literal}
$(".navigationMenu .memberCenter").addClass("selected");
{/literal}
</script>
<div class="title">
	<img src="../images/pers_tile_fix_cont.jpg" width="153" height="27">
</div>
<form action="fix_secu_action.php" method="post" name="cont_pwd">
	<ul class="registContent">
		<li class="last">
			<span class="listIcon"></span><img src="../images/sub_number_0.jpg" class="listIconSN" /><img src="../images/sub_number_2.jpg" class="listIconSN" />
			<span class="completeTitle regist">輸入新密碼</span>
			<ul class="registContentDetail">
				<li>											  
					<table id="registTable" width="550" border="0" cellpadding="0" cellspacing="3">
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td  width="100" rowspan="2"><div align="center">新 密 碼</div></td>
							<td height="30" bgcolor="#E6E6E6">
								<input type="password" name="PWD" style="font-size:10pt;width:270px;height:17px;">								
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="30" bgcolor="#E6E6E6">
								<span class="style38">※（填入不含任何符號之6～32個字元的小寫英文或及數字。）</span>
							</td>
						</tr>						
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="30"><div align="center">確認密碼</div></td>
							<td bgcolor="#E6E6E6">
								<input type="password" name="PSD_CH" style="font-size:10pt;width:270px;height:17px;">
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
		</div>
		<div class="footerBottom"></div>
	</div>
</form>
<script language="JavaScript" type="text/JavaScript">
{literal}
function regist_2(){
	var PWD=document.cont_pwd.PWD.value;
	var PSD_CH=document.cont_pwd.PSD_CH.value;
	if(PWD.length<6 || PWD.length>32){
	    alert("請輸入6個字元以上或32個字元以下的密碼！") 
		document.cont_pwd.PWD.focus();
        return;  
	}
	if(PWD.match(/[^a-z|^0-9]/g)){
	    alert("密碼裡不得有小寫英文字母或數字以外的字元！") 
		document.cont_pwd.PWD.focus();
        return;  
	}
	if((PSD_CH.indexOf(PWD,0))<0){
	    alert("確認密碼與密碼不同，請確認您所輸入的密碼！")		
        return; 
	}	
	document.cont_pwd.submit();	
}
$(".submit").bind("click", regist_2);
{/literal}
</script>