<script>
{literal}
function SetUploadForm(){
   //設定上傳物件則數
   var Amount = document.upload.Amount.value;
   var Bgl_Num = document.upload.Bgl_Num.value;
   if (Amount.length == 0 || isNaN(Amount) || Amount == 0 || Amount > 3){
       alert('請確定物件上傳的數量？\n(值介於1～3)');
       document.upload.Amount.value = 1;
       document.upload.Amount.focus();
       return;
   }else{
{/literal}
	   window.open("NEWS_BglData_Upload.php?Amount=" + Amount + '&Bgl_Num=' + Bgl_Num + '&{$urlAug}', 'Upload',"toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=yes,width=400,height=140");
{literal}
	   return;
   }           
}
function BLG_TIME(){
    if(document.news_fix.Bgl_time[0].checked == true){
	    document.news_fix.Bgl_StartDate.value = "";
		document.news_fix.Bgl_StartDate.disabled = true;
		document.news_fix.Bgl_EndDate.value = "";
		document.news_fix.Bgl_EndDate.disabled = true;
	}else{
		{/literal}
	    document.news_fix.Bgl_StartDate.value = '{$newData.Bgl_StartDate|date_format:"%Y/%m/%d"}';
		document.news_fix.Bgl_StartDate.disabled = false;
		document.news_fix.Bgl_EndDate.value = '{$newData.Bgl_EndDate|date_format:"%Y/%m/%d"}';
		document.news_fix.Bgl_EndDate.disabled = false;
		{literal}
	}
}
function data_check(){
    var Caption = document.news_fix.Caption.value;
	var Bgl_Contents = document.news_fix.Bgl_Contents.value;
	var Bgl_time = document.news_fix.Bgl_time[0].checked;
	var Bgl_StartDate = document.news_fix.Bgl_StartDate.value;	
	var Bgl_EndDate = document.news_fix.Bgl_EndDate.value;	
	if(Caption.length == 0){
	    alert("必需輸入消息標題！");
		document.news_fix.Caption.focus();
		return;		
	}else if(Caption.match(/[\"|\'|\$]/g)){
	    alert("不得輸入「\",'\,\$」特殊字元！");
		document.news_fix.Caption.focus();
		return; 	
	}else if(Bgl_Contents.length == 0){
	    alert("必需輸入消息內容！");
		document.news_fix.Bgl_Contents.focus();
		return;		
	}else if(Bgl_Contents.match(/[\"|\'|\$]/g)){
	    alert("不得輸入「\",'\,\$」特殊字元！");
		document.news_fix.Bgl_Contents.focus();
		return; 	
	}else if(Bgl_time == false){	    
	    if(Bgl_StartDate.length == 0){
		     alert("必需輸入迄始日期！");
		     document.news_fix.Bgl_StartDate.focus();
		     return;
		}else if(Bgl_EndDate.length == 0){
		     alert("必需輸入截止日期！");
		     document.news_fix.Bgl_EndDate.focus();
		     return;
		}else{
		     document.news_fix.submit();
		     return;
		}
	}else{
	    document.news_fix.submit();
		return;
	}
}
function DELUploadForm(){
   {/literal}
   window.location.href = 'news_upload_del_action.php?{$urlAug}';
   {literal}
}
{/literal}
</script>
<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
.content {
	margin-top: 10px;
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
	line-height: 20px;
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
.style26 {color: #666666}
.style32 {color: #FFFFFF}
.style50 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #990000; font-variant: normal; line-height: 20px; }
.style54 {font-size: 14px; }
.style55 {color: #666666; font-size: 14px; }
.style57 {color: #990000}
{/literal}
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="45" valign="bottom">
			<div align="center"><img src="../images/news_tile_newsfix.JPG" width="153" height="27"></div>
		</td>
	</tr>
	<tr>
		<td height="13" valign="top"><hr size="1" noshade></td>
	</tr>
	<tr>
		<td height="234">
			<form action="news_fix_action.php?{$urlAug}" method="post" name="news_fix">
			<table class="content" width="501" height="203" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width="497" height="201">
						<table width="100%" border="0" cellpadding="0" cellspacing="3">
							<tr valign="middle" bgcolor="#D9D9D9" class="style26">
								<td width="21%" height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">消息標題</div>
								</td>
								<td width="79%" height="35">
									<div align="center">
										<span class="menu style26">
											<INPUT style="FONT-SIZE: 9pt; WIDTH: 350px; HEIGHT: 20px" name="Caption" value="{$newData.Caption}">
										</span>
									</div>
								<div align="center" class="style54"></div>
								</td>
							</tr>
							<tr valign="middle" bgcolor="#D9D9D9" class="style26">
								<td height="118" bgcolor="#999999" class="menu"><div align="center" class="style32">消息內容</div></td>
								<td height="118">
									<div align="center" class="style55">
										<TEXTAREA name="Bgl_Contents" rows="7" wrap="VIRTUAL" cols="64" style="FONT-SIZE: 9pt; WIDTH: 350px; HEIGHT: 100px">{$newData.Bgl_Contents}</TEXTAREA>
									</div>								
								</td>
							</tr>
							<tr valign="middle" bgcolor="#D9D9D9" class="style26">
								<td height="65" bgcolor="#999999" class="menu"><div align="center" class="style32">消息期限</div></td>
								<td height="55">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="4%">&nbsp;</td>
											<td width="96%">
												<span class="info">
													{if $newData.Bgl_time == 0}
														<INPUT type="radio" value="0" id="Bgl_time1" name="Bgl_time" checked="checked" onClick="BLG_TIME();">
														<label for="Bgl_time1">永久顯示</label>永久顯示<BR>
														<input name="Bgl_time" id="Bgl_time2" type="radio" value="1" onClick="BLG_TIME();">
														<label for="Bgl_time2">發佈日期</label>
														<INPUT value="" name="Bgl_StartDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px">
														<label for="Bgl_time2">截止日期</label>
														<INPUT value="" name="Bgl_EndDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px">
													{else}
														<INPUT type="radio" id="Bgl_time1" value="0" name="Bgl_time" onClick="BLG_TIME();">
														<label for="Bgl_time1">永久顯示</label><BR>
														<input name="Bgl_time" id="Bgl_time2" type="radio" value="1" checked="checked" onClick="BLG_TIME();">
														<label for="Bgl_time2">發佈日期</label>
														<INPUT value='{$newData.Bgl_StartDate|date_format:"%Y/%m/%d"}' name="Bgl_StartDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px">
														<label for="Bgl_time2">截止日期</label>
														<INPUT value='{$newData.Bgl_EndDate|date_format:"%Y/%m/%d"}' name="Bgl_EndDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px">
													{/if}
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr valign="middle" bgcolor="#D9D9D9" class="style26">
								<td height="65" bgcolor="#999999" class="menu">
									<div align="center"><span class="style32">消息註記</span></div>
								</td>
								<td height="65">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="4%">&nbsp;</td>
											<td width="96%">
												<span class="info">												
												{if $newData.VINEWS === 0}												
													<INPUT name="Bgl_vinews" id="Bgl_vinews1" checked="checked" type="radio" value="0">
													<label for="Bgl_vinews1">不列為重點消息</label><BR>
													<input name="Bgl_vinews" id="Bgl_vinews2" type="radio" value=1>
													<label for="Bgl_vinews2">列為重點消息</label>
												{else}												
													<INPUT name="Bgl_vinews" id="Bgl_vinews1" type="radio" value="0">
													<label for="Bgl_vinews1">不列為重點消息</label><BR>
													<input name="Bgl_vinews" id="Bgl_vinews2" checked="checked" type="radio" value=1>
													<label for="Bgl_vinews2">列為重點消息</label>
												{/if}
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><img src="../images/Aarrowhand_b1.jpg" width="545" height="23"></td>
				</tr>
				<tr>
					<td height="40">
						<div align="center">
							<input name="送出" type="button" id="送出" value="送出" style="font-size:9pt;width:40;height:22px;" onclick="javascript:data_check()">												　
							<input name="回上頁" type="button" id="回上頁" value="回上頁" style="font-size:9pt;width:55;height:22px;" onclick="document.location.href='admin_news.php?{$urlAug}';">
						</div>
					</td>
				</tr>
				<tr>
					<td><img src="../images/Aarrowhand_b2.jpg" width="545" height="23"></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<tr>
		<td height="13">									
			<hr size="1" noshade>									
		</td>
	</tr>
	<tr>
		<td width="497" height="81">
			<form action="" method="post" name="upload">
			<table width="501" border="1" cellpadding="0" cellspacing="3" align="center">
				<tr valign="middle" bgcolor="#D9D9D9" class="style26">
					<td width="100%" height="35" bgcolor="#999999" class="menu">
						<div align="center" class="style32">附加檔上傳</div>
					</td>
				</tr>
				<tr valign="middle" bgcolor="#D9D9D9" class="style26">
					<td height="35" class="menu">	
						<div align="center" class="style54">
							<DIV align="center" class="info">
								{if $newData.UPLOAD_TAB == 1}
									<span class="info">己有上傳的檔案，我要刪除它	<INPUT style="FONT-SIZE: 9pt; WIDTH: 90px; HEIGHT: 22px" onclick="DELUploadForm();" type="button" value="刪除上傳物件" name="upload_b"></span>
								{else}
									<span class="info">請先設定物件上傳的件數：<INPUT style="FONT-SIZE: 9pt; WIDTH: 30px; HEIGHT: 18px" maxLength="2" value="1" name="Amount">件<INPUT type="hidden" value="{$smarty.get.SEQ_NUM}" name="Bgl_Num"><INPUT name="upload_b" type="button" style="FONT-SIZE: 9pt; WIDTH: 90px; HEIGHT: 22px" onclick="SetUploadForm();" value="新增上傳物件">
								{/if}							
							</DIV>
						</div>
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>	
</table>