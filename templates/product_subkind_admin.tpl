<script language="JavaScript" type="text/JavaScript">
var kindsListArray = [];
{foreach name='kindsList' from=$kindsListArray key=itemKey item=itemData}
{if $itemKey!=""}
    kindsListArray[{$itemKey}] = "{$itemData}";	
{/if}
{/foreach}
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
.mark {
	color: #993366;
}
.searchArea,
.searchArea img,
.searchArea select {
	vertical-align: middle;
}
.createNew td {
	padding: 5px 10px;
}

.dataTable {
	
}
.dataTable tbody tr {
	cursor: move;
}
.dataTable.undraggable tbody tr {
	cursor: default;
}
.dataTable tr td,
.dataTable tr th {
	border: 1px #fff solid;
	font-weight: normal;
	text-align: center;
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
.style61 {color: #333333}
.style62 {color: #993366}
.style65 {font-family: "Times New Roman", Times, serif}
.style68 {color: #FFFFFF; font-size: 11px; font-family: "Times New Roman", Times, serif; }
.style69 {color: #666666; font-size: 11px; }
.style70 {color: #990000}
.style54 {font-size: 14px; }
{/literal}
</style>
<form action="product_subkind_action.php?{if $smarty.get.KIND}KIND={$smarty.get.KIND}{/if}{if $smarty.get.SUB_PAGE}&SUB_PAGE={$smarty.get.SUB_PAGE}{/if}{if $smarty.get.PAGE}&PAGE={$smarty.get.PAGE}{/if}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}" method="post" name="product_subkind_modify" enctype="multipart/form-data">
	<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" id="info_tab" name="info_tab">
		<tr>
			<td valign="top">
				<div align="center">
					<img src="../images/product_title_subkind_admin.jpg" width="153" height="27">
				</div>
			</td>
		</tr>
		<tr>
			<td height="25" valign="middle"></td>
		</tr>
		<tr>
			<td valign="middle" class="contents"><div align="left">‧排序功能僅是顯示資料的順序設定。</div></td>
		</tr>
		<tr>
			<td valign="middle" class="contents"><div align="left">‧交貨日期或紙張說明可不填寫。</div></td>
		</tr>
		<tr>
			<td valign="middle"><hr size="1" noshade></td>
		</tr>
		<tr>
			<td height="13" valign="top">&nbsp;</td>
		</tr>
		<tr>						
			<td class="searchArea">
				<img src="../images/arri_sub_paper.jpg" width="21" height="26">
				<span class="style55">類別查詢規格清單</span>
				<span class="info">
					<span class="menu style26">
						{html_options name="belong_kind_search" options=$searchKindList selected=$smarty.get.KIND id="belong_kind_search" style="font-size:9pt;width:110;height:24px;" }
					</span>
				</span>
			</td>
		</tr>
		<tr>
			<td height="13" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
					<tr>
						<td>
							<table class="dataTable" width="100%" border="0" cellpadding="0" cellspacing="0">
								<thead>
								{if $smarty.get.KIND=="ALL" || !$smarty.get.KIND }
									<tr bgcolor="#DAE2AB">
										<th height="35" colspan="6">
											<div align="center" class="style59">
												{$PAGE_DISPLAY}
											</div>
										</th>
									</tr>
								{/if}
									<tr bgcolor="#999999">
										<th width="39" height="35">
											<div align="center" class="style59">
												<div align="center"><span class="style32">編 號</span></div>
											</div>
										</th>
										<th width="136" height="35">
											<div align="center" class="style59">
												<div align="center" class="style32">棣屬類別</div>
											</div>
										</th>
										<th width="128" height="35">
											<div align="center" class="style59">
												<div align="center"><span class="style32">規 格 代 號</span></div>
											</div>
										</th>
										<th width="177" height="35">
											<div align="center" class="style59">
												<div align="center"><span class="style32">規 格 名 稱</span></div>
											</div>
										</th>
										<!--td width="68" height="35">
											<div align="center">
												<span class="style32 style59">排 序</span>
											</div>
										</td-->
										<th width="31">
											<div align="center" class="style59">
												<div align="center">
													<span class="style32">刪 除</span>
												</div>
											</div>
										</th>
									</tr>
								</thead>
								<tbody>
								{if $subKindListArray|@count == 0}
									<tr class="style55"><td height="35" colspan="6"><div align="center" class="info style70">查無任何產品規格！</div></td></tr>
								{else}									
									{foreach name='subKindsList' from=$subKindListArray item=itemData}
									<tr id="{$smarty.foreach.subKindsList.index+1}" bgcolor="#D9D9D9" class="style55">
										<td height="35" class="style55 hint">											
											<a class="showDetails" href="javascript:;" rel="{$itemData.SEQ_NBR}" class="style50 style70" STYLE="text-decoration: none">
												<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">
													{if $smarty.get.KIND=="ALL" || !$smarty.get.KIND }
														{if $smarty.get.SUB_PAGE}																
															<u> {math equation="((x - y)*10)+b+1" x=$smarty.get.SUB_PAGE y=1 a=10 b=$smarty.foreach.subKindsList.index}</u>
														{else}
															<u>{$smarty.foreach.subKindsList.index+1}</u>
														{/if}															
													{else}
														<u>{$smarty.foreach.subKindsList.index+1}</u>
													{/if}													
												</font>
											</a>											
										</td>				
										<td height="35">
											<div align="center">
												<span class="info">
													<span class="menu style26">
													<select name="belong_kind[{$smarty.foreach.subKindsList.index+1}]" id="belong_kind_{$smarty.foreach.subKindsList.index+1}" style="font-size:9pt;width:110;height:24px;">
														<option value="">--選擇所屬類別--</option>	
													</span>
												</span>
											</div>
										</td>
										<td height="35">
											<div align="center">
												<span class="info">
													<span class="menu style26">
														<input style="FONT-SIZE: 9pt; WIDTH: 100px; HEIGHT: 20px" id="NICK_NAME_{$smarty.foreach.subKindsList.index+1}" maxlength=10 name="NICK_NAME[{$smarty.foreach.subKindsList.index+1}]" value="{$itemData.PRO_SUBKIND_NICK}">
													</span>
												</span>
											</div>
										</td>
										<td height="35">
											<div align="center">
												<span class="info">
													<span class="menu style26">
														<input id="SUBKIND_NAME_{$smarty.foreach.subKindsList.index+1}" style="FONT-SIZE: 9pt; WIDTH: 150px; HEIGHT: 20px" maxlength=50 name="SUBKIND_NAME[{$smarty.foreach.subKindsList.index+1}]" value="{$itemData.PRO_SUBKIND_NAME}">
														<input id="subseq_{$smarty.foreach.subKindsList.index+1}" type="hidden" name="subseq[{$smarty.foreach.subKindsList.index+1}]" value="{$itemData.SEQ_NBR}">
													</span>
												</span>
											</div>
										</td>										
										<td>
											<div align="center">
												<input id="del_sub_{$smarty.foreach.subKindsList.index+1}" type="checkbox" name="del_sub[{$smarty.foreach.subKindsList.index+1}]" value="{$itemData.SEQ_NBR}">
												{if $smarty.get.KIND == "ALL" || !$smarty.get.KIND}
												{else}
													<input type="hidden" class="SN" name="SN[{$smarty.foreach.subKindsList.index+1}]" />
												{/if}
											</div>
										</td>
									</tr>
<script>
var productKind = {$itemData.PRO_KIND},	belong_kind = $("#belong_kind_{$smarty.foreach.subKindsList.index+1}");
{literal}
	for(var key in kindsListArray) {
		belong_kind.append(
			$('<option></option>').val(key).text(kindsListArray[key])
		);
	}
	belong_kind.val(productKind);
{/literal}
</script>
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
			<td height="13">&nbsp;</td>
		</tr>
		<tr>
			<td height="13"><hr size="1" noshade></td>
		</tr>
		<tr>
			<td height="13">&nbsp;</td>
		</tr>
	</table>
<input type="hidden" name="mode">
<input type="hidden" name="del_num">
<input type="hidden" name="del_seq">
<input type="hidden" name="total_num" value="{$subKindListArray|@count}">
</form>
<form action="product_subkind_action.php?{if $smarty.get.KIND}KIND={$smarty.get.KIND}{/if}{if $smarty.get.SUB_PAGE}&SUB_PAGE={$smarty.get.SUB_PAGE}{/if}{if $smarty.get.PAGE}&PAGE={$smarty.get.PAGE}{/if}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}" method="post" name="product_subkind" enctype="multipart/form-data">
	<table width="500" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
		<tr>
			<td>
				<table class="createNew" width="100%" height="307" border="0" cellpadding="0" cellspacing="3">
					<tr bgcolor="#666666">
						<td height="35" colspan="2">
							<div align="center" class="style59"><span class="style32"> 新 增 產 品 規 格</span></div>
						</td>
					</tr>
					<tr bgcolor="#999999" class="style55">
						<td width="60px;" height="35" bgcolor="#999999" class="style60">
							<div align="center" class="style60">
								<span class="style60 style65">棣 屬 類 別</span>
							</div>
						</td>
						<td height="35" bgcolor="#D9D9D9">
							<div align="left">
								<span class="menu style26">
									{html_options name="new_belong_kind" options=$kindsListArray selected=$smarty.get.new_belong_kind style="font-size:12px; width:100%; height:24px;"}
								</span>
							</div>
						</td>
					</tr>
					<tr>
						<td height="35" bgcolor="#999999" class="style60">
							<div align="center" class="style60 style65">規 格 代 號</div>
						</td>
						<td height="35" bgcolor="#D9D9D9">										
							<div align="left">											
								<span class="menu style26">
									<input style="font-size: 12px; width:100%; height: 20px" name="NICK" value="{$smarty.get.NICK}">
								</span>											
							</div>										
						</td>
					</tr>
					<tr bgcolor="#D9D9D9" class="style55">
						<td height="35" bgcolor="#999999" class="style60">
							<div align="center" class="style68">規 格 名 稱</div>
						</td>
						<td height="35">
							<div align="left">											
								<span class="menu style26">
									<input style="font-size: 12px; width:100%; height: 20px" name="NAME" value="{$smarty.get.NAME}">
								</span>											
							</div>
						</td>
					</tr>
					<tr bgcolor="#D9D9D9" class="style55">
						<td height="35" bgcolor="#999999" class="style60"><div align="center">紙 張 說 明 </div></td>
						<td height="35">
							<div align="left">
								<span class="menu style26">
									<textarea name="paper_info" rows="7" wrap="VIRTUAL" style="font-size: 12px; width:100%; height: 70px;">{$smarty.get.paper_info}</textarea>
								</span>
							</div>
						</td>
					</tr>
					<tr bgcolor="#D9D9D9" class="style55">
						<td height="35" bgcolor="#999999" class="style60"><div align="center">完 成 尺 寸 </div></td>
						<td height="35">
							<div align="left">
								<span class="style69">長：
									<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="finish_width" value="{$smarty.get.finish_width}">
										mm/高：
									<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="finish_heigh" value="{$smarty.get.finish_heigh}">
										mm
								</span>
							</div>
						</td>
					</tr>
					<tr bgcolor="#D9D9D9" class="style55">
						<td height="35" bgcolor="#999999" class="style60">
							<div align="center">出 血 尺 寸 </div>
						</td>
						<td height="35">
							<div align="left">
								<span class="style69">長：
									<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="border_width" value="{$smarty.get.border_width}">
									mm/ 高：
									<input style="FONT-SIZE: 9pt; WIDTH: 50px; HEIGHT: 20px" maxlength=7 name="border_heigh" value="{$smarty.get.border_heigh}">
									mm 
								</span>
							</div>
						</td>
					</tr>
					<tr bgcolor="#D9D9D9" class="style55">
						<td height="35" bgcolor="#999999" class="style60">
							<div align="center">交 貨 說 明 </div>
						</td>
						<td>
							<div align="left">
								<span class="menu style26">
									<textarea name="finish_info" rows="7" wrap="VIRTUAL" style="display: block; font-size: 12px; width:100%; height: 70px;">{$smarty.get.finish_info}</textarea>
								</span>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<input type="hidden" name="mode">
</form>
<table width="650" align="center">
	<tr>
		<td height="13">&nbsp;</td>
	</tr>
	<tr>
		<td height="13"><hr size="1" noshade></td>
	</tr>
	<tr>
		<td height="13">&nbsp;</td>
	</tr>
	<tr align="center">
		<td><img src="../images/Aarrowhand_b1.jpg" width="545" height="23"></td>
	</tr>
	<tr>
		<td height="40">
			<div align="center">
				<input name="新增類別" type="button" id="createNewSub" value="新增" style="font-size:9pt;width:40;height:22px;">                     　
				<input name="修改" type="button" id="modifySub" value="修改" style="font-size:9pt;width:40;height:22px;"> 　
				<input name="刪除" type="button" id="delSub" value="刪除" style="font-size:9pt;width:40;height:22px;">　
				<input name="重填" type="reset" id="重填" value="重填" style="font-size:9pt;width:40;height:22px;" onClick="javascript:window.reload();"> 　
				<input name="取消" type="button" id="取消" value="取消" style="font-size:9pt;width:40;height:22px;" onClick="javascript:document.location.href='../pages/admin_products.php?PAGE={$smarty.get.PAGE}{if $smarty.get.MODE}&MODE={$smarty.get.MODE}&Keyword={$smarty.get.Keyword}{/if}';">
			</div>
		</td>
	</tr>
	<tr align="center">
		<td><img src="../images/Aarrowhand_b2.jpg" width="545" height="23"></td>
	</tr>
</table>
<script>
var page = '{$smarty.get.SUB_PAGE}', URL_AUG = "", total = {$subKindListArray|@count};
{if $URL_AUG}
	URL_AUG = '{$URL_AUG}';
{/if}
{literal}
(function($){
	var data_check = function (){
			var new_belong_kind = document.product_subkind.new_belong_kind.value;
			var NICK = document.product_subkind.NICK.value;
			var NAME = document.product_subkind.NAME.value;	
			var paper_info = document.product_subkind.paper_info.value;	
			var finish_width = document.product_subkind.finish_width.value;	
			var finish_heigh = document.product_subkind.finish_heigh.value;
			var border_width = document.product_subkind.border_width.value;
			var border_heigh = document.product_subkind.border_heigh.value;
			var finish_info = document.product_subkind.finish_info.value;
			if (new_belong_kind == "") {
				alert("請選擇棣屬的類別！");
				document.product_subkind.new_belong_kind.focus();
				return;		
			} else if (NICK.length == 0) {
				 alert("請輸入想新增的代號！");
				 document.product_subkind.NICK.focus();
				 return;
			} else if (NICK.match(/\W/)) {
				 alert("請勿輸入_以外的符號！");
				 document.product_subkind.NICK.focus();
				 return;	
			} else if (NAME.length==0) {
				 alert("請輸入想新增的名稱！");
				 document.product_subkind.NAME.focus();
				 return;
			} else if (NAME.match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)) {
				 alert("請勿輸入_以外的符號！");
				 document.product_subkind.NAME.focus();
				 return;	
			} else {
				 if (finish_info) {
					 if(finish_info.match(/[\"\']/g)){
						alert("請勿輸入「\",\'」字元");
						document.product_subkind.finish_info.focus();
						return;
					 }
				 }
				 if (paper_info) {
					 if (paper_info.length<1) {
						alert("請輸入1個字元以上的紙張說明！");
						document.product_subkind.paper_info.focus();
						return;
					 } else if (paper_info.match(/[\"\']/g)) {
						alert("請勿輸入「\",\'」字元 ！");
						document.product_subkind.paper_info.focus();
						return;
					 }
				 }
			}
			document.product_subkind.mode.value = "add";
			document.product_subkind.submit();
		},
		fix_sub_kind = function (){
		   var nameArray = [], nickNameArray = [], snItems = $('input.SN');
		   for(var g = 0; g < total; g++){			  
			  var index = (g + 1);			  
			  if (snItems.length > 0) {
				snItems[g].value = index;	
			  }				
			  var _belong_kind = $('#belong_kind_' + index),
				  _NICK_NAME = $('#NICK_NAME_' + index),
				  _SUBKIND_NAME = $('#SUBKIND_NAME_' + index);			  
			  if(_belong_kind.val() == ''){
				 alert("請選擇棣屬類別！");
				 _belong_kind[0].focus();
				 return;
			  }else if(_NICK_NAME.val().length==0){
				 alert("請輸入想修改的代號！");
				 _NICK_NAME[0].focus();
				 return;
			  }else if(_NICK_NAME.val().match(/\W/)){
				 alert("請勿輸入_以外的符號！");
				 _NICK_NAME.val('');
				 _NICK_NAME[0].focus();
				 return;	
			  }else if ($.inArray(_NICK_NAME.val(), nickNameArray) > -1) {
				 alert("代號不得重覆！");
				 _NICK_NAME.val('');
				 _NICK_NAME[0].focus();
				 return;	
			  } else if(_SUBKIND_NAME.val().length==0){
				 alert("請輸入想修改的名稱！");
				 _SUBKIND_NAME[0].focus();
				 return;
			  }else if(_SUBKIND_NAME.val().match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)){
				 alert("請勿輸入_以外的符號！");
				 _SUBKIND_NAME.val('');
				 _SUBKIND_NAME[0].focus();
				 return;	
			  }else if ($.inArray(_SUBKIND_NAME.val(), nameArray) > -1) {
				 alert("名稱不得重覆！");
				 _SUBKIND_NAME.val('');
				 _SUBKIND_NAME[0].focus();
				 return;	
			  }
			  nickNameArray.push(_NICK_NAME.val());
			  nameArray.push(_SUBKIND_NAME.val());		 
		   }	   
		   
		   if(confirm("你確定要修改規格？這樣規格下的產品也會一併修改！")){
			   document.product_subkind_modify.mode.value= "fix";
			   document.product_subkind_modify.submit();
		   }
		},
		del_kind = function (){
			var d = 0, e = new Array();
			while(d < total){
				var index = d + 1, _delDom = $('#del_sub_' + index), _subseq = $('#subseq_' + index);
				if(_delDom.is(':checked')){
					e.push(_subseq.val());
				}
				d++;
			}
			if(e.length == 0){
				alert("沒有刪除的類別");
				return;
			}else{
				if(confirm("你確定要刪除產品規格？這樣規格下的產品也會一併刪除！")){
				   document.product_subkind_modify.del_num.value = e.length;
				   document.product_subkind_modify.del_seq.value = e.join(',');
				   document.product_subkind_modify.mode.value = "del";
				   document.product_subkind_modify.submit();
				}
			}
		},
		subkind_info = function (evt) {
			var seq = $(evt.currentTarget).attr('rel');
			window.open("product_subkind_info.php?SEQ="+seq,"","toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no,width=445,height=600")
		},
		highLightCount = 0,
		highLight = function (tr) {
			if(tr.is('.myDragClass')) {
				tr.removeClass('myDragClass');
			} else {
				tr.addClass('myDragClass');
			}		
		},
		dataTable = $('table.dataTable'),
		draggableRows = $('tbody tr', dataTable),	
		snItems = $('input.SN'),
		_belong_kind_search = $('#belong_kind_search').bind('change', function (evt) {
			var newURLParams = $(URL_AUG.split("&")).map(function (index, val) {
				if(val && !val.match(/^KIND=/gi)) {
					return val;
				}
			});			
			document.location.href = "product_subkind_admin.php?KIND=" + _belong_kind_search.val() + "&" + newURLParams.get().join("&");
		}),
		_createNewSub = $("#createNewSub").bind('click', data_check),
		_modifySub = $('#modifySub').bind('click', fix_sub_kind),
		_delSub = $('#delSub').bind('click', del_kind);	
		_showDetails = $('.showDetails').bind('click', subkind_info);
		$('td.hint').disableSelection();
		if (snItems.length > 0) {
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
									$(item).find('u').text(index + 1);
								});
								clearInterval(highLightTimer);
								highLightCount = 0;
							}					
						}
						,150
					);			
				}
			});
		} else {
			dataTable.addClass('undraggable');
		}
})(jQuery);
{/literal}
</script>