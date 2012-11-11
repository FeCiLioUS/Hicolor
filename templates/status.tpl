<script>
{literal}
function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
function upload_file(seq,nbr){
   // window.open("status_upload_files_num.php?STATUS=HISTORY&seq="+seq+"if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; }  if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } &mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=418,height=165");
}
function upload_fix(seq,nbr){
   // window.open("status_upload_fix.php?STATUS=HISTORY&seq="+seq+"if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; }  if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } &mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=620,height=335");
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function data_check(){
  var search_typ=document.sales_list.search_typ.value;
  var search_aq=document.sales_list.detail.value;
  var Caption=document.sales_list.Caption.value;  
  if(search_typ==0){
      alert("需選擇查詢方式！");
	  document.sales_list.search_typ.focus();
	  document.sales_list.MODE.value="SEARCH";
	  return false;
  }else if(search_typ==1 && search_aq==0){
      alert("需選擇訂單編號！");
	  document.sales_list.detail.focus();
	  document.sales_list.MODE.value="SEARCH";
	  return false;
  }else if(search_typ==2){
      if(Caption.split("/",3).length!=3){
	      alert("請輸入正確的日期格式！");
		  document.sales_list.Caption.focus();
	      return false;
	  }
      var YMD=Caption.split("/",3);
       if(YMD[1].substr(0,1)==0){
          YMD[1]=YMD[1].substr(1,1);
	   }
	  // document.write(YMD[1]);
      if(YMD[0]<1911 || isNaN(YMD[0])){
	      alert("請輸入正確的年份！");
		  document.sales_list.Caption.focus();
	      return false;
	  }else if(YMD[1]<1 || YMD[1]>12 || isNaN(YMD[1])){
	      alert("請輸入正確的月份！");
		  document.sales_list.Caption.focus();
	      return false;
	  }else if(YMD[1]==1 || YMD[1]==3  || YMD[1]==5  || YMD[1]==7  || YMD[1]==8  || YMD[1]==10  || YMD[1]==12){
	      if(YMD[2]<1 || YMD[2]>31 || isNaN(YMD[2])){
		      alert("請輸入正確的日期！");
			  document.sales_list.Caption.focus();
	          return false;
		  }else{
	          document.sales_list.MODE.value="DATE_SEARCH";
		      document.sales_list.submit();
		  }
	  }else if(YMD[1]==2){ 
	      if(YMD[2]<1 || YMD[2]>29 || isNaN(YMD[2])){
		      alert("請輸入正確的日期！");
			  document.sales_list.Caption.focus();
	          return false;
		  }else{
	          document.sales_list.MODE.value="DATE_SEARCH";
		      document.sales_list.submit();
		  }
	  }else if(YMD[1]==4 || YMD[1]==6 || YMD[1]==9 || YMD[1]==11){
	      if(YMD[2]<1 || YMD[2]>30 || isNaN(YMD[2])){
		      alert("請輸入正確的日期！");
			  document.sales_list.Caption.focus();
	          return false;
		  }else{
		  	  document.sales_list.MODE.value="DATE_SEARCH";
		      document.sales_list.submit();
		  }
	  }
  }else if(search_typ==3){
      if(!Caption){
	       alert("請輸入檔案名稱！");
		   document.sales_list.Caption.focus();
	       return false;
	  }else if(Caption.match(/[\!\@\#\$\%\^\&\*\(\)\)\=\~\`\\\?\/\,\.\>\<\"\'\:\;]/g)){
	       alert("請勿輸入任何符號！");
		   document.sales_list.Caption.focus();
	       return false;
	  }else{
	  	   document.sales_list.MODE.value="FILES_SEARCH";
	       document.sales_list.submit();
	  } 
  }else if(search_typ==4){
      var money=Caption.split("~",2)
      if(money[0]<0 || isNaN(money[0])){
	       alert("請輸入金額範圍！例：100~500");
		   document.sales_list.Caption.focus();
	       return false;
	  }else if(money[1]<0 || isNaN(money[1])){
	       alert("請輸入金額範圍！例：100~500");
		   document.sales_list.Caption.focus();
	       return false;
	  }else{
	  	   document.sales_list.MODE.value="PRICE_SEARCH";
	       document.sales_list.submit();
	  }
  }else if(search_typ==5){
      if(Caption.split("/",2).length!=2){
	      alert("請輸入正確的月份格式！");
		  document.sales_list.Caption.focus();
	      return false;
	  }
      var YMD=Caption.split("/",2);
       if(YMD[1].substr(0,1)==0){
          YMD[1]=YMD[1].substr(1,1);
	   }
	  // document.write(YMD[1]);
      if(YMD[0]<1911 || isNaN(YMD[0])){
	      alert("請輸入正確的年份！");
		  document.sales_list.Caption.focus();
	      return false;
	  }else if(YMD[1]<1 || YMD[1]>12 || isNaN(YMD[1])){
	      alert("請輸入正確的月份！");
		  document.sales_list.Caption.focus();
	      return false;
	  }else{
		  	  document.sales_list.MODE.value="MONTH_SEARCH";
		      document.sales_list.submit();
	  }
  }else{
    // document.write("bgfbsfb");
	  document.sales_list.MODE.value="SEARCH";
      document.sales_list.submit();
  }
}
function SELE_RESULT(seq){
   location.href="status.php?MODE=echo $S_MO;&Caption=echo $S_CAP;&SN="+seq+"&DISPLAY=1";
}
function aq_select(qa){
//document.write(qa);
   var typ1=document.sales_list.search_typ.options[1].selected;
  // var typ2=document.sales_list.search_typ.options[2].selected;
  // var typ3=document.sales_list.search_typ.options[4].selected;
   if(typ1==true){
      location.href="status.php?MODE=SN&Keyword="+qa;
   }
}
function KEYWD(){  
   var typ2=document.sales_list.search_typ.options[2].selected;
   var typ4=document.sales_list.search_typ.options[4].selected;
   if(typ2==true){
    //  document.sales_list.Caption.value="";
   }else if(typ4==true){
    // document.sales_list.Caption.value="";
   }
}
function ok(){
document.confi.submit();
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
/*

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
.menu1 {	
	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;
	line-height: 20px;
}*/
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
{/literal}
</style>
<div class="title">
	<img src="../images/pers_tile_history.jpg" width="153" height="27">
</div>
<form action="status.php" method="post" name="sales_list" onSubmit="return data_check();">	
	<ul class="content">
		<li style="vertical-align:middle;">
			<div class="contentHeader">
				<img src="../images/arrowhead_bred.jpg" width="14" height="13">
				<span class="saleCarTitle">查詢其它訂單</span>
				<span class="saleCarInfo">會員編號：{$memberSN}</span>
			</div>
			<div class="contentDetails">
				{html_options name=search_typ options=$queryModes onChange="search_type();" class="search_typ" style="vertical-align:middle; font-size:12px;height:24px;"}
				<select name="detail" class="detail" style="vertical-align:middle; font-size:12px;height:24px;" onChange="aq_select(this.options[this.selectedIndex].value);">
					<option value="0">-------選擇參數-------</option>
				</select>		
				<input name="送出" type="submit" id="送出" value="送出" style="vertical-align:middle; font-size:10pt; padding:0; height:26px;" />
				<input type="hidden" name="MODE">
			</div>
		</li>
		{if $DISPLAY_RESULT == 1}
		<li style="vertical-align:middle;">
			<div class="contentDetails">
				<span class="saleCarTitle">查詢結果</span>	
				<span class="info">你一共查詢到 <span class="count">{$searchTotal}</span> 筆資料 </span>
				<select name="search_result" style="vertical-align: middle; font-size:12px;width:100px;height:24px;" onChange="SELE_RESULT(this.options[this.selectedIndex].value);">
				<option value="0">--選擇編號--</option>".$seach_sn_list."</select>						
			</div>			
		</li>
		{/if}
		<li style="vertical-align:middle;">
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
					{if $DISPLAY_BUY_LIST == 1}
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
					{/if}				
				</table>				 
			</div>
		</li>
		{if $DISPLAY_BUY_LIST == 1 && $resultTotal > 0}			
		<li style="vertical-align:middle;">
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
var date = '{$date}',
	month = '{$month}',
	queryMode = {$queryMode},
{literal}
	search_typ = $(".search_typ"),
	detail = $(".detail"),
	Caption = $(' <input name="Caption" class="caption" type="text" style="vertical-align:middle; padding:0; margin-left: 3px; width:150px; font-size:12px; height:22px; line-height:22px;" onFocus="KEYWD();" size="8"/>').val("").attr("disabled", true),
	CaptionAlias;
function search_type() {
	var index = search_typ.val();
	if(CaptionAlias) CaptionAlias.remove();
	detail.children().remove();	
	if(index == 0) { // default category item 		
		CaptionAlias = Caption.clone().attr("disabled", true).insertAfter(detail);
		detail
			.append($('<option value="0">-------選擇參數-------</option>'))
			.attr("disabled", true);		
	}
	if(index == 1) {
		//CaptionAlias = Caption.clone().attr("disabled", true).insertAfter(detail);
{/literal}
		detail.append($('<option value="0">--選擇訂單編號--</option>')){foreach from=$SN_LIST_P item=item key=key}.append($('<option value="{$key}">{$item}</option>')){/foreach}.attr("disabled", false);
{literal}
	}
	if(index == 2) {
		CaptionAlias = Caption.clone()
			.val(date)
			.attr("disabled", false)
			.datepicker({
				'dateFormat': 'yy/mm/dd'
			})
			.insertAfter(detail);		
		detail.append($('<option value="0">--於右側輸入下單日期--</option>')).attr("disabled", true);
	}
	if(index == 3) {
		CaptionAlias = Caption.clone().val('').attr("disabled", false).insertAfter(detail);
		detail.append($('<option value="0">--於右側輸入檔案名稱--</option>')).attr("disabled", true);
	}
	if(index == 4) {
		CaptionAlias = Caption.clone().val("0000~1111").attr("disabled", false).insertAfter(detail);
		detail.append($('<option value="0">--於右側輸入交易金額--</option>')).attr("disabled", true);
	}	
	if(index == 5) {
		CaptionAlias = Caption.clone().val(month).attr("disabled", false).insertAfter(detail);
		detail.append($('<option value="0">--於右側輸入下單月份--</option>')).attr("disabled", true);		
	}
	detail.val(0);	
}
search_typ.val(queryMode).trigger("change");
{/literal}
</script>