<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
.info {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	letter-spacing: 2px;
	color: #333333;
	padding-left: 10px;
}
.menu {
	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;
	line-height: 20px;
	vertical-align: middle;
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
<form action="product_fix_acton.php?SEQ_NUM={$smarty.get.SEQ_NUM}&PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}" method="post" name="product_fix">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> 
	<tr>
		<td>
			<div align="center"><img src="../images/product_tile_fix.jpg" width="153" height="27"></div>
	    </td>
	</tr>
	<tr>
		<td height="25"></td>
	</tr>
	<tr>
		<td height="25"><span class="contents">‧所有資料皆需填妥</span></td>
	</tr>
	<tr>
		<td height="25" class="contents">‧運費等級的詳細資料，請參照運費設定。</td>
	</tr>
	<tr>
		<td><hr size="1" noshade></td>
	</tr>	
	<tr>
		<td height="30">
			<img src="../images/arrowhead_yg.jpg" width="14" height="13"> 
			<span class="contents">編 號：{$productData.SEQ_NBR|string_format:"%04d"}</span>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="3">
							<tr bgcolor="#D9D9D9" class="style26">
								<td width="21%" height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">棣屬類別</div>
								</td>
								<td width="79%" height="35" valign="middle">									
									<div align="center" class="style54">
										<div align="left">
											<span class="info">
												<span class="menu style26">
													{html_options id="kind" name="kind" options=$kindList selected=$productKind style="font-size:9pt;width:150;height:24px;" onChange="subkind_select(this.options[this.selectedIndex].value);"}											
												</span>
											</span>
										</div>
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">棣屬規格</div>
								</td>
								<td height="35">									
									<div align="center" class="style54">
										<div align="left">									
											<span class="info">
												<span class="menu style26">                                            
													{html_options id="sub_kind" name="sub_kind" options=$subKindList selected=$productSubKind style="font-size:9pt;width:150;height:24px;"}											
												</span>
											</span>
										</div>
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">單/雙 面</div>
								</td>
								<td height="35">
									<div align="center" class="style54">									
										<div align="left">									
											<span class="info">
												<span class="menu style26">
													{html_options id="face" name="face" options=$faceData selected=$faceSelected style="font-size:9pt;width:150;height:24px;"} 
												</span>
											</span>
										</div>								
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">單　　位</div>
								</td>
								<td height="35">							
									<div align="center" class="style54">							
										<div align="left">
											<span class="info">
												<span class="menu style26">
													<INPUT name="unit_k" style="FONT-SIZE: 9pt; WIDTH: 150px; HEIGHT: 20px" value="{$productData.UNIT_NM|replace:'DEL':''}">
												</span>
											</span>
										</div>							
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">數　　量</div>
								</td>
								<td height="35">
									<div align="center" class="style54">								
										<div align="left">			
											<span class="info">
												<span class="menu style26">
													<INPUT name="amount" style="FONT-SIZE: 9pt; WIDTH: 150px; HEIGHT: 20px" value="{$productData.AMOUNT}">
												</span>
											</span>									
										</div>								
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">價　　格</div>
								</td>
								<td height="35">								
									<div align="center" class="style54">								
										<div align="left">
											<span class="info">
												<span class="menu style26">
													<INPUT name="price" style="FONT-SIZE: 9pt; WIDTH: 150px; HEIGHT: 20px" value="{$productData.PRICE}">
													新台幣(含稅)
												</span>
											</span>
										</div>							
									</div>
								</td>
							</tr>
							<tr bgcolor="#D9D9D9" class="style26">
								<td height="35" bgcolor="#999999" class="menu">
									<div align="center" class="style32">運費等級</div>
								</td>
								<td height="35">
									<span class="info">
										<span class="menu style26">											
											{html_options id="trans_la" name="trans_la" options=$transLevel selected=$transSelected style="font-size:9pt;width:150;vertical-align: middle; height:24px;"} 
											※運費等級請參照運費設定
										</span>
									</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="hidden" name="SEQ_NUM" value="{$smarty.get.SEQ_NUM}"></td>
		</td>
	</tr>
	<tr>
		<td height="10"></td>		
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">
			<hr size="1" noshade>			
		</td>		
	</tr>
	<tr>
		<td height="10"></td>		
	</tr>
	<tr>
		<td align="center"><img src="../images/Aarrowhand_b1.jpg" width="545" height="23"></td>
	</tr>
	<tr>
		<td height="40">
			<div align="center">
				<input name="修改" type="button" id="修改" value="修改" style="font-size:9pt;width:40;height:22px;" onclick="javascript:data_check()">				　  
				<input name="重設" type="reset" id="重設" value="重設" style="font-size:9pt;width:40;height:22px;">　
				<input name="取消" type="button" id="取消" value="取消" style="font-size:9pt;width:40;height:22px;" onclick="javascript:location.href='admin_products.php?PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}'">
			</div>
		</td>
	</tr>
	<tr>
		<td align="center"><img src="../images/Aarrowhand_b2.jpg" width="545" height="23"></td>
	</tr>
</table>
</form>
<script language="JavaScript" type="text/JavaScript">
{literal}
function data_check(){
    var kind=document.product_fix.kind.value;
	var sub_kind=document.product_fix.sub_kind.value;
	var face=document.product_fix.face.value;
	var unit_k=document.product_fix.unit_k.value;	
	var amount=document.product_fix.amount.value;	
	var price=document.product_fix.price.value;	
	var trans_la=document.product_fix.trans_la.value;	
	if(kind==0){
	    alert("必需選擇棣屬類別！");
		document.product_fix.kind.focus();
		return;		
	}else if(sub_kind==0){
	    alert("必需選擇棣屬規格！");
		document.product_fix.sub_kind.focus();
		return;
	}else if(face==0){	    
	    alert("必需選擇面數！");
		document.product_fix.face.focus();
		return;
	}else if(unit_k.length==0){	    
	    alert("必需輸入單位名稱！");
		document.product_fix.unit_k.focus();
		return;
	}else if(amount.length==0 || amount<1 || isNaN(amount)){	    
	    alert("必需輸入1單位以上數量！");
		document.product_fix.amount.focus();
		return;
	}else if(price.length==0 || amount<1 || isNaN(price)){	    
	    alert("必需輸入1以上價格！");
		document.product_fix.price.focus();
		return;
	}else if(trans_la==0){	    
	    alert("必需輸入運費等級！");
		document.product_fix.trans_la.focus();
		return;
	}else{
	    document.product_fix.submit();
		return;
	}
}
function subkind_select(kind){
var subkindList = [];
{/literal}	
{foreach from=$productAllSubkind item=kindList key=seq name=kindList}
subkindList[{$seq}] = [];
{foreach from=$kindList item=subkindList key=seq2 name=subKindList}
subkindList[{$seq}][{$seq2}] = [];
{foreach from=$subkindList item=subkindAttr key=attr name=subkindAttr}
{if $attr|regex_replace:"/[\d]/":""}
subkindList[{$seq}][{$seq2}]['{$attr}'] = '{$subkindAttr}';
{/if}
{/foreach}
{/foreach}
{/foreach}	
	//document.product_fix.sub_kind.options[0].selected=true;
{literal}
	var sub_kind = $('#sub_kind').children().remove().end();
	sub_kind.append(
		$('<option></option>').val(0).text('--選擇規格--')
	);
	
	$(subkindList[kind].reverse()).each(function (index, item) {		
		sub_kind.append(
			$('<option></option>').val(item['SEQ_NBR']).text(item['PRO_SUBKIND_NAME'])
		);		
	});
	sub_kind.val(0);
}
{/literal}
</script>