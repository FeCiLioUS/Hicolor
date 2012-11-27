<style type="text/css">
{literal}
.cateTitle { border-bottom: 1px solid #999999;}
.cateTitle span { background:url('../newSecurityImg/images/arrie_org.png') no-repeat center top; min-width: 160px; display: inline-block; color: #006699; text-align:center; font: 14pt Arial,Helvetica,sans-serif; font-weight: bold;  letter-spacing: 4px; vertical-align: middle; line-height:35px; }
.viewBasket { float:right; background: url('../images/sales_car.jpg') no-repeat;}
.viewBasket:hover { background: url('../images/sales_car_2.jpg') no-repeat;}
.viewBasket a {  color: #333333; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 2px; line-height:25px; text-decoration: none; padding-left:30px;}
.subTitle {  margin-top:20px;  height:30px; float: left; font-family: Arial,Helvetica,sans-serif; font-size: 16px;  color: #CC0000; background: url('../images/arrowhead_yg.jpg') no-repeat; padding-left:20px;}
.subCateSelection{ height: 30px; padding-right:25px; margin-top: 17px; margin-left:20px; float: left; background:url('../images/arri_sub_paper.jpg') no-repeat right top;}
.subCateSelection select{ margin-top: 3px; font-family: Arlial,Helvetica,sans-serif; font-size:12px; height:18px;}
.productDetail { clear: both; display: inline-block;}
.productDetail .description { width: 370px; float: left;}
.productDetail .description .photoAttach { margin-top: 10px;}
.productDetail .description .photoAttach li { margin:10px 0;}
.productDetail .description .photoAttach li .photoName { display: block; color: #333333; font-weight: bold; font-size: 12px; line-height: 24px;}
.productDetail .description .photoAttach li .photo { clear:both; }
.productDetail .description .cutModleAttach{display: inline-block;}
.productDetail .description .cutModleAttach li{	float: left; margin-right: 5px;}
.productDetail .description .cutModleAttach li a{font-size: 13px; line-height: 24px; text-decoration: underline;}
.productDetail .description .items {
	clear: both;
}
.productDetail .description .items li{ margin-top:15px;}
.productDetail .description .items li .listIcon { background: none repeat scroll 0 0 #DBE6EC; clear: both; display: block; float: left; height: 33px; margin-right: 5px; width: 13px; }
.productDetail .description .items li .sectionTitle { font-family: Arial,Helvetica,sans-serif; font-size: 12px; font-variant: normal; letter-spacing: 4px; line-height: 52px; line-height: 56px \9; margin-left: 5px;}
.productDetail .description .items li .sectionTitle.paper { color: #006666;}
.productDetail .description .items li .sectionTitle.trans { color: #660000;}
.productDetail .description .items li .sectionTitle.size { color: #330066;}
.productDetail .description .items li .listHeader { border-bottom: 1px solid #999999; height:38px;}
.productDetail .description .items li .content { margin-top: 8px; margin-left: 20px; color: #666666; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 3px; line-height: 20px; }
.productDetail .price { width: 280px; float: left; margin-left: 15px;  margin-top: 22px;}
.productDetail .price .priceTitle { background:url('../images/money.jpg') no-repeat left center; padding-left:22px; line-height: 30px; color: #333333; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 2px;}
.productDetail .price #priceTable td{ color: #333333; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 2px; height: 27px;}
.productDetail .price #priceTable .tableHeader td{ height: 52px;}
.productDetail .price #priceTable .tableHeader td.face{ background:#CC6666;}
.productDetail .price #priceTable .tableHeader td.count{ background:#6699CC;}
.productDetail .price #priceTable .tableHeader td.total{ background:#CCCC33;}
.productDetail .price #priceTable .note{ padding:5px; line-height: 18px; }
.productDetail .price .addToBasket{ margin-top:15px; color: #333333; font-family: Arial,Helvetica,sans-serif; font-size: 12px; letter-spacing: 2px;}
.productDetail .price .chooseFace, .productDetail .price .chooseCount {font-size:12px;width:78;height:18px;}
.productDetail .price .addButton{ margin-top:10px;}
.productDetail .price .addButton .addImg { float:left; background: url('../images/sales_car_4.jpg') no-repeat; width:24px; height: 24px;}
.productDetail .price .addButton .addImg:hover{ background: url('../images/sales_car_3.jpg') no-repeat;}
.productDetail .price .addButton a{ line-height: 24px; margin-left:5px; text-decoration:none; color: #6699CC; cursor: pointer;}
.productFooter {clear:both; width: 100%; text-align:center; margin-top: 35px; }
.productFooter .footerTop{ background: url('../images/Aarrowhand_b1.jpg') no-repeat center top; height: 23px;}
.productFooter .footerBottom{ background: url('../images/Aarrowhand_b2.jpg') no-repeat center top; height: 23px;}
.productFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:40px; background: url("../images/arri_sub_paper.jpg") no-repeat scroll right 7px transparent}
.productFooter .subCateSelection select { margin-top: 11px;}
{/literal}
</style>
<script>
{literal}
$(".navigationMenu .product").addClass("selected");
{/literal}
</script>
<form action="buy.php" method="post" name="cont">
<div class="cateTitle">
	<span>{$cateName}</span>
	<div class= "viewBasket" title="購物車"><a href="sales_car.php?MODE={$mode}&SUBKIND={$subKind}">查看購物車及報價單</a></div>
</div>
<div class="subTitle">{$productDetail.PRO_SUBKIND_NAME}</div>		
<div class="subCateSelection">
	{html_options id="subCateList" name=select options=$subKindList selected=$subKindSelected}
</div>
<div class="productDetail">
	<div class="description">		
		{if $photoAttachStatus}
			<ul class="photoAttach">
				{foreach from= $photoAttachs item= list key= label}
				<li>
					<span class="photoName">Photo: {$list[0]}</span>
					<img class="photo" src="../subkind_file/{$list[1]}" width="250" />
				</li>
				{/foreach}
			</ul>
		{/if}
		{if $cutModleStatus}
			<ul class="cutModleAttach">
				{foreach from= $cutModleAttachs item= list key= label}
				<li>
					<a href="../subkind_clip/{$list[1]}">{$list[0]}刀模下載</a>					
				</li>
				{/foreach}
			</ul>
			
		{/if}
		<ul class="items">
			<li>
				<div class="listHeader">
					<span class="listIcon"></span>
					<img class="listIconSN" src="../images/sub_number_0.jpg">
					<img class="listIconSN" src="../images/sub_number_1.jpg">
					<span class="sectionTitle paper">紙張說明</span>
				</div>				
				<div class="content">{$productDetail.PAPER_INFO}</div>				
			</li>
			<li>
				<div class="listHeader">
					<span class="listIcon"></span>
					<img class="listIconSN" src="../images/sub_number_0.jpg">
					<img class="listIconSN" src="../images/sub_number_2.jpg">
					<span class="sectionTitle trans">交貨說明</span>
				</div>				
				<div class="content">{$productDetail.FINISH_INFO}</div>				
			</li>
			<li>
				<div class="listHeader">
					<span class="listIcon"></span>
					<img class="listIconSN" src="../images/sub_number_0.jpg">
					<img class="listIconSN" src="../images/sub_number_3.jpg">
					<span class="sectionTitle size">完成尺寸及出血尺寸</span>
				</div>				
				<div class="content">
					<p>完成尺寸：{$productDetail.FINISH_W} mm x {$productDetail.FINISH_H} mm</p>
					<p>出血尺寸：{$productDetail.BODER_W} mm x {$productDetail.BODER_H} mm</p>
				</div>				
			</li>
		</ul>
	</div>
	<div class="price">
		<div class="priceTitle">報價表</div>		
		<table id="priceTable" width="100%" height="54" border="1" cellpadding="0" cellspacing="0">
			<tr class="tableHeader"  valign="middle" align="center">
				<td width="29%" class="face">單/雙 面</td>
				<td width="42%" class="count">數 量({$unitName})</td>
				<td width="29%" class="total">總　價</td>
			</tr>
			{if count($productDataArr) > 0}
				{foreach from=$productDataArr item= row }
					{if $row.FACE == 1}
						<tr class="single" valign="middle" align="center" sn="{$row.SEQ_NBR}" amount="{$row.AMOUNT}">
							<td bgcolor="#F2E4DF">單　面</td>
							<td bgcolor="#DDE9EA">{$row.AMOUNT}</td>
							<td >{$row.PRICE}</td>
						</tr>
					{elseif $row.FACE == 2}
						<tr class="double"  valign="middle" align="center" sn="{$row.SEQ_NBR}" amount="{$row.AMOUNT}">
							<td bgcolor="#F2E4DF">雙　面</td>
							<td bgcolor="#DDE9EA">{$row.AMOUNT}</td>
							<td >{$row.PRICE}</td>
						</tr>
					{/if}
				{/foreach}
				<tr id="note" align="center" valign="middle" bgcolor="#FFFFFF">
					<td height="120" colspan="3" class="info">
						<div align="left" class="note">
							※註1：
							<br>
							以上價格為同一個案件的報價，若有不同人名或不同樣式，則算為第二筆購物。
							<hr size="1" noshade>
							※註2：以上價格皆已含稅，不含運費
							<hr size="1" noshade>
							※註3：如有特殊規格，請來電洽詢
						</div>
					</td>
				</tr>
			{else}
				<tr><td>尚無任何此規格的商品！</td></tr>
			{/if}
		</table>
		<div class="addToBasket">
			<select class="chooseFace" name="arri_sub_face">
				<option value="0" selected>-單/雙面-</option>
			</select>
			<select name="arri_sub_num" class="chooseCount">
				<option value="0" selected>-數量-</option>
			</select>
			{$unitName}
			<div class="addButton">
				<div class="addImg" title="加入購物車"></div><a class="addToBasketLink">加入購物車</a>
			</div>
		</div>
	</div>
</div>
<div class="productFooter">
	<div class="footerTop"></div>
	<div class="subCateSelection">
		{html_options id="subCateList2" name=select options=$subKindList selected=$subKindSelected}
	</div>
	<div class="footerBottom"></div>
</div>
</form>
<script>
{literal}
;(function($){	
	function reLayout(lists){
		lists.each(function(index, item){
			if(index == 0){
				$(item).find("td").eq(0).attr("rowspan", lists.length);
			}else{
				$(item).find("td").eq(0).remove();
			}
		});
	}
	function add_obj(){
		var arri_sub_face=document.cont.arri_sub_face.value;
		var arri_sub_num=document.cont.arri_sub_num.value;
		
		if(arri_sub_face==0){
			alert("請選擇單面或雙面！");
			document.cont.arri_sub_face.focus();
			return;
		}
		if(arri_sub_num==0){
			alert("請選擇數量！");
			document.cont.arri_sub_num.focus();
			return;
		}
		{/literal}
		window.location.href="arri_buy_action.php?MODE={$mode}&SUBKIND={$subKind}&BUY_SEQ="+arri_sub_num;
		{literal}		   
	}
	$(".addToBasketLink").bind("click", add_obj);
	
	$("#subCateList, #subCateList2").bind("change", function(){
		if($(this).val() != "A"){
			{/literal}
			document.location.href= "arri.php?MODE={$mode}&SUBKIND="+ $(this).val();
			{literal}
		}
	});
	var priceTable= $("#priceTable");
	var singleRow= priceTable.find("tr.single");
	var doubleRow= priceTable.find("tr.double");
	var note= $("#note");
	doubleRow.insertAfter(note);
	singleRow.insertAfter(note);
	note.appendTo(priceTable);
	reLayout(singleRow);
	reLayout(doubleRow);
	if(singleRow.length > 0){
		$('<option value="1">單面</option>').appendTo(".chooseFace");
	}
	if(doubleRow.length > 0){
		$('<option value="2">雙面</option>').appendTo(".chooseFace");
	}
	
	var chooseCount= $(".chooseCount");	
	$(".chooseFace").bind("change", function(){	
		chooseCount.children().first().nextAll().remove();	
		switch($(this).val()){			
			case "1":						
				singleRow.each(function(index, item){					
					$('<option value="'+$(item).attr('sn')+'">'+$(item).attr('amount')+'</option>').appendTo(chooseCount);
				});
			break;
			case "2":
				doubleRow.each(function(index, item){					
					$('<option value="'+$(item).attr('sn')+'">'+$(item).attr('amount')+'</option>').appendTo(chooseCount);
				});
			break;
			default:
			break;
		}

	});
})(jQuery);
{/literal}
</script>