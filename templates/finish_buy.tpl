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
function Msg(Msg){
    if(Msg.length!=0){
	alert(Msg);
	return;
	}
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function payment(){
window.open("payment.html",'',"toolbar=no,location=no,directory=yes,status=no,scrollbars=yes,resizable=no,width=485,height=158");
return;
}
function upload_file(){
window.open("upload_files.php",'Upload',"toolbar=no,location=no,directory=yes,status=no,scrollbars=yes,resizable=no,width=485,height=158");
return;
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
.thanks{
	padding: 15px 0;
    border-bottom: 1px solid #999999;
}
.info {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	letter-spacing: 2px;
	color: #000;
	text-align: center;
	line-height: 20px;	
}
.menu {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	letter-spacing: 4px;
	color: #000;
	font-variant: normal;	
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
.detailContent{
	text-align: center;
}
.detail {
	margin-top: 10px;
	font-family: "Times New Roman", Times, serif;
	color:#000;
	line-height: 22px;
}
.detail td{
	padding: 0px 10px 0px 10px;
	vertical-align: top;
	min-height: 28px;
}
.detail td img {
	float: left;
	margin-top: 7px;
	margin-right:10px;
}
.detail td .info {
	margin-left:100px;
	border: none !important;
	line-height:28px;
	letter-spacing: 2px;
	text-align: left;	
}
.detail td .info.title {
	margin-left: 0px;
	width: 80px;
	float: left;
	text-align: left;
	letter-spacing: 5px;
	font-weight: bold;
}
.subDetail {
	clear: both;
	margin-left: 20px;
}
.subDetail .info.title{
	margin-left: 0px !important;
	letter-spacing: 5px;
	width: 80px;
	font-weight: normal !important;
}
.subDetail .info {
	margin-left:80px !important;
}
.orderList .info div{
	margin-left: 0px;
}
.detail td.orderListTable {
	padding: 0 0 0 26px;	
}
.detail td.orderListTable .tip {
	font-size: 10px;
}
.detail td.orderListTable .list {
	color: #000;
	font-size: 12px;
}
.detail td.orderListTable tr td{
	vertical-align: middle;
}
.detail td.orderListTable tr.total{
	font-weight: bold;
}
.btnGroup {
	margin: 0 auto;
	display: inline-block;
	margin-top:15px;
}
.btnGroup li{
	float: left;
	margin-right: 10px;
	height: 24px;
}
.btnGroup li img {
	vertical-align: middle;
	margin-right:5px;
}
{/literal}
</style>
<div class="title">
	<img width="153" height="27" src="../images/arrie_tile_finish.jpg">
</div>
<div class="thanks info">
	<p>感謝您的支持！<br>
	<br>因網路訂單為及時性處理，如需變更訂單內容，請速以電話確認變更項目。
	<br>請儘速將您需付的款項繳清， Hicolor會儘速送達您所訂購之印刷品，
	<br>並隨時歡迎您賜電指教予以改進。
	<span class="style41 style41">
		<a href="javascript:top.frames['topFrame'].location.href = 'menu_service.htm';top.frames['mainFrame'].location.href = 'service.php';" STYLE="text-decoration: none">
			<font color = '#FF6600' onmouseout="this.style.color = '#FF6600'" onMouseOver="this.style.color = '#CC0000'"><u>查詢付款方式</u></font>
		</a>
	</span>
	<br>Hicolor客服中心 啟。
	<br>客戶服務專線：
	<FONT class="info" face="Arial, Helvetica, sans-serif" color="#666666">02-2254-7467</FONT>
	<FONT class="info" face="Arial, Helvetica, sans-serif" color="#666666">傳真號碼：02-2250-2939</FONT>
	<br>
    </p>
</div>
<div class="detailContent">
	<table class="detail" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="60%">
				<img src="../images/arrowhead_small_bred.jpg" width="9" height="9">
				<div class="info title">訂單編號</div>
				<div class="info">{$saleSN}</div>
			</td>
			<td width="40%">
				<img src="../images/arrowhead_small_bred.jpg" width="9" height="9">
				<div class="info title">訂單日期</div>
				<div class="info">{$orderDate}</div>
			</td>
		</tr>
		<tr>
			<td width="60%">
				<img src="../images/arrowhead_small_bred.jpg" width="9" height="9">
				<div class="info title">客戶資料</div>
				<ul class="subDetail">
					<li>
						<div class="info title style26">收 件 人</div>
						<div class="info">{$transName}</div>
					</li>
					<li>
						<div class="info title style26">聯絡電話</div>
						<div class="info">{$trans_phone}</div>
					</li>
					<li>
						<div class="info title style26">行動電話</div>
						<div class="info">{$trans_MOBILE}</div>
					</li>
					<li>
						<div class="info title style26">送貨地址</div>
						<div class="info">{$trans_adress}</div>
					</li>
					<li>
						<div class="info title style26">收件時間</div>
						<div class="info">{$trans_time}</div>
					</li>
				</ul>
			</td>
			<td width="40%">
				<img src="../images/arrowhead_small_bred.jpg" width="9" height="9">
				<div class="info title">公司資料</div>
				<ul class="subDetail">
					<li>
						<div class="info title style26">公司名稱</div>
						<div class="info">{$LOG_RECEIPT_COMPANY_NM}</div>
					</li>
					<li>
						<div class="info title style26">發票抬頭</div>
						<div class="info">{$receipt_title}</div>
					</li>	
					<li>
						<div class="info title style26">統一編號</div>
						<div class="info">{$invoiceSN}</div>
					</li>
					<li>
						<div class="info title style26">發票種類</div>
						<div class="info">{$receipt_ty}</div>
					</li>
					<li>
						<div class="info title style26">會員級別</div>
						<div class="info">{$LOG_PAY}</div>
					</li>
				</ul>
			</td>
		</tr>
	</table>
	<table class="detail orderList" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="50%">
				<img src="../images/arrowhead_small_bred.jpg" width="9" height="9">
				<div class="info title">訂購清單</div>				
			</td>
			<td width="50%">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" class="orderListTable">
				<table width="100%" border="1" align="center" cellpadding="0" cellspacing="2">
					<tr valign="middle" class="menu">
						<td width="9%" bgcolor="#CCCCCC" class="info">
							<div align="center">編號</div>
						</td>
						<td width="13%" bgcolor="#CCCCCC" class="info">
							<div align="center">類　別</div>
						</td>
						<td width="19%" bgcolor="#CCCCCC" class="info">
							<div align="center">紙張規格</div>
						</td>
						<td width="11%" bgcolor="#CCCCCC" class="info">
							<div align="center">單/雙面</div>
						</td>
						<td width="20%" bgcolor="#CCCCCC" class="info">
							<div align="center">尺寸<span class="tip">(mm X mm)</span></div>							
						</td>
						<td width="14%" bgcolor="#CCCCCC" class="info">
							<div align="center">數　量</div>
						</td>
						<td width="14%" bgcolor="#CCCCCC" class="info">
							<div align="center">小計</div>
						</td>
					</tr>
					{foreach from = $BUY_LIST item = item name = BUY_LIST}
					<tr valign="middle" class="list">
							<td bgcolor="#E8E8E8"><div align="center">{$smarty.foreach.BUY_LIST.iteration}</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.NAME}</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.PRO_SUBKIND_NAME}</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.face} 面</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.size}</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.count}</div></td>
							<td bgcolor="#E8E8E8"><div align="center">{$item.price}</div></td>
						</tr>
					{/foreach}
					<tr valign="middle" class="list">
						<td bgcolor="#E8E8E8">
							<div align="center">{$smarty.foreach.BUY_LIST.total+1}</div>
						</td>
						<td bgcolor="#E8E8E8">							
							<div align="center">運費</div>							
						</td>
						<td colspan="5" bgcolor="#E8E8E8">
							<div align="center">{$transPrice}</div>
						</td>
					</tr>
					<tr valign="middle" class="menu total">
						<td colspan="2" bgcolor="#CCCCCC">
							<div align="center">總　金　額</div>
						</td>						
						<td colspan="5" bgcolor="#CCCCCC"><div align="center">{$total} (已含稅金)</div></td>
					</tr>
				</table>				
			</td>
		</tr>
	</table>
	<ul class="btnGroup">
		<li>
			<a href="javascript:window.print();" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('print','','../images/arrie_tile_print_in.jpg',1)"><img src="../images/arrie_tile_print_out.JPG" alt="列印訂單" name="print" width="24" height="24" border="0">列印</a>
		</li>
		<li>
			<a href="about.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','../images/arrie_tile_home_in.jpg',1)"><img src="../images/arrie_tile_home_out.JPG" alt="首頁" name="home" width="24" height="24" border="0">回首頁</a>
		</li>
	</ul>
</div>