<script>
{literal}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
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
.wrapper .mainContent .middleContent {
	float: left;
    padding: 30px 20px;
    width: 700px;
}
.content {
    margin-top: 15px;	
}
.content li{
	margin-bottom: 10px;
}
.contentHeader {
	margin-bottom: 8px;
}
.contentHeader .saleCarTitle{
	font-size: 18px;
	color: #660000;
}
.contentHeader .saleCarInfo{
	color: #333;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    letter-spacing: 2px;
	margin-left: 10px;
	line-height: 18px;
	vertical-align: top;
}
.contentHeader .saleNumber{
	color: #999999;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    letter-spacing: 2px;
	line-height: 18px;
	float: right;
}
.contentDetails {
	margin-left: 17px;
	vertical-align:middle; 
	font-size:12px;
	color: #000;	
}
.contentDetails .saleCarTitle {
	font-weight: bold;	
	line-height: 24px;
	font-size: 12px;	
}
.contentDetails .info {
	line-height: 24px;
	font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
	margin-right: 8px;
}
.contentDetails table {
	text-align: center;
	font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
	border: 1px #000 solid;
}
.contentDetails table thead {
	color: #FFF;	
}
.count {
	color: #990033;
	font-weight: bold;
}
.ui-widget {
    font-size: 12px;
}
.ui-datepicker table {
    border-collapse: collapse;
    font-size: 12px;
}
{/literal}
</style>
<div class="title">
	<img src="../images/pers_tile_history.jpg" width="153" height="27">
</div>
<form action="status.php" method="post" id="sales_list" name="sales_list">	
	<ul class="content">
		<li style="vertical-align:middle;">
			<div class="contentHeader">
				<img src="../images/arrowhead_bred.jpg" width="14" height="13">
				<span class="saleCarTitle">查詢其它訂單</span>
				<span class="saleCarInfo">會員編號：{$memberSN}</span>
			</div>
			<div class="contentDetails">
				{html_options name=search_typ options=$queryModes class="search_typ" style="vertical-align:middle; font-size:12px;height:24px;"}
				<select name="detail" class="detail" style="vertical-align:middle; font-size:12px;height:24px;" ></select>		
				<input name="send" type="button" id="send" value="送出" style="vertical-align:middle; font-size:10pt; padding:0; height:26px; display: none;" />
				<input type="hidden" name="MODE">
			</div>
		</li>
		{if $DISPLAY_RESULT == 1}
		<li class="DISPLAY_RESULT" style="vertical-align:middle;">
			<div class="contentDetails">
				<span class="saleCarTitle">查詢結果</span>	
				<span class="info">你一共查詢到 <span class="count">{$searchTotal}</span> 筆資料 </span>
				{if $SN_LIST|@count > 1}				
				{html_options name=search_result options=$SN_LIST selected=$search_result class="search_result" style="vertical-align:middle; font-size:12px;height:24px;"}
				{/if}
			</div>			
		</li>
		<script>
		{literal}
			$(function (){				
				search_result = $(".search_result").bind('change', SELE_RESULT);
			});
		{/literal}
		</script>
		{/if}
		{if $DISPLAY_BUY_LIST == 1}
		<li class="DISPLAY_BUY_LIST" style="vertical-align:middle;">
			<div class="contentHeader">
				<img src="../images/arrowhead_bred.jpg" width="14" height="13">
				<span class="saleCarTitle">訂單資訊：<span class="saleCarInfo">{$listMode}</span></span>			
			</div>
			<div class="contentDetails">
				{if $DISPLAY == 1 && $resultTotal > 0}
					<span class="saleCarTitle">訂單編號：</span> <span class="info">{$resultData.SALES_LA}{$resultData.SEQ_NBR|string_format:"%04d"}</span>
					<span class="saleCarTitle">訂單日期：</span> <span class="info">{$resultData.UPD_DT|date_format:"%d / %m / %Y"}</span>
					<span class="saleCarTitle">交易狀況：</span> <span class="info">{if $resultData.CLOSE == 1}已結案{else}進行中{/if}</span>
				{/if}
			</div>
			<div class="contentDetails">
				<table width="100%" cellpadding="0" cellspacing="3">
					<thead>
						<tr valign="middle" bgcolor="#A56961" class="PS">
							<td width="30" height="35">編號</td>
							<td width="110" height="35">類　別</td>
							<td width="160" height="35">紙張規格</td>
							<td width="48" height="35">單/雙面</td>
							<td width="96" height="35">尺寸(mm X mm)</td>
							<td width="60" height="35">數　量</td>
							<td width="56" height="35">檔案上傳</td>
							<td width="60" height="35">價　格</td>
						</tr>
					</thead>					
					<tbody>	
						{if $resultTotal > 0}
							{foreach from=$resultBuyList item=item name=BuyLists}
								<tr valign="middle" bgcolor="#D9D9D9" class="contents">
									<td height="30">{$smarty.foreach.BuyLists.index+1}</td>
									<td height="30">{$item.NAME}</td>
									<td height="30">{$item.PRO_SUBKIND_NAME}</td>
									<td height="30">{$item.BUY_FACE}面</td>
									<td height="30">{$item.SIZE}</td>
									<td height="30">{$item.QUANTITY}</td>
									<td height="30">
										{if $resultData.FILES_CHECK}
											{if $item.UPLOAD_TAB == 1}<img src="../images/ok_gray.jpg" width="13" height="13">{else}<img src="../images/no_gray.jpg" width="13" height="13">{/if}
										{else}
											{if $item.UPLOAD_TAB == 1}
												<a href="javascript:upload_fix({$item.SEQ}, {$smarty.foreach.BuyLists.index+1});" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('upload_fix{$smarty.foreach.BuyLists.index+1}','','../images/upload_fix_in.jpg',1)"><img src="../images/upload_fix.jpg" name="upload_fix{$smarty.foreach.BuyLists.index+1}" alt="檔案管理" width="16" height="18" border="0"></a>
											{else}
												<a href="javascript:upload_file({$item.SEQ}, {$smarty.foreach.BuyLists.index+1});" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('upload{$smarty.foreach.BuyLists.index+1}','','../images/upload_in.JPG',1)"><img src="../images/upload.jpg" name="upload{$smarty.foreach.BuyLists.index+1}" alt="檔案上傳" width="16" height="18" border="0"></a>
											{/if}
										{/if}
									</td>
									<td height="30">{$item.PRICE}</td>
								</tr>
							{/foreach}
							{if $resultData.TRANS_PRICE > 0}
								<tr valign="middle" bgcolor="#D9D9D9" class="contents">
									<td height="30" bgcolor="#D5D3B3"><div align="center">{$smarty.foreach.BuyLists.last+1}</div></td>
									<td height="30" bgcolor="#D5D3B3"><div align="center" class="style40">運費</div></td>
									<td height="30" colspan="6" bgcolor="#D5D3B3" class="saleCarTitle">{$resultData.TRANS_PRICE}</td>
								</tr>
							{/if}
							<tr>
								<td width="143" height="30" bgcolor="#B17B74" colspan="2" >總　金　額</td>
								<td width="538" height="30" bgcolor="#DCCBC5" colspan="6" class="saleCarTitle">
									<span class="count">{$resultData.FINISH_PAY+$resultData.TRANS_PRICE} </span> (已含稅)
								</td>
							</tr>
						{else}
							<tr valign="middle" class="PS" bgcolor="#E2E2E2"><td height="35" colspan="8">查無任何交易記錄！</td></tr>
						{/if}
					</tbody>
								
				</table>				 
			</div>			
		</li>
		{/if}
		{if $DISPLAY_BUY_LIST == 1 && $resultTotal > 0}			
		<li class="DISPLAY_BUY_STATUS" style="vertical-align:middle;">
			<div class="contentHeader">
				<img src="../images/arrowhead_bred.jpg" width="14" height="13">
				<span class="saleCarTitle">訂單處理狀況：</span>
			</div>
			<div class="contentDetails">
				<table width="100%" border="0" cellpadding="0" cellspacing="3">                               
					<thead>
						<tr valign="middle" bgcolor="#648C8C" class="PS">
							<td width="12%" height="35">步　聚</td>
							<td width="31%" height="35">進　度</td>
							<td width="13%" height="35">狀　態</td>
							<td width="44%" height="35">備　註</td>
						</tr>
					</thead>
					<tbody>
						<tr valign="middle" bgcolor="#E9E9E9" class="contents">
							<td height="30">1</td>
							<td height="30">
								{if $resultData.SALES_LA == "A"}
									月結會員
								{else}
									繳費
								{/if}
							</td>
							<td height="30">								
								{if $resultData.PAY_CHECK == 1}
									<img src="../images/ok_gray.jpg" width="13" height="13">
								{else}
									<img src="../images/no_gray.jpg" width="13" height="13">
								{/if}
							</td>
							<td height="30">
								{if $resultData.PAY_PS}
									{$resultData.PAY_PS}
								{/if}
								{if $resultData.PAY_DATE}
									{$resultData.PAY_DATE|date_format:"%d / %m / %Y"} 確認						
								{/if}
							</td>
						</tr>
						<tr valign="middle" bgcolor="#E2E2E2" class="contents">
							<td height="30">2</td>
							<td height="30">檔案確認</td>
							<td height="30">
								{if $resultData.FILES_CHECK == 1}
									<img src="../images/ok_gray.jpg" width="13" height="13">
								{else}
									<img src="../images/no_gray.jpg" width="13" height="13">
								{/if}
							</td>
							<td height="30">
								{if $resultData.FILES_PS}
									{$resultData.FILES_PS}						
								{/if}								
							</td>
						</tr>
						<tr valign="middle" bgcolor="#DBDBDB" class="contents">
							<td height="30">3</td>
							<td height="30">印刷製作</td>
							<td height="30">
								{if $resultData.PRINT_CHECK == 1}
									<img src="../images/ok_gray.jpg" width="13" height="13">
								{else}
									<img src="../images/no_gray.jpg" width="13" height="13">
								{/if}							
							</td>
							<td height="30">
								{if $resultData.PRINT_PS}
									{$resultData.PRINT_PS}
								{/if}
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D4D4D4" class="contents">
							<td height="30">4</td>
							<td height="30">出貸送運</td>
							<td height="30">
								{if $resultData.TRANS_CHECK == 1}
									<img src="../images/ok_gray.jpg" width="13" height="13">
								{else}
									<img src="../images/no_gray.jpg" width="13" height="13">
								{/if}
							</td>
							<td height="30">
								{if $resultData.TRANS_PS}
									{$resultData.TRANS_PS}
								{/if}							
							</td>
						</tr>
						<tr valign="middle" bgcolor="#CFCFCF" class="contents">
							<td height="30">5</td>
							<td height="30">驗收結案</td>
							<td height="30">
								{if $resultData.CLOSE == 1}
									<img src="../images/ok_gray.jpg" width="13" height="13">
								{else}
									<img src="../images/no_gray.jpg" width="13" height="13">
								{/if}
							</td>
							<td height="30">
								{if $resultData.CLOSE_PS}
									{$resultData.CLOSE_PS}
								{/if}
								{if $resultData.CLOSE_DATE}
										{$resultData.CLOSE_DATE|date_format:"%d / %m / %Y"} 結案
								{/if}							
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</li>
		{/if}
	</ul>
</form>
<script>
{literal}
var searchMode = function (evt, init, val, captionVal, captionVal2) {	
		var index = Number(search_typ.val());
		if(CaptionAlias) CaptionAlias.add(CaptionAlias2).unbind().remove();		
		detail.unbind().hide().children().remove();
		if(captionLabAlias) captionLabAlias.add(captionLabAlias2).remove();	
		if(!init) {
			DISPLAY_RESULT.add(DISPLAY_BUY_LIST).add(DISPLAY_BUY_STATUS).hide();
		}
		send.hide();
		switch (index) {
		case 0:			
			if(init) return;			
			salesForm.trigger('submit');
			break;
		case 1:
{/literal}
			detail
				.append(
					$('<option value="0">--選擇訂單編號--</option>')
				)
		{foreach from=$SN_LIST_P item=item key=key}
		.append($('<option value="{$key}">{$item}</option>'))
		{/foreach}		{literal}.bind('change', 
					function () {
						salesForm.trigger('submit');
					}
				)
				.attr("disabled", false)
				.val(detailVal || 0)
				.show();
			break;
		case 2:
			var endDate = new Date(),			 
				startDate = '-1',
				captionLab = $('<span></span>');			
			CaptionAlias2 = Caption.clone()				
				.css('width', 80)
				.attr('name', 'Caption2')
				.attr("disabled", false)
				.datepicker({
					'dateFormat': 'mm/dd/yy'
				})
				.insertAfter(detail);
			if (captionVal2) {
				CaptionAlias2.datepicker('setDate', captionVal2);
			} else {
				CaptionAlias2.datepicker('setDate', endDate);				
			}
			captionLabAlias2 = captionLab.clone().text(' To: ').insertAfter(detail);
			CaptionAlias = Caption.clone()				
				.css('width', 80)
				.attr('name', 'Caption')
				.attr("disabled", false)
				.datepicker({
					'dateFormat': 'mm/dd/yy'
				})
				.insertAfter(detail);
				
			if (captionVal) {				
				CaptionAlias.datepicker('setDate', captionVal);	
			} else {
				CaptionAlias.datepicker('setDate', startDate);		
			}
			captionLabAlias = captionLab.clone().text(' From: ').insertAfter(detail);
			detail.hide();			
			send.show();
			break;
		case 3:
			CaptionAlias = Caption.clone()
				.attr('name', 'Caption')
				.val('請輸入案件名稱')
				.attr("disabled", false)
				.unbind()
				.bind({
					'focus': function () {
						if (CaptionAlias.val() == '請輸入案件名稱') {
							CaptionAlias.val('');
						}
					},
					'blur': function () {
						if (CaptionAlias.val() == '') {
							CaptionAlias.val('請輸入案件名稱');
						}
					},
					"keydown": keyDownValidate					
				})
				.insertAfter(detail);
				
			if (captionVal) {
				CaptionAlias.val(captionVal);
			}
			detail.hide();
			send.show();
			break;
		case 4:
			CaptionAlias = Caption.clone()
				.val("請輸入金額範圍，如100-5000")
				.css('width', 160)
				.attr('name', 'Caption')
				.attr("disabled", false)
				.bind({
					'focus': function () {
						if (CaptionAlias.val() == '請輸入金額範圍，如100-5000') {
							CaptionAlias.val('');
						}
					},
					'blur': function () {
						if (CaptionAlias.val() == '') {
							CaptionAlias.val('請輸入金額範圍，如100-5000');
						}
					},
					"keydown": keyDownValidate
				})				
				.insertAfter(detail);
			CaptionAlias2 = Caption.clone()
				.attr('name', 'Caption2')
				.attr("disabled", false)
				.hide()
				.insertAfter(detail);
			if (captionVal) {
				CaptionAlias.val(captionVal);
			}
			if (captionVal2) {
				CaptionAlias2.val(captionVal2);
			}
			detail.hide();
			send.show();
			break;
		}
	},
{/literal}	
	queryMode = {$queryMode},
	detailVal = '{$DETAIL}',
	captionVal = '{$Caption}',
	caption2Val = '{$Caption2}',
{literal}
	salesForm = $('#sales_list'),
	search_typ = $(".search_typ").bind('change', searchMode),
	search_result,
	DISPLAY_RESULT = $('.DISPLAY_RESULT'),
	DISPLAY_BUY_LIST = $('.DISPLAY_BUY_LIST'),
	DISPLAY_BUY_STATUS = $('.DISPLAY_BUY_STATUS'),
	detail = $(".detail"),//.hide(),
	Caption = $(' <input class="caption" type="text" style="vertical-align:middle; padding:0; margin-left: 3px; width:150px; font-size:12px; height:22px; line-height:22px;" />').val("").attr("disabled", true),
	send = $('#send'),
	CaptionAlias,
	CaptionAlias2,
	captionLabAlias,
	captionLabAlias2,
	keyDownValidate = function (evt) {						
		switch(evt.keyCode) {
		case 222:
			return false;
			break;
		case 49:
			if ( evt.shiftKey == true) return false;
			break;		
		}				
	},
	upload_file = function (seq,nbr){
	   // window.open("status_upload_files_num.php?STATUS=HISTORY&seq="+seq+"if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; }  if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } &mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=418,height=165");
	},
	upload_fix = function (seq,nbr){
	   // window.open("status_upload_fix.php?STATUS=HISTORY&seq="+seq+"if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; }  if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } &mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=620,height=335");
	},
	data_check = function (evt, searchResult){		
		var searchMode = Number(search_typ.val()),
			detailVal = detail.val(),
			captionVal,
			captionVal2,
			startDate = new Date(),			 
			endDate = new Date(),	
			submit = false;			
		switch(searchMode) {
		case 0:
			submit = true;
			break;
		case 1:
			if ( detailVal != 0) {
				submit = true;	
			}
			break;
		case 2:		
			captionVal = CaptionAlias.val();
			captionVal2 = CaptionAlias2.val();			
			startDate.setFullYear(captionVal.split('/')[2]);
			startDate.setMonth(captionVal.split('/')[0] - 1);
			startDate.setDate(captionVal.split('/')[1]);
			endDate.setFullYear(captionVal2.split('/')[2]);
			endDate.setMonth(captionVal2.split('/')[0] - 1);
			endDate.setDate(captionVal2.split('/')[1]);
			if (endDate.getTime() >= startDate.getTime()) {
				submit = true;
			} else {
				alert('查詢時間格式有誤!');
			}
			if(searchResult == undefined) {
				if(search_result) search_result.val(0);
			}
			break;
		case 3: case 4:
			captionVal = CaptionAlias.val();		
			if (captionVal == '' || captionVal == '請輸入案件名稱' || captionVal == '請輸入金額範圍，如100-5000') {
				CaptionAlias.val(captionVal);
				submit = true;
			} else {
				submit = true;
			}
			if (searchMode == 4) {
				if (captionVal == '' || captionVal == '請輸入金額範圍，如100-5000') {
					CaptionAlias2.val('');
				} else {
					var vals = captionVal.match(/[\-|\~]{1,1}/ig);
					if( vals.length == 1) {					
						CaptionAlias2.val(captionVal.split(vals[0]).join(','));					
						submit = true;
					} else {
						submit = false;
					}
				}
			}			
			if(searchResult == undefined) {
				if(search_result) search_result.val(0);
			}			
			break;
		}
		if (submit === true) {
			return true;
		} else {
			return false;
		}		
	},
	SELE_RESULT = function (seq){
		salesForm.trigger('submit', [true]);
	};

search_typ.val(queryMode).trigger('change', [true, detailVal, captionVal, caption2Val]);
salesForm.bind('submit', function (evt, check) {	
	return data_check(evt, check);
});
send.bind('click', function (evt) {	
	salesForm.trigger('submit');
});
{/literal}
</script>