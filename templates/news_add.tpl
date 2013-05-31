<script>
{literal}
function data_check(){
    var Caption=document.news_add.Caption.value;
	var Bgl_Contents=document.news_add.Bgl_Contents.value;
	var Bgl_time=document.news_add.Bgl_time[0].checked;
	var Bgl_StartDate=document.news_add.Bgl_StartDate.value;	
	var Bgl_EndDate=document.news_add.Bgl_EndDate.value;	
	if(Caption.length==0){
	    alert("必需輸入消息標題！");
		document.news_add.Caption.focus();
		return false;		
	}else if(Caption.match(/[\"|\'|\$]/g)){
	    alert("不得輸入「\",'\,\$」特殊字元！");
		document.news_add.Caption.focus();
		return false;
	}else if(Bgl_Contents.length==0){
	    alert("必需輸入消息內容！");
		document.news_add.Bgl_Contents.focus();
		return false;		
	}else if(Bgl_Contents.match(/[\"|\'|\$]/g)){
	    alert("不得輸入「\",'\,\$」特殊字元！");
		document.news_add.Bgl_Contents.focus();
		return false;
	}else if(Bgl_time==false){
	    if(Bgl_StartDate.length==0){
		     alert("必需輸入迄始日期！");
		     document.news_add.Bgl_StartDate.focus();
		     return false;		
		}else if(Bgl_EndDate.length==0){
		     alert("必需輸入截止日期！");
		     document.news_add.Bgl_EndDate.focus();
		     return false;		
		}else{		     
		     return true;
		}
	}else{	    
		return false;
	}
}
function BLG_TIME(){
    if(document.news_add.Bgl_time[0].checked==true){
	    document.news_add.Bgl_StartDate.value="";
		document.news_add.Bgl_StartDate.disabled=true;
		document.news_add.Bgl_EndDate.value="";
		document.news_add.Bgl_EndDate.disabled=true;
	}else{
		{/literal}
	    document.news_add.Bgl_StartDate.value="{$Bgl_StartDate}";
		document.news_add.Bgl_StartDate.disabled=false;
		document.news_add.Bgl_EndDate.value="{$Bgl_EndDate}";
		document.news_add.Bgl_EndDate.disabled=false;
		{literal}
	}
}
{/literal}
</script>
<style>
{literal}
@import url("hicolor.css");
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
.contentTable {
	margin: 10px auto;
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
<form action="news_add_action.php?PAGE={$smarty.get.PAGE}" method="post" name="news_add" onsubmit="data_check();">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="bottom">
				<div align="center"><img src="../images/news_tile_newsadd.jpg" width="153" height="27"></div>
			</td>
		</tr>
		<tr>
			<td height="13" valign="top"><hr size="1" noshade></td>
		</tr>
		<tr>
			<td height="234">
				<table width="501" class="contentTable" height="203" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
					<tr>
						<td width="497" height="201">
							<table width="100%" border="0" cellpadding="0" cellspacing="3">
								<tr valign="middle" bgcolor="#D9D9D9" class="style26">
									<td width="21%" height="35" bgcolor="#999999" class="menu"><div align="center" class="style32">消息標題</div></td>
									<td width="79%" height="35">
										<div align="center">
											<span class="menu style26">
												<INPUT style="FONT-SIZE: 9pt; WIDTH: 350px; HEIGHT: 20px" name="Caption" value="{$smarty.get.Caption}">
											</span>
										</div>												
									</td>
								</tr>
								<tr valign="middle" bgcolor="#D9D9D9" class="style26">
									<td height="118" bgcolor="#999999" class="menu">
										<div align="center" class="style32">消息內容</div>
									</td>
									<td height="118">
										<div align="center" class="style55">
											<TEXTAREA name="Bgl_Contents" rows="7" wrap="VIRTUAL" cols="64" style="FONT-SIZE: 9pt; WIDTH: 350px; HEIGHT: 100px">{$smarty.get.Bgl_Contents}</TEXTAREA>
										</div>
									</td>
								</tr>
								<tr valign="middle" bgcolor="#D9D9D9" class="style26">
									<td height="65" bgcolor="#999999" class="menu"><div align="center" class="style32">消息期限</div></td>
									<td height="65">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td width="4%">&nbsp;</td>
												<td width="96%">
													<span class="info">														
														<INPUT type="radio" value="0" id="Bgl_time1" name="Bgl_time" {$Bgl_time_tab1} onClick="BLG_TIME();">
														<label for="Bgl_time1">永久顯示</label><BR>
														<input type="radio" value="1" id="Bgl_time2" name="Bgl_time" {$Bgl_time_tab2} onClick="BLG_TIME();">
														<label for="Bgl_time2">
														發佈日期														
														<INPUT  name="Bgl_StartDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px" value="{$Bgl_StartDate}">														
														截止日期
														<INPUT  name="Bgl_EndDate" style="FONT-SIZE: 9pt; WIDTH: 80px; HEIGHT: 20px" value="{$Bgl_EndDate}">
														</label>
													</span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr valign="middle" bgcolor="#D9D9D9" class="style26">
									<td height="65" bgcolor="#999999" class="menu">
										<div align="center">
											<span class="style32">消息註記</span>
										</div>
									</td>
									<td height="65">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td width="4%">&nbsp;</td>
												<td width="96%">
													<span class="info">
														{if $smarty.get.Bgl_vinews == ''|| $smarty.get.Bgl_vinews == 0}
															<INPUT name="Bgl_vinews" id="Bgl_vinews1" type="radio" checked="checked" value="0" />
															<label for="Bgl_vinews1">
															不列為重點消息
															</label>
															<BR>
															<input name="Bgl_vinews" id="Bgl_vinews2" type="radio" value="1" />
															<label for="Bgl_vinews2">
															列為重點消息
															</label>
														{else}
															<INPUT name="Bgl_vinews" id="Bgl_vinews1" type="radio" value="0" />
															<label for="Bgl_vinews1">
															不列為重點消息
															</label>
															<BR>
															<input name="Bgl_vinews" id="Bgl_vinews2" type="radio" checked="checked" value="1" />
															<label for="Bgl_vinews2">
															列為重點消息
															</label>
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
			</td>
		</tr>
		<tr>
			<td height="13">								
				<div align="left">
					<hr size="1" noshade>
				</div>
			</td>
		</tr>
		<tr>
			<td align="center"><img src="../images/Aarrowhand_b1.jpg" width="545" height="23"></td>
		</tr>
		<tr>
			<td height="40">
				<div align="center">
					<input name="送出" type="submit" id="送出" value="送出" style="font-size:9pt;width:40;height:22px;">			　  
					<input name="取消" type="button" id="取消" value="取消" style="font-size:9pt;width:40;height:22px;" onclick="document.location.href='admin_news.php?PAGE={$smarty.get.PAGE}';">
				</div>
			</td>
		</tr>
		<tr>
			<td align="center"><img src="../images/Aarrowhand_b2.jpg" width="545" height="23"></td>
		</tr>
	</table>
</form>
