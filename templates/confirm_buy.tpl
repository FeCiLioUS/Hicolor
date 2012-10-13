<style>
{literal}
.wrapper .mainContent .middleContent{
	padding: 30px 20px;
	width: 700px;
}
.contentHeader{
	margin-top:25px;
}
.contentHeader .saleCarTitle{
	font-size: 18px;
	color: #0099cc;
}
.contentHeader .saleCarInfo{
	color: #999999;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    letter-spacing: 2px;
	margin-left: 20px;
	line-height: 18px;
}
.contentHeader .saleNumber{
	color: #999999;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    letter-spacing: 2px;
	line-height: 18px;
	float: right;
}
.saleDetail{
	margin-top:10px;
}
.saleDetail .saleDetailTable{
	border: 1px #666666 solid;
	width: 100%;
}
.saleDetail .saleDetailTable thead th{
	font-family: "Times New Roman",Times,serif;
    font-size: 12px;
	color: #FFFFFF;
	font-weight: normal;
}
.saleDetail .saleDetailTable tbody tr.transPay td{
	background: #D5D3B3;
}
#trans_price{
	margin-right:10px;
	color:#000;
}
.saleDetail .saleDetailTable tbody tr.transPay td.tranTitle{
	color: #cc0000;
}
.saleDetail .saleDetailTable tbody tr.totalPay td{
	background:#949CBC;
	color: #000;
}
.saleDetail .saleDetailTable tbody tr.totalPay td.totalCont{
	background:#C6C8D7;
}
.saleDetail .saleDetailTable tbody td.noData{
	color: #990000;
	font-family: "Times New Roman",Times,serif;
    font-size: 12px;
	text-align: center;
}
.saleDetail .saleDetailTable tbody td{
	padding: 0 5px;
	background: #d9d9d9;
	color: #666666;
	line-height: 17px;
	font-family: Times New Roman", Times, serif;
	letter-spacing: 3px;
	font-size: 12px;
	text-align: center;
	text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    -icab-text-overflow: ellipsis;
    -khtml-text-overflow: ellipsis;
    -moz-text-overflow: ellipsis;
    -webkit-text-overflow: ellipsis;
    white-space: nowrap;
	overflow: hidden;
}
.saleDetail .saleDetailTable tbody td.label{
	background: #999999;
	color: #FFFFFF;
}
.saleDetail .saleDetailTable tbody td.uploadTd{
	text-align: center;	
}
.saleDetail .saleDetailTable tbody td.uploadTd img{
	margin-top: 5px;
}
.saleDetail .saleDetailTable tbody td a.upload{
	background:url(../images/upload.jpg) no-repeat;
	width: 16px;
	height: 18px;
	display: block;
	margin: 0 auto;
}
.saleDetail .saleDetailTable tbody td a.upload:hover{
	background:url(../images/upload_in.jpg) no-repeat;
}
.registFooter {clear:both; width: 100%; text-align:center; margin-top: 25px; }
.registFooter .footerTop{ background: url('../images/Aarrowhand_b1.jpg') no-repeat center top; height: 23px;}
.registFooter .footerBottom{ background: url('../images/Aarrowhand_b2.jpg') no-repeat center top; height: 23px;}
.registFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:30px; padding-top:7px;}
.registFooter .subCateSelection a{ height: 24px; display: block; float: left; margin-left:15px; font-family: Times New Roman,Times,serif; font-size: 12px; color:#000; line-height: 24px; padding-left: 28px; text-align: left; text-decoration: none;}
.registFooter .subCateSelection a:hover{ text-decoration: underline;}
.registFooter .subCateSelection .ok{ background:url(../images/arrie_tile_ok_out.jpg) no-repeat;}
.registFooter .subCateSelection .ok:hover{ background:url(../images/arrie_tile_ok.jpg) no-repeat;}
.registFooter .subCateSelection .basket{ background: url(../images/sales_car_9.jpg) no-repeat;}
.registFooter .subCateSelection .basket:hover{ background: url(../images/sales_car_10.jpg) no-repeat;}
.registFooter .subCateSelection .refresh{ background: url(../images/arrowhand_redo_out.jpg) no-repeat; }
.registFooter .subCateSelection .refresh:hover{ background: url(../images/arrowhand_redo.jpg) no-repeat; }
{/literal}
</style>
<div class="title">
	<img src="../images/arrie_tile_comfirm_data.jpg" width="153" height="27">
</div>
<form action="finish_buy_action.php" method="post" name="confi">
	<div class="contentHeader">
		<img src="../images/arrowhead_blue.JPG" width="14" height="13">
		<span class="saleCarTitle">訂單內容</span>
		<span class="saleCarInfo">會員編號：{$memberSN}</span>
{if $hasBasket == true}
		<span class="saleNumber">訂單編號：{$saleSN}</span>
{/if}
	</div>
	<div class="saleDetail">
		<table class="saleDetailTable" cellpadding="0" cellspacing="3">
			<thead>
				<tr valign="middle" bgcolor="#999999">
					<th width="32" height="35">編號</th>
					<th width="107" height="35">類　別</th>
					<th width="135" height="35">紙張規格</th>
					<th width="52">單/雙 面</th>
					<th width="93" height="35">尺寸(mm X mm)</th>
					<th width="76" height="35">數　量</th>
					<th width="60" height="35">附 加 檔</th>
					<th width="42" height="35">價　格</th>					
				</tr>
			</thead>
			<tbody>
				{if $hasBasket == true}
					{foreach name="confirmBuyData" from=$butyedInfo key="buyKey" item="buyItem" }
						<tr>
							<td height="30">{$buyKey+1}</td>
							<td height="30" title="{$buyItem.kindName}">
								{$buyItem.kindName}
							</td>
							<td height="30" title="{$buyItem.proSubKindName}">
								{$buyItem.proSubKindName}
							</td>
							<td height="30">
								{$buyItem.face} 面
							</td>
							<td height="30">
								{$buyItem.finishX} X {$buyItem.finishY}
							</td>
							<td height="30">
								{$buyItem.count}
							</td>
							<td height="30" class="uploadTd">
								<img width="13" height="13" src="../images/{$buyItem.upload_tab}">
							</td>
							<td height="30">
								{$buyItem.price}
							</td>							
						</tr>
					{/foreach}
					<tr class="transPay">
						<td colspan="2" height="30" class="tranTitle">運費</td>
						<td colspan="6" height="30">
							<span id="trans_price">								
								{if $transTotalSelected == 0}
									0
								{else}
									{$transTotal}
								{/if}										
							</span>
							<select name="trans_ty" onChange="javascript:trans();">
								<option value="自行領貨">自行領貨</option>
								<option value="代請運送">代請運送</option>
							</select>
							<input type="hidden" name="trans_tt" value="{$transTotal}">
						</td>
					</tr>
					<tr class="totalPay">
						<td colspan="2" height="30">總　金　額</td>
						<td colspan="6" height="30" class="totalCont">
							<span id="total">{if $transTotalSelected == 0}{$subTotal}{else}{$total}{/if} (已含稅金)</span>							
						</td>
					</tr>
				{else}
					<tr>
						<td height="35" colspan="8" class="noData">目前尚無任何購物！</td>
					</tr>
				{/if}
			</tbody>
		</table>
	</div>
	<div class="contentHeader">
		<img src="../images/arrowhead_blue.JPG" width="14" height="13">
		<span class="saleCarTitle">送貨資料</span>
	</div>
	<div class="saleDetail">
		<table class="saleDetailTable" cellpadding="0" cellspacing="3">						
			<tr>
				<td width="80" height="35" class="label">收件人</td>
				<td width="135" height="35">
					<input name="trans_name" type="text" style="font-size:9pt;width:100px;height:16px;" value="{$LOGIN_OBJ.LOG_NAME}">
				</td>
				<td width="83" height="35" class="label">聯絡電話</td>
				<td width="142" height="35">
					<input name="trans_phone" type="text" style="font-size:9pt;width:100px;height:16px;" value="{$LOGIN_OBJ.LOG_PHONE}">
				</td>
				<td width="84" height="35" class="label">行動電話</td>
				<td width="151" height="35">
					<input name="trans_MOBILE" type="text" style="font-size:9pt;width:120px;height:16px;" value="{$LOGIN_OBJ.LOG_MOBILE}">
				</td>
			</tr>
			<tr>
				<td height="30" class="label">送貨地址</td>
				<td height="30" colspan="3">
					<input name="trans_adress" type="text" style="font-size:9pt;width:320px;height:16px;" value="{$LOGIN_OBJ.LOG_address}">
				</td>
				<td height="30" class="label">收件時間</td>
				<td height="30">
					{html_options name='trans_time' options= $transTimeOptions style="font-size:9pt;width:125px;height:20px;"}
				</td>
			</tr>
			<tr>
				<td height="35" class="label">發票抬頭</td>
				<td height="35" colspan="3">
					<input name="receipt_title" type="text" style="font-size:9pt;width:320px;height:16px;" value="{$LOGIN_OBJ.LOG_RECEIPT_TITLE}">
				</td>
				<td height="35" class="label">統一編號</td>
				<td height="35">
					<input name="SN" type="text" style="font-size:9pt;width:120px;height:16px;" value="{$LOGIN_OBJ.LOG_RECEIPT_SN}" size="8">
				</td>
			</tr>
			<tr>
				<td height="30" class="label">發票地址</td>
				<td height="30" colspan="3">
					<input name="receipt_adress" type="text" style="font-size:9pt;width:320px;height:16px;" value="{$LOGIN_OBJ.LOG_addressr}">
				</td>
				<td height="30" class="label">發票種類</td>
				<td height="30">
					{html_options name='receipt_type' options= $receiptTypeOptions selected=$receiptTypeSelected style="font-size:9pt;width:125px;height:20px;"}
				</td>
			</tr>							
		</table>
	</div>
	<div class="registFooter">
		<div class="footerTop"></div>
		<div class="subCateSelection">
			<a href="javascript:;" title="確認送出" class="ok">確認送出</a> 
			<a href="sales_car.php" class='basket' title='回購物車'>回購物車</a>
			<a href="javascript:;" class="refresh" title='重新整理'>重新整理</a>
		</div>
		<div class="footerBottom"></div>
	</div>
	<input type="hidden" name="submited" value="0"></td>
</form>	
<script>
var saleSN= '{$saleSN}';
var subTotal= {$subTotal};
var transTotal= {$transTotal};
var hasBaset= {$hasBasket};
var transType= {$transType};
{literal}
function ok(){ 
    var trans_tt=document.confi.trans_tt.value; 
	var trans_adress=document.confi.trans_adress.value; 
	var trans_time=document.confi.trans_time.value; 
	var receipt_title=document.confi.receipt_title.value; 
	var SN=document.confi.SN.value; 
	var receipt_adress=document.confi.receipt_adress.value; 
	var receipt_type=document.confi.receipt_type.value; 
    if(trans_adress=="" || trans_adress.match(/[\!\@\#\$\%\^\&\*\=\`\\\?\/\,\.\>\<\"\'\:\;]/g)){
	  alert("請輸入送貨地址，不得有除「~」或「-」以外之符號字元！");
	  document.confi.trans_adress.focus();	
	  return;  
	}
	if(trans_time==0){
	  alert("請選擇您方便收貨的時間！");
	  document.confi.trans_time.focus();	
	  return; 	
	}
	if(receipt_title && receipt_title.match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)){
	  alert("請勿輸入特殊符號字元！");
	  document.confi.receipt_title.focus();
	  return; 	
	}
	if(SN && isNaN(SN)){
	  alert("請輸入數字格式的統一編號！");
	  document.confi.SN.value="";
	  document.confi.SN.focus();
	  return; 	
	}
	if(receipt_adress=="" || receipt_adress.match(/[\!\@\#\$\%\^\&\*\=\`\\\?\/\,\.\>\<\"\'\:\;]/g) ){
	  alert("請輸入發票地址，不得有除「~」或「-」以外之符號字元！");
	  document.confi.receipt_adress.focus();
	  return; 	
	}
	if(receipt_type==0){
	  alert("請選擇發票類型！");
	  document.confi.receipt_type.focus();
	  return; 	
	}
	if(document.confi.submited.value==1){
	  alert("已處理你送出的帳單！需要查看你的訂單狀況，\n您可以至「會員中心」的「交易狀態及紀錄」！");	  
	  return; 	
	}else{
	   document.confi.submited.value=1;
	   if(confirm("你確定要送出已結帳之訂單！")){
		   document.confi.submit();
	   }else{
		   document.confi.submited.value=0;
	   }
	}
}  
function trans(){
	var trans_ty=document.confi.trans_ty.value;
	if(trans_ty=="自行領貨"){
	    $.cookie(saleSN+"BuyType",0);
	    document.confi.trans_ty.options[0].selected=true;
		document.getElementById('trans_price').innerHTML="0";
		document.getElementById('total').innerHTML= subTotal+" (已含稅金)";
	}else if(trans_ty=="代請運送"){
	    $.cookie(saleSN+"BuyType",1);
	    document.confi.trans_ty.options[1].selected=true;
		document.getElementById('trans_price').innerHTML= transTotal;
		document.getElementById('total').innerHTML= (subTotal+transTotal) + " (已含稅金)";
    }
}
;(function($){
	var _ok= $('.subCateSelection .ok');
	var _refresh= $('.subCateSelection .refresh');
	_ok.bind('click',function(){
		ok();
	});
	_refresh.bind('click',function(){
		$.cookie(saleSN+"BuyType", null)
		window.location.reload();
	});	
	if($.cookie(saleSN+"BuyType") == 0){		
		document.confi.trans_ty.options[0].selected=true;	
		document.getElementById('trans_price').innerHTML="0";
		document.getElementById('total').innerHTML= subTotal+" (已含稅金)";
	}else if($.cookie(saleSN+"BuyType") == 1){
		document.confi.trans_ty.options[1].selected=true;
		document.getElementById('trans_price').innerHTML= transTotal;
		document.getElementById('total').innerHTML= (transTotal+subTotal) + " (已含稅金)";
	}else{
		if(transType == 0){
			document.confi.trans_ty.options[0].selected=true;
			document.getElementById('trans_price').innerHTML="0";
			document.getElementById('total').innerHTML= subTotal+" (已含稅金)";
		}else{
			document.confi.trans_ty.options[1].selected=true;
			document.getElementById('trans_price').innerHTML= transTotal;
			document.getElementById('total').innerHTML= (transTotal+subTotal) + " (已含稅金)";
		}		
	}
	
//	$('.saleDetail .saleDetailTable td').textOverflow('...',false);
})(jQuery);
{/literal}
</script>