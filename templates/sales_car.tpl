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
	color: #669933;
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
	border-bottom: none;
	width: 100%;
}
.saleDetail .saleDetailTable thead th{
	font-family: "Times New Roman",Times,serif;
    font-size: 12px;
	color: #FFFFFF;
	font-weight: normal;
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
.saleDetail .saleDetailTable tbody td.uploadTd{
	text-align: center;	
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
.saleDetail .saleDetailTable tbody td a.upload_fix{
	background:url(../images/upload_fix.jpg) no-repeat;
	width: 16px;
	height: 18px;
	display: block;
	margin: 0 auto;
}
.saleDetail .saleDetailTable tbody td a.upload_fix:hover{
	background:url(../images/upload_fix_in.jpg) no-repeat;
}
.saleDetail .saleCountTable{
	border: 1px #666666 solid;
	width: 100%;
}
.saleDetail .saleCountTable tr{
    background:#E1E1C4;
}
.saleDetail .saleCountTable .saleCountLabel{
	color: #CC0000;
    font-family: "Times New Roman",Times,serif;
    font-size: 12px;
    letter-spacing: 3px;
    line-height: 17px;
	text-align: center;
}
.saleDetail .saleCountTable .saleCountValue{
	background:#EBEBD8;
	font-family: "Times New Roman",Times,serif;
    font-size: 12px;
    letter-spacing: 3px;
    line-height: 17px;
	text-align: center;
}
.saleDetail .saleCountTable .transInfo{
	color:#990000;
}
.registFooter {clear:both; width: 100%; text-align:center; margin-top: 25px; }
.registFooter .footerTop{ background: url('../images/Aarrowhand_b1.jpg') no-repeat center top; height: 23px;}
.registFooter .footerBottom{ background: url('../images/Aarrowhand_b2.jpg') no-repeat center top; height: 23px;}
.registFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:30px; padding-top:7px;}
.registFooter .subCateSelection a{ height: 24px; display: block; float: left; margin-left:15px; font-family: Times New Roman,Times,serif; font-size: 12px; color:#000; line-height: 24px; padding-left: 28px; text-align: left; text-decoration: none;}
.registFooter .subCateSelection a:hover{ text-decoration: underline;}
.registFooter .subCateSelection .buy{ background:url(../images/catch_out.jpg) no-repeat;}
.registFooter .subCateSelection .buy:hover{ background:url(../images/catch_in.jpg) no-repeat;}
.registFooter .subCateSelection .continueBuy{ background: url(../images/sales_car_8.jpg) no-repeat;}
.registFooter .subCateSelection .continueBuy:hover{ background: url(../images/sales_car_7.jpg) no-repeat;}
.registFooter .subCateSelection .del_buy{ background: url(../images/arrowhand_redo_out.jpg) no-repeat; }
.registFooter .subCateSelection .del_buy:hover{ background: url(../images/arrowhand_redo.jpg) no-repeat; }
{/literal}
</style>
<div class="title">
	<img src="../images/arrie_tile_sales_car.jpg" width="153" height="27">
</div>
<form action="del_buy_action.php?MODE={$MODE}&SUBKIND={$SUBKIND}" method="post" name="sales">	
	<div class="contentHeader">
		<img src="../images/arrowhead_yellow.JPG" width="14" height="13">
		<span class="saleCarTitle">本次訂單內容</span>
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
					<th width="73" height="35">金　額</th>
					<th width="60" height="35">檔案上傳</th>
					<th width="42" height="35">刪除</th>
				</tr>
			</thead>
			<tbody>
				{if $hasBasket == true}					
					{foreach from=$buyInfo key="buyKey" item="buyItem"}						
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
							<td height="30">
								{$buyItem.price}
							</td>
							<td height="30" class="uploadTd">
								<a href="javascript:{$buyItem.uploadType}({$buyItem.itemSN},{$buyKey+1});" class="{$buyItem.upLoadClass}" title="{$buyItem.uploadMsg}"></a>
							</td>
							<td height="30">
								<input type="checkbox" name="del_sub[{$buyKey+1}]" value="{$buyItem.itemSN}">
							</td>
						</tr>
					{/foreach}
				{else}
					<tr>
						<td height="35" colspan="9" class="noData">目前尚無任何購物！</td>
					</tr>
				{/if}
			</tbody>			
		</table>
		<table class="saleCountTable" cellpadding="0" cellspacing="3">
			<tr>
				<td width="58" class="saleCountLabel">小　計</td>
				<td width="170" height="30" class="saleCountValue">{$subTotal}</td>
				<td width="64" height="30" class="saleCountLabel">運　費</td>
				<td width="97" height="30" class="saleCountValue" id="trans_price">{$transTotal}</td>
				<td width="100" class="saleCountValue">					
					<select name="trans_ty" onChange="javascript:trans();">
						<option value="自行領貨">自行領貨</option>
						<option value="代請運送" selected>代請運送</option>
					</select>					                                    
				</td>
				<td width="165" height="30" class="saleCountValue transInfo">
					<div>※<a href="javascript:trans_info();">運費說明</a> 或來電洽詢 </div>
				</td>
			</tr>
			<tr>
				<td width="58" height="30" class="saleCountLabel">總金額</td>
				<td height="30" colspan="5" class="saleCountValue" id="total">
					{$total}(已含稅金)
				</td>
			</tr>				
		</table>
	</div>
	<div class="registFooter">
		<div class="footerTop"></div>
		<div class="subCateSelection">
			<a href="javascript:;" title="結帳" class="buy">結帳</a> 
			<a href="arri.php?MODE={$MODE}&SUBKIND={$SUBKIND}" class='continueBuy' title='繼續下單'>還要購物</a>
			<a href="javascript:;" class="del_buy" title='刪除購物'>刪除購物</a>
		</div>
		<div class="footerBottom"></div>
	</div>
	<input type="hidden" name="del_num">
	<input type="hidden" name="del_seq">
	<input name="trans_p" type="hidden" value="{$transTotal}">
</form>                
<SCRIPT>
var totalRows= {$saleTotal};
var saleSN= '{$saleSN}';
var subTotal= {$subTotal};
var transTotal= {$transTotal};
{if $hasBasket == true}
var hasBaset= true;
{else}
var hasBaset= false;
{/if}
{literal}
function trans(){
    var trans_ty=document.sales.trans_ty.value; 
	if(trans_ty=="自行領貨"){
	    $.cookie(saleSN+"BuyType",0);
	    document.sales.trans_ty.options[0].selected=true;
		document.getElementById('trans_price').innerHTML="0";
		document.getElementById('total').innerHTML= subTotal+"(已含稅金)";
		document.sales.trans_p.value="0"
	}else if(trans_ty=="代請運送"){
	    $.cookie(saleSN+"BuyType",1);
	    document.sales.trans_ty.options[1].selected=true;
		document.getElementById('trans_price').innerHTML= transTotal;
		document.getElementById('total').innerHTML= (subTotal+transTotal) + "(已含稅金)";
		document.sales.trans_p.value= transTotal;
    }
}
function upload_file(seq,nbr){
	window.open("../pages/user_upload_files_num.php?seq="+seq+"&mbr="+nbr, "Upload"+nbr, "toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no");
}
function upload_fix(seq,nbr){
    window.open("user_upload_fix.php?seq="+seq+"&mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no");
}
function trans_info(){
    window.open("../html/trans_info.htm","","toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no,width=450,height=300");
}
function del_buy(){
	var d=0;
	var ch=0;
	e= new Array();
	while(d < totalRows){
		if(document.sales.elements[d].checked==true){
			ch++;
			e[d]=document.sales.elements[d].value;
		}
		d++;
	}
	if(ch==0){
		alert("沒有勾選刪除的購物！");
		return;
	}else{
		document.sales.del_num.value= ch;    
		document.sales.del_seq.value= e;   
		document.sales.submit();
	}
}
function buy(){	
	if(!hasBaset){
		alert("您至少要有一筆購物才能結帳喔！");
	}else{
		alert("您如果尚未上傳檔案，將來想上傳檔案，或是印製前想更改檔案！請至會員中心的「狀態及記錄」裡上傳您的檔案！");
		window.location.href="confirm_buy.php?TRANS="+document.sales.trans_p.value;
	}
}
;(function($){
	if($.cookie(saleSN+"BuyType") == 0){
		document.sales.trans_ty.options[0].selected=true;
		document.getElementById('trans_price').innerHTML="0";
		document.getElementById('total').innerHTML= subTotal+"(已含稅金)";
		document.sales.trans_p.value="0";
	}else{
		document.sales.trans_ty.options[1].selected=true;
		document.getElementById('trans_price').innerHTML= transTotal;
		document.getElementById('total').innerHTML= (transTotal+subTotal) + "(已含稅金)";
		document.sales.trans_p.value= transTotal;
	}
	$('.registFooter .buy').bind('click', buy);
	$('.registFooter .del_buy').bind('click', del_buy);
	$('.saleDetail .saleDetailTable td').textOverflow('...',false);
})(jQuery);
{/literal}
</SCRIPT>