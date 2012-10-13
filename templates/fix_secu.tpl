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
#registTable{ border: 1px #999 solid; margin: 0 auto; margin-top:45px;}
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
<form action="fix_secu_2.php" method="post" name="fix_cont">
	<ul class="registContent">
		<li class="last">
			<span class="listIcon"></span><img src="../images/sub_number_0.jpg" class="listIconSN" /><img src="../images/sub_number_1.jpg" class="listIconSN" />
			<span class="completeTitle regist">輸入舊帳號及密碼</span>
			<ul class="registContentDetail">
				<li>
					<table id="registTable" width="380"  border="0" cellpadding="0" cellspacing="3">
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td width="80" height="40">
								<div align="center">帳號</div>
							</td>
							<td height="40" valign="middle" bgcolor="#E6E6E6">
								<input type="text" name="ACCOUNT" style="font-size:11pt;width:250px;height:20px;">								
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="40" rowspan="2">
								<div align="center">密碼</div>
							</td>
							<td height="40" bgcolor="#E6E6E6">
								<input type="password" name="PWD" style="font-size:11pt;width:250px;height:20px;">
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
		</div>
		<div class="footerBottom"></div>
	</div>
</form>
<script language="JavaScript" type="text/JavaScript">
{literal}
function fix_co(){
    var ACCOUNT=document.fix_cont.ACCOUNT.value;
	var ACCOUNT_check=ACCOUNT.substr(0,1);
	var PWD=document.fix_cont.PWD.value;	
    if(ACCOUNT.length<4 || ACCOUNT.length>32){
	    alert('請輸入４個字元以上或32個字元以下的帳號！');
		document.fix_cont.ACCOUNT.focus();
		return;
	}else if(ACCOUNT_check.match(/[^a-z|^A-Z]/g)){	
        alert("帳號第一個字元是英文字母！") 
		document.fix_cont.ACCOUNT.focus();
        return;  
	}else if(ACCOUNT.match (/\W/)){
	    alert("帳號裡不得有英文字母、數字或底線以外的符號！") 
		document.fix_cont.ACCOUNT.focus();
        return;  
	}else if(PWD.length<6 || PWD.length>32){
	    alert("請輸入6個字元以上或32個字元以下的密碼！") 
		document.fix_cont.PWD.focus();
        return;  
	}else if(PWD.match(/[^a-z| ^0-9]/g)){
	    alert("密碼請用小寫英文字母或數字的字元！") 
		document.fix_cont.PWD.focus();
        return;  
	}else{
	    document.fix_cont.submit();
		return;
	}
}
$(".submit").bind("click", fix_co);
{/literal}
</script>