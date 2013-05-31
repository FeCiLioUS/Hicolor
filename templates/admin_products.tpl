<script>
var total= {$productsList|@count},
	delTab = '{$delTab}',
	kindOptions = [{literal}{'name': '--選擇類別--', 'sn': 0}{/literal}],
	subkindOptions = [{literal}{'name': '--選擇規格--', 'sn': 0}{/literal}],
	transOptions = [{literal}{'name': '--選擇等級--', 'sn': 0}{/literal}],
	newVal;
{foreach from=$kindOptions item=itemVal}	
{literal}newVal = {};{/literal}
newVal.name = '{$itemVal.NAME}';
newVal.sn = '{$itemVal.SEQ_NBR}';
kindOptions.push(newVal);	
{/foreach}
{foreach from=$subkindOptions item=itemVal}	
{literal}newVal = {};{/literal}
newVal.name = '{$itemVal.NAME}--{$itemVal.PRO_SUBKIND_NAME}';
newVal.sn = '{$itemVal.SEQ_NBR}';
subkindOptions.push(newVal);	
{/foreach}
{foreach from=$transOptions name='transOptions' item=itemVal}	
{literal}newVal = {};{/literal}
newVal.name = {$smarty.foreach.transOptions.index+1};
newVal.sn = '{$itemVal.SEQ_NBR}';
transOptions.push(newVal);	
{/foreach}

{literal}
function photo_upload(seq){
	window.open("NEWS_Photo_Upload.htm?Bgl_Num="+seq,"Upload","toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no,width=400,height=140");
}

function fix_product(num){
    window.location.href="product_fix.php?SEQ_NUM="+num+"&PAGE=<? echo $PAGE_NOW.$URL_AUG; ?>";
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
label.error {
	position: absolute;
    top: -1000px;
}
table thead tr {
    border: 0 none;
    height: 0;
    line-height: 0;
    margin: 0;
    padding: 0;
}
table th {
    border: 0 none;
    height: 0;
    line-height: 0;
    margin: 0;
    padding: 0;
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
	line-height: 20px;
}
.sub_name {
	font-family: "華康中黑體(P)";
	font-size: 18px;
}
.style26 {color: #666666}
.style32 {color: #FFFFFF}
.style50 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #990000; font-variant: normal; line-height: 20px; }
.style51 {color: #333333}
.style52 {font-size: 12px}
.style54 {font-size: 14px; }
.style55 {color: #666666; font-size: 14px; }
.style57 {color: #666666; font-size: 13px; }
.style58 {color: #990000}
.detail_search {
	display: none;
}
{/literal}
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom">
			<div align="center" class="headerLogo">
				<img src="../images/product_tile_admin.jpg" width="153" height="27">
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
			<div align="left">
				<table width="550" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<div align="center">
								<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								<a href="product_kind_admin.php?PAGE={$pageNow}{$urlAug}" class="style50"  STYLE="text-decoration: none" >
									<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'"> 產品類別</font>
								</a>
							</div>
						</td>
						<td class="info">
							<div align="center">
								<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								<a href="product_subkind_admin.php?PAGE={$pageNow}{$urlAug}" class="style50"  STYLE="text-decoration: none" >
									<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">產品規格</font>
								</a>
							</div>
						</td>
						<td>
							<div align="center" class="style58">								
								<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								<a href="product_add.php?PAGE={$pageNow}{$urlAug}" class="style50"  STYLE="text-decoration: none" >新增品名</a>								
							</div>
						</td>
						<td>
							<div align="center">								
								<span class="info">
									<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								</span>
								<span class="style58">
									<a href="javascript:;" class="productsSearch style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">細項搜尋</font>
									</a>
								</span>
							</div>
						</td>
						<td>
							<div align="center">
								<span class="info">
									<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								</span>
								<span class="style58">
									<a href="javascript:document.location.href='admin_products.php?MODE=DEL';" class="style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">已刪除產品</font>
									</a>
								</span>
							</div>
						</td>
						<td>
							<div align="center">
								<span class="info">
									<img src="../images/arrowhead_small_org.jpg" width="9" height="9">
								</span>
								<span class="style58">
									<a href="javascript:document.location.href='admin_products.php';" class="style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">重新載入</font>
									</a>
								</span>
							</div>
						</td>
					</tr>
				</table>	
			</div>
		</td>
	</tr>
	<tr class="detail_search">
		<td>
			<form name="search_product_form" id="searchProductForm" method="post" action="admin_products.php">
				<div align="center" class="menu style26">					
					<select name="search_typ" id="search_typ" style="font-size:12px; width:110; height:24px; vertical-align: middle;">
						<option value="0" selected>--選擇搜尋方式--</option>
						<option value="1">產品類別</option>
						<option value="2">產品規格</option>
						<option value="3">品名編號</option>
						<option value="4">運費等級</option>
						<option value="5">建檔日期</option>
					</select>
					<select name="search_aq" id="search_aq" style="font-size:12px; width:250; height:24px; vertical-align: middle;" disabled >
						<option value="0" selected>--選擇參數--</option>
					</select>
					<input style="font-size: 12px; width: 100px; height: 18px; vertical-align: middle;" class="required" maxLength="20" id="Keyword" name="Keyword" disabled />
					<input name="search" type="button" id="search" value="查詢" style="font-size:12px; width:40; height:24px; vertical-align: middle;">
					<input type="hidden" name="Q_TAB" value="1">					
				</div>
			</form>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<form action="../pages/product_del_action.php{$delTab}" method="post" name="productDelForm" >
	<table style="table-layout: fixed;" width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="0" cellspacing="3">					
					<tr valign="middle" bgcolor="#C7DADC" class="PS">
						<td height="35" colspan="7" bgcolor="#C6D6DD">
							<div align="center" class="style32">
								<span class="menu">
									<span class="contents">{$pagination}</span>
									<input type="hidden" name="del_num">
									<input type="hidden" name="del_seq">
								</span>
							</div>                      
						</td>
						<td height="35" bgcolor="#C6D6DD">
							<div align="center">
								<span class="style32">
									<span class="menu">
										<FONT size=2>
											<span class="menu style26">
												<input name="product_del" type="button" id="product_del" value="刪除" style="font-size:9pt;width:40;height:22px;" />
											</span>
										</FONT>
									</span>
								</span>
							</div>
						</td>
					</tr>
					<tr valign="middle" bgcolor="#999999" class="PS">
						<td width="45px" height="34"><div align="center" class="style32">編 號</div></td>
						<td width="70px" height="34" class="style32"><div align="center">產 品 編 號</div></td>
						<td width="120px" height="34" class="style32"><div align="center">產 品 類 別</div></td>
						<td width="140px" height="34" class="style32"><div align="center">產 品 規 格</div></td>
						<td width="65px" height="34" class="style32"><div align="center">單 / 雙面 </div></td>
						<td width="75px" height="34"><div align="center" class="style32">產 品 數 量</div></td>
						<td width="60px" height="34" class="style32"><div align="center">價 格</div></td>
						<td height="34" class="style32"><div align="center">刪 除</div></td>
					</tr>
					{if $productsList|@count == 0}
						<tr valign="middle" class="PS"><td height="35" colspan="8"><div align="center" class="style32 style58">查無任何消息！</div></td></tr>						
					{else}
						{foreach name='productsData' from=$productsList item=itemData}						
						<tr valign="middle" bgcolor="#D9D9D9" class="style26">
							<td height="30">
								<div align="center" class="style54">
									<a href="javascript:fix_product({$itemData.SEQ_NBR});" class="style50" STYLE="text-decoration: none">
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">{$itemData.PRO_SN}</font>
									</a>
								</div>
							</td>
							<td height="30" class="style57">
								<div align="center">{$itemData.SEQ_NBR|string_format:"%4d"}</div>
							</td>
							<td height="30" class="style57">
								<div align="center">{$itemData.PRO_KIND_NAME}</div>
							</td>
							<td height="30" class="style57">
								<div align="center">{$itemData.PRO_SUBKIND_NAME}</div>
							</td>
							<td height="30" class="style57">
								<div align="center">
								{if $itemData.FACE == 1}單面{else}雙面{/if}
								</div>
							</td>
							<td height="30" class="style57">
								<div align="center" class="style54">
									<DIV align=center>{$itemData.AMOUNT} {$itemData.UNIT_NM}</DIV>
								</div>
							</td>
							<td height="30" class="style57">
								<div align="center">{$itemData.PRICE}</div>
							</td>
							<td>
								<div align="center"><INPUT type="checkbox" value="{$itemData.SEQ_NBR}" name="del_produ[{$smarty.foreach.productsData.index+1}]"></div>
							</td>
						</tr>						
						{/foreach}
					{/if}
					<!--/tbody-->
				</table>
			</td>
		</tr>
	</table>
</form>
<script>
{literal}
$.fn.disable = function() {
    return this.attr("disabled", true);
}
$.fn.enable = function() {
    return this.attr("disabled", false);
}
var _document = $(document),
	searchProductForm = $('#searchProductForm'),
	detail_search = $('.detail_search'),
	delProduct = function (){		
		var selectedItems = $('input:checked').filter(function () { return /^del_produ*/.test(this.name); });
		if (selectedItems.length == 0) {
			alert("沒有勾選刪除的產品！");
			return;
		} else {			
			document.productDelForm.del_num.value = selectedItems.length;
			document.productDelForm.del_seq.value = function () {
				var delArray = [];
				$(selectedItems).each(
					function (index, item) {
						delArray.push($(item).val());
					}
				);
				return delArray.join(',');
			}();
			if(delTab) {
				if(confirm("你確定要永遠刪除產品！")){
					document.productDelForm.submit();
				}
			} else {
				if(confirm("你確定要刪除產品！")){
					document.productDelForm.submit();
				}
			}
		}		
	},
	searchSubmit = function (){
		searchProductForm.validate();
		if (!searchProductForm.valid()) {
			if(Keyword.is('.number')){				
				alert("請輸入數字");
			} else {
				alert("請輸入正確日期格式");
			}
			return false;
		} else {
			searchProductForm.trigger('submit');
		}		
	},
	searchTypeChangeHandler = function () {		
		var val = searchTyp.val();		
		searchAq.unbind('change').children().remove();
		searchButton.hide();
		Keyword.unbind('keydown').removeClass('DateFormat number').datepicker( "destroy" );
		switch(Number(val)) {
		case 0:
			searchAq.append($('<option value="0"></option>').text('--選擇參數--')).disable().hide();
			Keyword.disable().val('').hide();
			break;
		case 1: case 2:	case 4:
			searchAq.enable().bind('change', aqSelect).show();
			Keyword.disable().val('').hide();
			break;
		case 3: case 5:
			searchAq.disable().hide();
			searchButton.show();
			Keyword.enable().val('').show();		
			break;
		}
		if(val == 1) {
			$(kindOptions).each(function (index, item) {
				searchAq.append(
					$('<option></option>').val(item.sn).text(item.name)
				);
			});		
		}
		if(val == 2) {
			$(subkindOptions).each(function (index, item) {
				searchAq.append(
					$('<option></option>').val(item.sn).text(item.name)
				);
			});		
		}
		if(val == 3) {			
			Keyword.attr('placeHolder', "--輸入品名編號--").addClass('number');
			if ($.browser.msie) {
				Keyword.val("--輸入品名編號--");
			}
		}		
		if(val == 4) {
			$(transOptions).each(function (index, item) {
				searchAq.append(
					$('<option></option>').val(item.sn).text(item.name)
				);
			});		
		}
		if(val == 5) {
			Keyword.attr('placeHolder', "YYYY/MM/DD").addClass('DateFormat').bind('keydown', function () { return false; }).datepicker({ dateFormat: "yy/mm/dd"});
			if ($.browser.msie) {
				Keyword.val("YYYY/MM/DD");
			}
		}
	},
	aqSelect = function (){		
		var qa = searchAq.val();
		if (qa == 0) return;
		switch(Number(searchTyp.val())) {
		case 1:
			document.location.href = "../pages/admin_products.php?MODE=kind&Keyword=" + qa;
			break;
		case 2:
			document.location.href = "../pages/admin_products.php?MODE=sub_kind&Keyword=" + qa;
			break;
		case 4:
			document.location.href = "../pages/admin_products.php?MODE=trans_la&Keyword=" + qa;
			break;
		}	   
	},
	productsSearch = $('.productsSearch').toggle(
		function() {
			detail_search.show();
		},
		function() {
			detail_search.hide();
		}
	),
	searchButton = $('#search').bind('click', searchSubmit).hide(),
	searchTyp = $('#search_typ').bind('change', searchTypeChangeHandler),
	searchAq = $('#search_aq').hide(),
	productDel = $('#product_del').bind('click', delProduct),
	Keyword = $('#Keyword').bind({
			'focus': function () {
				if (Keyword.val() == '--輸入品名編號--' || Keyword.val() == 'YYYY/MM/DD') {
					Keyword
						.data('value', Keyword.val())
						.val('');
				}
			},
			'blur': function () {
				if (Keyword.val() == '') {
					Keyword.val(Keyword.data('value'));
				}
			}		
		}).hide();
		
	$.validator.addMethod(
		 "DateFormat",
		 function(value, element) {
			if (value.match(/^\d\d\d\d\/\d\d\/\d\d$/)) {
				return true;
			} else {
				return false;
			}			
		 },
		  "Please enter a date in the format dd/mm/yyyy"
     );
	if (_document.getUrlParam('MODE') == 'kind') {
		productsSearch.trigger('click');
		searchTyp.val(1).trigger('change');
		searchAq.val(_document.getUrlParam('Keyword'));
	} else if (_document.getUrlParam('MODE') == 'sub_kind') {
		productsSearch.trigger('click');
		searchTyp.val(2).trigger('change');
		searchAq.val(_document.getUrlParam('Keyword'));
	} else if (_document.getUrlParam('MODE') == 'trans_la') {
		productsSearch.trigger('click');
		searchTyp.val(4).trigger('change');
		searchAq.val(_document.getUrlParam('Keyword'));
	} else {
{/literal}
	{if $smarty.post.search_typ == 3}
		productsSearch.trigger('click');
		searchTyp.val(3).trigger('change');
		Keyword.val({$smarty.post.Keyword}).show();			
	{elseif $smarty.post.search_typ == 5}
		productsSearch.trigger('click');
		searchTyp.val(5).trigger('change');
		Keyword.val('{$smarty.post.Keyword}').show();
	{else}
		searchTyp.val(0);
	{/if}
{literal}
	}	
{/literal}
</script>