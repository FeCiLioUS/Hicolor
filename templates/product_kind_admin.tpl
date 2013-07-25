<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
.dataTable {
	
}
.dataTable tbody tr {
	cursor: move;
}
.dataTable tr td,
.dataTable tr th {
	border: 1px #fff solid;
	font-weight: normal;
}
.myDragClass td {	
	background: #C5C5C5;
}
.dataTable tbody tr td:first-child{
	-moz-user-select: -moz-none;
	-webkit-user-select: none;
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
.style63 {color: #990000}
{/literal}
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom">
			<div align="center" class="headerLogo">
				<img src="../images/product_title_kind_admin.jpg" width="153" height="27">
			</div>				
		</td>
	</tr>
	<tr>
		<td height="13" valign="top">
			<hr size="1" noshade>
		</td>
	</tr>
	<tr>
		<td>
			<form action="product_kind_action.php?PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}" method="post" name="product_kind">
				<table width="650" border="0" cellpadding="0" cellspacing="0">				
					<tr>
						<td height="83">
							<table width="600" height="83" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
								<tr>
									<td width="497" height="81">
										<table class="dataTable" width="100%" height="79" border="0" cellpadding="0" cellspacing="0">
											<thead>
												<tr class="nodrag" bgcolor="#999999">
													<th width="10%" height="35"><div align="center" class="style59"><span class="style32">編 號</span></div></th>
													<th width="28%" height="35"><div align="center" class="style59"><span class="style32">類 別 代 號</span></div></th>
													<th width="38%" height="35"><div align="center" class="style59"><span class="style32">類 別 名 稱</span></div></th>													
													<th width="9%" height="35"><div align="center" class="style59"><span class="style32">刪 除</span></div></th>
												</tr>
											</thead>
											<tbody>
											{if $productKindsList|@count == 0}
												<tr class="style55"><td height="35" colspan="4" class="style55"><div align="center" class="contents style63">查無任何產品類別！</div></td></tr>
											{else}
												{foreach name='kindsList' from=$productKindsList item=itemData}
													<tr id="{$smarty.foreach.kindsList.index+1}" class="" bgcolor="#D9D9D9" class="style55">
														<td class="hint" height="35" class="style55" style="text-align:center;">{$smarty.foreach.kindsList.index+1}</td>
														<td height="35">
															<div align="center">
																<span class="info">
																	<span class="menu style26">
																		<INPUT style="FONT-SIZE: 9pt; WIDTH: 180px; HEIGHT: 20px" maxLength="50" class="KIND_NICK" name="KIND_NICK[{$smarty.foreach.kindsList.index+1}]"  value="{$itemData.NICK}" />
																	</span>
																</span>
															</div>
														</td>
														<td height="35">
															<div align="center">
																<span class="info">
																	<span class="menu style26">
																		<input style="FONT-SIZE: 9pt; WIDTH: 220px; HEIGHT: 20px" maxlength="50" class="KIND_NAME" name="KIND_NAME[{$smarty.foreach.kindsList.index+1}]" value="{$itemData.NAME}" />
																	</span>
																</span>
															</div>
														</td>
														<td height="35">
															<div align="center">
																<input type="checkbox" name="del_sub[{$smarty.foreach.kindsList.index+1}]" value="{$itemData.SEQ_NBR}" />
																<input type="hidden" class="SN" name="SN[{$smarty.foreach.kindsList.index+1}]" />
															</div>
														</td>
													</tr>
												{/foreach}
											{/if}
											</tbody>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>				
					<tr>
						<td height="13"><hr size="1" noshade></td>
					</tr>
					<tr>
						<td height="13">						
							<table width="500" height="109" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
								<tr>
									<td width="497" height="107">
										<table width="100%" height="117" border="0" cellpadding="0" cellspacing="3">
											<tr bgcolor="#666666">
												<td height="35" colspan="2"><div align="center" class="style59"><span class="style32"> 新 增 產 品 類 別</span></div></td>
											</tr>
											<tr bgcolor="#999999" class="style55">
												<td width="42%" height="35" class="style55">
													<div align="center" class="style60">類 別 代 號</div>
												</td>
												<td width="58%" height="35">
													<div align="center"><span class="info"><span class="style60">類別名稱 </span></span></div>
												</td>
											</tr>
											<tr bgcolor="#D9D9D9" class="style55">
												<td height="35" class="style55">
													<div align="center">
														<span class="info">
															<span class="menu style26">
																<input style="FONT-SIZE: 9pt; WIDTH: 100px; HEIGHT: 20px" maxlength=10 name="NICK">
															</span>
														</span>
													</div>
												</td>
												<td height="35">
													<div align="center">
														<span class="info">
															<span class="menu style26">
																<input style="FONT-SIZE: 9pt; WIDTH: 150px; HEIGHT: 20px" maxlength=50 name="NAME">
															</span>
														</span>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<input type="hidden" name="edit_mode">
							<input type="hidden" name="del_num">
							<input type="hidden" name="del_seq">
							<input type="hidden" name="total_num" value="{$productKindsList|@count}">
						</td>
					</tr>
					<tr>
						<td height="13"><hr size="1" noshade></td>
					</tr>				
				</table>
			</form>
		</td>
	</tr>
	<tr>
		<td>
			<table width="545" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="../images/Aarrowhand_b1.jpg" width="545" height="23"></td>
				</tr>
				<tr>
					<td height="40">
						<div align="center">
							<input name="新增類別" type="button" id="addCategory" value="新增" style="font-size:9pt;width:40;height:22px;">                     　
							<input name="修改" type="button" id="fixCategory" value="修改" style="font-size:9pt;width:40;height:22px;"> 　
							<input name="刪除" type="button" id="delCategory" value="刪除" style="font-size:9pt;width:40;height:22px;">　
							<input name="重填" type="button" id="resetPage" value="重填" style="font-size:9pt;width:40;height:22px;" onclick="javascript:document.location.href='../pages/product_kind_admin.php?PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}';"> 　
							<input name="取消" type="button" id="cancelButton" value="取消" style="font-size:9pt;width:40;height:22px;" onClick="javascript:document.location.href='../pages/admin_products.php?PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}';">
						</div>
					</td>
				</tr>
				<tr>
					<td><img src="../images/Aarrowhand_b2.jpg" width="545" height="23"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script>
{literal}
var data_check = function (){
		var NICK = document.product_kind.NICK.value;
		var NAME = document.product_kind.NAME.value;	
		if(NICK.length == 0){
			 alert("請輸入想新增的代號！");
			 document.product_kind.NICK.focus();
			 return;
		}else if(NICK.match(/\W/)){
			 alert("請勿輸入_以外的符號！");
			 document.product_kind.NICK.focus();
			 return;	
		}else if(NAME.length == 0){
			 alert("請輸入想新增的名稱！");
			 document.product_kind.NAME.focus();
			 return;
		}else if(NAME.match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)){
			 alert("請勿輸入_以外的符號！");
			 document.product_kind.NAME.focus();
			 return;	
		}
		document.product_kind.edit_mode.value = "add"
		document.product_kind.submit();
	},
	del_kind = function (){
		var selectedItem = $('input[name=del_sub*]:checked');		
		if(selectedItem.length == 0){
			alert("沒有刪除的類別");
			return;
		}else{
			if(confirm("你確定要刪除產品類別！這樣系統將會一併刪除其下的產品！")){
				document.product_kind.edit_mode.value = "del"
				document.product_kind.del_num.value = selectedItem.length;    
				document.product_kind.del_seq.value = function () {
					var val = [];
					selectedItem.each(function (index, item) {
						val.push($(item).val());
					});
					return val.join(',');
				}();   
				document.product_kind.submit();
			}
		}   
	},
	fix_kind = function (){
		var nickNameItems =  $('input.KIND_NICK'),
			kindNameItems = $('input.KIND_NAME'),
			snItems = $('input.SN'),
			nickNameValArr = [],
			kindNameValArr = [],
			submitable = true;			
		
		nickNameItems.each(function (index, item) {
			var nickNameItem = $(item), kindNameItem = $(kindNameItems[index]), available = true;
			snItems[index].value = index + 1;			
			if ($.inArray(nickNameItem.val(), nickNameValArr) > -1) {
				alert("代號不得重覆！");
				available = false;
			}
			if ($.inArray(kindNameItem.val(), kindNameValArr) > -1) {
				alert("名稱不得重覆！");				
				available = false;
			}	
			nickNameValArr.push(nickNameItem.val());
			kindNameValArr.push(kindNameItem.val());			
			if (nickNameItem.val().length == 0) {
				alert("請輸入想修改的代號！");
				nickNameItem[0].focus();	
				available = false;
			} else if (nickNameItem.val().match(/\W/)) {
				alert("請勿輸入_以外的符號！");
				nickNameItem[0].focus();
				available = false;
			} else if (kindNameItem.val().length == 0) {
				alert("請輸入想修改的名稱！");
				kindNameItem[0].focus();			
				available = false;
			} else  if (kindNameItem.val().match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)) {
				alert("請勿輸入_以外的符號！");
				kindNameItem[0].focus();
				available = false;
			}
			if (available == false) { 
				submitable = false;
				return false;
			}
		});
		if (submitable == true) {
			if(confirm("確認修改產品類別，原類別下的產品將會一併修改？")){
				document.product_kind.edit_mode.value = "fix";
				document.product_kind.submit();
			}	
		}		
	},
	highLightCount = 0,
	highLight = function (tr) {
		if(tr.is('.myDragClass')) {
			tr.removeClass('myDragClass');
		} else {
			tr.addClass('myDragClass');
		}		
	},
	delCategory = $('#delCategory').bind('click', del_kind),	
	addCategory = $('#addCategory').bind('click', data_check),
	fixCategory = $('#fixCategory').bind('click', fix_kind),
	dataTable = $('.dataTable'),
	c = {},
	draggableRows = $('tbody tr', dataTable);
	$('td.hint').disableSelection();	
	dataTable.tableDnD({
		'onDragClass': 'myDragClass',
		'onDrop': function(table, row) {
			highLightCount = 0;
			var highLightTimer = setInterval(
				function () {
					if (highLightCount < 4) {
						highLightCount ++;
						highLight($(row));
					} else {
						$('tbody tr', dataTable).each(function (index, item) {
							$(item).children().eq(0).text(index + 1);
						});
						clearInterval(highLightTimer);
						highLightCount = 0;
					}					
				}
				,150
			);			
		}
	});	
{/literal}
</script>