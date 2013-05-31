<script>
{literal}
function fix_data(){
top.frames['topFrame'].location.href = 'menu_pers.htm';
top.frames['mainFrame'].location.href = 'fix_regist.php';
}
function mail_go(){
	var M_NAME=document.ml_to.from_name.value;
    var M_EMAIL=document.ml_to.from_mail.value;
    var M_SUB=document.ml_to.mail_sub.value;
    var M_CHAR=document.ml_to.mail_char.value;
	if(M_NAME==""){
	    alert("請輸入您的姓名！");
		document.ml_to.from_name.focus();
		return false;
	}else if(!M_EMAIL || !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(M_EMAIL))){	  
	    alert("請輸入您的電子信箱！");
		document.ml_to.from_mail.focus();
		return false;
    }else if(!M_SUB){
	    alert("請輸入主旨！");
		document.ml_to.mail_sub.focus();
		return false;
	}else if(!M_CHAR){
	    alert("請輸入內容！");
		document.ml_to.mail_char.focus();
		return false;
	}
}
function Msg(Msg){
    if(Msg.length!=0){
	alert(Msg);
	return;
	}
}
{/literal}
</script>
<style>
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
#info_tab input,
#info_tab textarea{
	margin-top:10px;
}
.info {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	letter-spacing: 2px;
	color: #333333;
}
.menu {
	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;	
}
.style6 {font-size: 11px; letter-spacing: 4px; font-variant: normal; font-family: "Times New Roman", Times, serif;}
.line {
	clear: left;
	height: 2px;
	width: 100px;
	word-spacing: 10em;
	display: block;
	margin: 40px;
	padding: 40px;
}
.contents {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	letter-spacing: 3px;
	color: #666666;
	line-height: 17px;
}
.topic {
	font-family: "Times New Roman", Times, serif;
	font-size: 15px;
	letter-spacing: 2px;
}
.style8 {font-family: "Times New Roman", Times, serif; font-size: 15px; letter-spacing: 2px; color: #0099CC; }
.link_num {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	letter-spacing: 3px;
}
.style12 {color: #0099CC}
.style46 {font-family: "Times New Roman", Times, serif; font-size: 15px; letter-spacing: 2px; color: #FFFFFF; }
{/literal}
</style>
<form name="ml_to" action="user_mail.php" method="post" onSubmit="javascript:return mail_go();">
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" id="info_tab" name="info_tab">
        <tr>
            <td>
                <table width="400px" height="421" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="12">
                            <div align="left">
                                <img src="../images/sub_tab.jpg" width="13" height="33" />
                                <img src="../images/sub_number_0.jpg" width="9" height="10" />
                                <img src="../images/sub_number_1.jpg" width="10" height="10" />
                                <span class="info"> 輸入您的姓名 </span>
                            </div>
                        </td>                        
                    </tr>
                    <tr>
                        <td>                            
							<input type="text" name="from_name" style="font-size:9pt;width:400px;height:17px;" value="$_GET[from_name]" />                            
                        </td>
                    </tr>
                    <tr valign="top">
                        <td height="10">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="13">
                            <img src="../images/sub_tab.jpg" width="13" height="33" />
                            <img src="../images/sub_number_0.jpg" width="9" height="10" />
                            <img src="../images/sub_number_2.jpg" width="9" height="10" />
                            <span class="info"> 輸入您的E-mail</span>
                        </td>
                    </tr>
                    <tr>
                        <td height="16">
                            <input type="text" name="from_mail" style="font-size:9pt;width:400px;height:17px;" value="$_GET[from_mail]" />
                        </td>
                    </tr>
                    <tr>
                        <td height="19">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="13">
                            <img src="../images/sub_tab.jpg" width="13" height="33" />
                            <img src="../images/sub_number_0.jpg" width="9" height="10" />
                            <img src="../images/sub_number_3.jpg" width="10" height="10" />
                            <span class="info"> 輸入主旨 </span>
                        </td>
                    </tr>
                    <tr>
                        <td height="19">
                            <input type="text" name="mail_sub" style="font-size:9pt;width:400px;height:17px;" value="$_GET[mail_sub];" />
                        </td>
                    </tr>
                    <tr>
                        <td height="13">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="13">
							<img src="../images/sub_tab.jpg" width="13" height="33" />
							<img src="../images/sub_number_0.jpg" width="9" height="10" />
							<img src="../images/sub_number_4.jpg" width="9" height="10" />
							<span class="info"> 輸入內容 </span>
						</td>                        
                    </tr>
                    <tr valign="top">
                        <td height="120">
                            <textarea name="mail_char" style="font-size:9pt;width:400px;height:120px;">$_GET[mail_char]</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="21">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                        <td height="22">
                            <div align="center">
								<span class="info">
									<input name="&#36865;&#20986;" type="submit" id="&#36865;&#20986;" value="&#23492;&#20986;" style="font-size:9pt;width:63;height:22px;" />
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>               
            </td>
        </tr>
    </table>
</form>