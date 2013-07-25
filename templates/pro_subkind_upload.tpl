<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.progress {
	background: url(../images/loading_small2.gif) no-repeat center center;
	width: 16px;
	height: 16px;
	display: none;
	float: left;
	display: none;
	margin-top: 2px;
	margin-left: 2px;
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
<form action="pro_subkind_filess_upload_action.php" method="post" enctype="multipart/form-data" onsubmit="return SetForm();" name="upload_files" class="uploadForm">
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
			  {section name="upload" start=0 loop=$smarty.get.Amount step=1}
			  <tr>
				<td height="30">
					<div align="center">
						<input name="Name{$smarty.section.upload.index+1}" class="photoName_{$smarty.section.upload.index+1}" value="" type="text" style="font-size:9pt;width:100;height:14px;" size="10" />
					</div>
				</td>
				<td height="30">
					<div align="center">
						<input type="file" name="upload{$smarty.section.upload.index+1}" class="photoFile_{$smarty.section.upload.index+1}" style="font-size:9pt;width:150;height:20px;" />
					</div>
				</td>
			  </tr>
			  {/section}
			  <tr bgcolor="#ffffff">
				<td height="35" colspan="2" style="text-align: center;">
					<div style="text-align: center; display: inline-block;">
						<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px; float: left;" onclick="window.close();" type="button" value="關閉視窗" name="Button" />
						　
						<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px; float: left;" type="reset" value="重新設定" name="reset" />
						　
						<input name="submit" type="submit" id="submit" style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 20px; float: left;" value="開始上傳">
						<input type="hidden" name="Bgl_Num" value="{$smarty.get.SEQ}">
						<input type="hidden" name="Amount" value="{$smarty.get.Amount}">	
						<div class="progress"></div>
					</div>					
				</td>
			  </tr>
		  </table></td>
		</tr>
		<tr>
			<td><img width="400" height="23" src="../images/Aarrowhand_b4.JPG"></td>
		</tr>
	</table>
</form>
<SCRIPT>
var amount = {$smarty.get.Amount}, uploadForm = $('.uploadForm'), progress = $('.progress'),
{literal}
	SetForm = function () {
		//功能:傳送表單資料 
		var img_tal = "";
		for(var n = 0; n < amount; n++) {			
			var Img_nm = $('.photoName_' + (n + 1)), Img_file = $('.photoFile_' + (n + 1)), Img_file_name, IMG_MODE, MOD = "jpg,jpeg,psd,eps,cdr,ufo,doc,docx,xls,xlsx,ppt,pptx,pps,pdf,rar,zip,ai,indd,qxd,p65,bmp,gif,tif,txt";
			
			Img_file_name = Img_file.val().toLowerCase();
			IMG_MODE = Img_file_name.split(".")[1];
			Img_file_name = Img_file_name.split(".")[0];			
			
			if (Img_nm.val().length == 0) {
				alert('請填寫對應名稱！');
				Img_nm[0].focus();
				return false;
			} else if(Img_nm.val().match(/[\"|\'|\$]/g)) {
				alert("不得輸入「\",'\,\$」特殊字元！");
				Img_nm[0].focus();
				return false; 	
			} else if (Img_file_name.length == 0) {
				alert('請確定上傳附加檔路徑及檔案！');
				Img_file[0].focus();
				return false;
			} else if(Img_file_name.match(/[\"|\'|\$]/g)) {
				alert("不得輸入「\",'\,\$」特殊字元！");
				Img_file[0].focus();
				return false; 	
			} else if(!MOD.match(IMG_MODE)) {
				alert("請上傳的檔案格式不支援！");
				Img_file[0].focus();
				return false;
			}	
		}
		
		progress.show();
		return true;
	},	
	resize_window = function  (num){		
		var table = $('.uploadForm');
		window.resizeTo(418, table.height() + 75);	
	};

resize_window();
{/literal}
</SCRIPT>