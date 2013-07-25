<style type="text/css">
{literal}
body {
	text-align: center;
}
#info_tab {
	margin: 0 auto;
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
.style55 {color: #666666; font-size: 14px; }
.style59 {font-size: 11px; }
.style60 {color: #FFFFFF; font-size: 11px; }
.style61 {color: #333333}
.style62 {color: #993366}
.style65 {font-family: "Times New Roman", Times, serif}
.style68 {color: #FFFFFF; font-size: 11px; font-family: "Times New Roman", Times, serif; }
.style69 {color: #666666; font-size: 11px; }
.style54 {font-size: 14px; }
{/literal}
</style>
<table width="424" height="425" border="0" cellpadding="0" cellspacing="0" id="info_tab" name="info_tab">
	<form action="subkind_info_fix_action.php?SEQ={$smarty.get.SEQ}" method="post" name="fix_subkind_info">
		<tr>
			<td height="425">		
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">			
					<tr>
						<td height="45" valign="bottom">
							<div align="center">
								<img src="../images/product_title_subkind_admin.jpg" width="153" height="27">
							</div>
						</td>
					</tr>			
					<tr>
						<td valign="top" height="10"><hr size="1" noshade></td>
					</tr>
				</table>
				<table border="0" align="center" cellpadding="0" cellspacing="0">			
					<tr>
						<td>
							<table width="367" height="307" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
								<tr>
									<td width="396" height="305">
										<table width="100%" height="364" border="0" cellpadding="0" cellspacing="3">
											<tr bgcolor="#666666">
												<td height="35" colspan="2">
													<div align="center" class="style59"><span class="style32"> 修 改 產 品 規 格</span></div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td width="21%" height="35" bgcolor="#999999" class="style60">
													<div align="center">紙 張 說 明 </div>
												</td>
												<td width="79%" height="35">
													<div align="center">																										
														<textarea name="paper_info" rows="7" wrap="VIRTUAL" cols="64" style="FONT-SIZE: 9pt; WIDTH: 250px; HEIGHT: 70px">{$subkindDetails.PAPER_INFO}</textarea>
													</div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="35" bgcolor="#999999" class="style60"><div align="center">完 成 尺 寸 </div></td>
												<td height="35">
													<div align="center">
														<span class="info">
															<span class="style69">長：
																<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="finish_width" value="{$subkindDetails.FINISH_W}">
																mm/ 高：
																<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="finish_heigh" value="{$subkindDetails.FINISH_H}">
																mm 
															</span>
														</span>
													</div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="35" bgcolor="#999999" class="style60"><div align="center">出 血 尺 寸 </div></td>
												<td height="35">
													<div align="center">
														<span class="info">
															<span class="style69">長：
																<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="border_width" value="{$subkindDetails.BODER_W}">
																mm/ 高：
																<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="border_heigh" value="{$subkindDetails.BODER_H}">
																mm 
															</span>
														</span>
													</div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="35" bgcolor="#999999" class="style60"><div align="center">交 貨 說 明 </div></td>
												<td height="35">
													<div align="center">
														<span class="info">															
															<textarea name="finish_info" rows="7" wrap="VIRTUAL" cols="64" style="FONT-SIZE: 9pt; WIDTH: 250px; HEIGHT: 70px">{$subkindDetails.FINISH_INFO}</textarea>
														</span>
													</div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="58" bgcolor="#999999" class="style60"><div align="center">圖檔上傳</div></td>
												<td height="58">
													<div align="center" class="info">
														{if $subkindDetails.FILES_TAB == 1}
															<span class="info">
																此規格已有圖檔，請先刪除原圖檔！<br/><br/>
																<input name="upload_b" type="button" style="font-size: 9pt; width: 90px; height: 22px" onclick="del_Upload();" value="刪除上傳物件">
																<input type="hidden" value="{$smarty.get.SEQ}" name="SEQ">
															</span>
														{else}
															<div class="info" style="padding: 5px 0;">
															請先設定物件上傳的件數： 
															<input style="font-size: 9pt; width: 30px; height: 14px" maxLength="2" value="1" name="Amount"> 件<br/>
															<input type="hidden" value="{$smarty.get.SEQ}" name="SEQ"><br/>
															<input name="upload_b" type="button" style="font-size: 9pt; width: 90px; height: 22px" onclick="SetUploadForm();" value="新增上傳物件">
															</div>
														{/if}																				
													</div>	
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="58" bgcolor="#999999" class="style60"><div align="center">刀模上傳</div></td>
												<td height="58">
													<div align="center" class="style54">
														<div align="center" class="info">
															{if  $subkindDetails.CLIP_TAB == 1}
																<span class="info">此規格已有刀模，請先刪除原刀模！<br>
																<input name="clip_upload_b" type="button" style="font-size: 9pt; width: 90px; height: 22px" onclick="del_clip();" value="刪除上傳物件">
																<input type="hidden" value="{$smarty.get.SEQ}" name="CLIP_SEQ"></span>;
															{else}
																<div class="info" style="padding: 5px 0;">
																請先設定刀模上傳的件數： 
																<input style="font-size: 9pt; width: 30px; height: 14px" maxLength="2" value="1" name="CLIP_Amount"> 件<br>
																<input type="hidden" value="{$smarty.get.SEQ}" name="CLIP_SEQ"><br>
																<input name="clip_upload_b" type="button" style="font-size: 9pt; width: 90px; height: 22px" onclick="SetClipForm();" value="新增刀模">
																</div>
															{/if}																			
														</div>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<input type="hidden" name="MODE">
						</td>
					</tr>
					<tr>
					  <td height="13">&nbsp;</td>
					</tr>
					<tr>
						<td height="13">
							<table width="418" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td><hr size="1" noshade></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>		
		<tr>
			<td><img src="../images/Aarrowhand_b1.jpg" width="424" height="23"></td>
		</tr>
		<tr>
			<td height="40">
				<div align="center">			　
					<input name="修改" type="button" id="修改" value="修改" style="font-size:9pt;width:40;height:22px;" onClick="javascript:fix_sub_kind_info();">
					<input name="重填" type="reset" id="重填" value="重填" style="font-size:9pt;width:40;height:22px;">
					<input name="取消" type="button" id="取消" value="取消" style="font-size:9pt;width:40;height:22px;" onClick="javascript:window.close()">
				</div>
			</td>
		</tr>
		<tr>
			<td><img src="../images/Aarrowhand_b2.jpg" width="424" height="23"></td>
		</tr>
	</form>
</table>
<script>
{literal}
var fix_sub_kind_info = function () {
	//document.write(document.product_subkind.elements[3].value);
	   var paper_info = document.fix_subkind_info.paper_info.value;
	   var finish_width = document.fix_subkind_info.finish_width.value;
	   var finish_heigh = document.fix_subkind_info.finish_heigh.value;
	   var border_width = document.fix_subkind_info.border_width.value;
	   var border_heigh = document.fix_subkind_info.border_heigh.value;
	   var finish_info = document.fix_subkind_info.finish_info.value;
	   if(finish_width < 0 || isNaN(finish_width)){
			 alert("請輸入至少10以上數字寬度！");
			 document.fix_subkind_info.finish_width.focus();
			 return;
	   }else if(finish_heigh < 0 || isNaN(finish_heigh)){
			 alert("請輸入至少10以上數字高度！");
			 document.fix_subkind_info.finish_heigh.focus();
			 return;
	   }else if(border_width < 0 || isNaN(border_width)){
			 alert("請輸入至少10以上數字寬度！");
			 document.fix_subkind_info.border_width.focus();
			 return;   
	   }else if(border_heigh < 0 || isNaN(border_heigh)){
			 alert("請輸入至少10以上數字高度！");
			 document.fix_subkind_info.border_heigh.focus();
			 return;
	   }else if(finish_info){
			  if(finish_info.match(/[\"\']/g)){
					alert("請勿輸入「\",\'」字元");
					document.fix_subkind_info.finish_info.focus();
					return;
			  } 
			  if(paper_info){
				 if(paper_info.length<10){
					alert("請輸入10個字元以上的紙張說明！");
					document.fix_subkind_info.paper_info.focus();
					return;
				 }else if(paper_info.match(/[\"\']/g)){
					alert("請勿輸入「\",\'」字元 ！");
					document.fix_subkind_info.paper_info.focus();
					return;
				 }
			 }  
	   }
	   document.fix_subkind_info.MODE.value="fix";
	   document.fix_subkind_info.submit();
	},
	del_Upload = function () {
	   if (confirm("你確定要刪除已上傳的圖檔？")) {
{/literal}
		  window.location.href = "pro_subkind_filess_upload_action.php?SEQ={$smarty.get.SEQ}&MODE=DEL"; 
{literal}
	   }
	},
	del_clip = function () {
	   if (confirm("你確定要刪除已上傳的圖檔？")) {
{/literal}
		  window.location.href = "pro_subkind_clip_upload_action.php?SEQ={$smarty.get.SEQ}&MODE=DEL";
{literal}
	   }
	},
	SetUploadForm = function () {
	   //設定上傳物件則數
	   var Amount = document.fix_subkind_info.Amount.value;
	   var Bgl_Num = document.fix_subkind_info.SEQ.value;
	   if (Amount.length == 0 || isNaN(Amount) || Amount == 0 || Amount > 10){
		   alert('請確定物件上傳的數量？\n(值介於1～10)');
		   document.fix_subkind_info.Amount.value = "1";
		   document.fix_subkind_info.Amount.focus();
		   return;
	   }else{
		   window.open("pro_subkind_upload.php?Amount="+Amount+'&SEQ='+Bgl_Num,'Upload',"toolbar=no,location=no,directory=no,status=yes,scrollbars=no,resizable=YES,width=400,height=164");
		   return;
	   }           
	},
	SetClipForm = function () {
	   //設定上傳物件則數
	   var Amount=document.fix_subkind_info.CLIP_Amount.value;
	   var Bgl_Num=document.fix_subkind_info.CLIP_SEQ.value;
	   if (Amount.length == 0 || isNaN(Amount) || Amount == 0 || Amount > 10){
		   alert('請確定物件上傳的數量？\n(值介於1～10)');
		   document.fix_subkind_info.CLIP_Amount.value = "1";
		   document.fix_subkind_info.CLIP_Amount.focus();
		   return;
	   }else{
		   window.open("pro_subkind_clip_upload.php?Amount="+Amount+'&SEQ='+Bgl_Num,'CLIP_Upload',"toolbar=no,location=no,directory=no,status=yes,scrollbars=no,resizable=YES,width=400,height=140");
		   return;
	   }           
	};
{/literal}
</script>