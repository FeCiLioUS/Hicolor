<SCRIPT>
{literal}
function SetForm(){
	//功能:傳送表單資料 
	var img_tal = "";
	var i = 0;
	while (i < 1) {
		var Img_nm = document.upload_photo.elements[(i*2)].value;
		var Img_file = document.upload_photo.elements[(i*2)+1].value;
		Img_file = Img_file.toLowerCase();
		IMG_MODE = Img_file.split(".");
		IMG = IMG_MODE.pop();
		var MOD = "jpg,jpeg,bmp,gif,tif";
		if(Img_nm.length == 0){
			alert('請填寫對應名稱！');
			document.upload_photo.elements[(i*2)].focus();
			return;
		}else if(Img_nm.match(/[\"|\'|\$]/g)) {
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.upload_photo.elements[(i*2)].focus();
			return;
		}else if (Img_file == 0) {
			alert('請確定上傳附加檔路徑及檔案！');
			document.upload_photo.elements[((i*2)+1)].focus();
			return;
		}else if(Img_file.match(/[\"|\'|\$]/g)) {
			alert("不得輸入「\",'\,\$」特殊字元！");
			document.upload_photo.elements[((i*2)+1)].focus();
			return;
		}else if(!MOD.match(IMG)) {
			alert("請上傳「jpg,jpeg,bmp,gif,tif」的檔案格式！");
			document.upload_photo.elements[((i*2)+1)].focus();
			return;
		}
		i++;
	}		 
	document.upload_photo.submit();			 
}
{/literal}
</SCRIPT>
<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
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
.link_num {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	letter-spacing: 3px;
}
.PS {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	position: static;
	width: 260px;
	clip: rect(auto,auto,auto,auto);
}
.sub_name {
	font-family: "華康中黑體(P)";
	font-size: 18px;
}
.style31 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #FFFFFF; font-variant: normal; }
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; letter-spacing: 2px; color: #FFFFFF; }
.style33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; letter-spacing: 2px; color: #FFFFFF; }
{/literal}
</style>
<form action="NEWS_photo_Upload_action.php" method="post" enctype="multipart/form-data" name="upload_photo">
	<table width="400"  border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="../images/Aarrowhand_b3.JPG" width="400" height="23"></td>
		</tr>
		<tr>
			<td>
				<table width="400"  border="1" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
					<tr bgcolor="#999999">
						<td width="168" height="30" class="style31"><div align="center">圖檔名稱</div></td>
						<td height="30"><div align="center" class="style31">上傳檔案</div></td>
					</tr>
					<tr>
						<td height="30">
							<div align="center">
								<input name="Name1" value="" type="text" style="font-size:9pt;width:100;height:14px;" size="20">
							</div>
						</td>
						<td height="30">
							<div align="center">
								<input type="file" name="upload1" style="font-size:9pt;width:150;height:20px;">
							</div>
						</td>
					</tr>				
					<tr bgcolor="#999999">
						<td height="35" colspan="2">
							<div align="center">
								<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px" onclick="window.close();" type="button" value="關閉視窗" name="Button">　
								<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px" type="reset" value="重新設定" name="reset">            　
								<INPUT name="開始上傳" type="button" id="開始上傳" style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px" onClick="return SetForm();" value="開始上傳">
								<input type="hidden" name="Bgl_Num" value="{$smarty.get.Bgl_Num}">
								<input type="hidden" name="Amount" value="1">
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><img width="400" height="23" src="../images/Aarrowhand_b4.JPG"></td>
		</tr>
	</table>
</form>