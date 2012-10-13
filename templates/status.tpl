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
    window.open("status_upload_files_num.php?STATUS=HISTORY&seq="+seq+"<? if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; } ?><? if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } ?>&mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=418,height=165");
}
function upload_fix(seq,nbr){
    window.open("status_upload_fix.php?STATUS=HISTORY&seq="+seq+"<? if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; } ?><? if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } ?>&mbr="+nbr,"Upload"+nbr,"toolbar=no,location=no,directory=yes,status=yes,scrollbars=yes,resizable=no,width=620,height=335");
}
function search_type(j) {
//document.write(j);
  if(j==0) { // default category item 
      document.sales_list.detail.disabled=true;
	  document.sales_list.Caption.disabled=true;
	  document.sales_list.Caption.value="";
	  a=new Array();
	  a[1]=new Option("--選擇參數--","0");
	  }
  if(j==1) {
      document.sales_list.detail.disabled=false;
	  document.sales_list.Caption.value="";
	  document.sales_list.Caption.disabled=true;
  	  a=new Array();
	  a[1]=new Option("--選擇訂單編號--","0");
	  <? 
	  echo $SN_LIST;
	  ?>
	  }
  if(j==2) {
      document.sales_list.detail.disabled=true;	  
	  document.sales_list.Caption.disabled=false;
	  document.sales_list.Caption.value="<? echo date("Y/m/d"); ?>";
      a=new Array();
	  a[1]=new Option("--於右側輸入下單日期--","0");  
	  }
   if(j==3) {
      document.sales_list.Caption.disabled=false;	  
	  document.sales_list.Caption.value="";
	  document.sales_list.detail.disabled=true;
	 // document.search_product_form.search_aq.disabled=false;
      a=new Array();
	  a[1]=new Option("於右側輸入檔案名稱","0");
	  }
   if(j==4) {
      document.sales_list.detail.disabled=true;	  
	  document.sales_list.Caption.disabled=false	;	
	  document.sales_list.Caption.value="0000~1111";  
      a=new Array();
	  a[1]=new Option("於右側輸入交易金額","0");	   
	  }	
   if(j==5) {
      document.sales_list.detail.disabled=true;	  
	  document.sales_list.Caption.disabled=false;
	  document.sales_list.Caption.value="<? echo date("Y/m"); ?>";
      a=new Array();
	  a[1]=new Option("--於右側輸入下單月份--","0");  
	  }

	  var aln2=a.length;
	  //getFormNum1(formName); 
	  for (var i=document.sales_list.detail.length-1;i>0;i--) document.sales_list.detail.options[i]=null;
	  for (var i=1;i<aln2;i++) document.sales_list.detail.options[i-1]=	a[i]; 
	  document.sales_list.detail.options[0].selected=true;
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
   location.href="status.php?MODE=<? echo $S_MO; ?>&Caption=<? echo $S_CAP; ?>&SN="+seq+"&DISPLAY=1";
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
.contentHeader{
	margin-top:25px;
}
.contentHeader .saleCarTitle{
	font-size: 18px;
	color: #660000;
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
/*
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
}
.menu {
	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;	
}
.style6 {font-size: 11px; letter-spacing: 4px; font-variant: normal; font-family: "Times New Roman", Times, serif;}
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
.style8 {font-family: "Times New Roman", Times, serif; font-size: 15px; letter-spacing: 2px; color: #0099CC; }
.link_num {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	letter-spacing: 3px;
}
.style13 {color: #99CC00}
.PS {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	position: static;
	width: 260px;
	clip: rect(auto,auto,auto,auto);
}
.style26 {color: #666666}
.sub_name {
	font-family: "華康中黑體(P)";
	font-size: 18px;
}
.style32 {color: #FFFFFF}
.style34 {font-family: "Times New Roman", Times, serif; font-size: 12px; letter-spacing: 3px; color: #CC0000; line-height: 17px; }
.style44 {font-family: "Times New Roman", Times, serif; font-size: 15px; letter-spacing: 2px; color: #660000; }
.style46 {font-family: "Times New Roman", Times, serif; font-size: 15px; letter-spacing: 2px; color: #FFFFFF; }
.style48 {color: #990000}
.menu1 {	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;
	line-height: 20px;
}*/
{/literal}
</style>
<div class="title">
	<img src="../images/pers_tile_history.jpg" width="153" height="27">
</div>
<form action="status.php" method="post" name="sales_list" onSubmit="return data_check();">
	<div class="contentHeader">
			<img src="../images/arrowhead_bred.jpg" width="14" height="13">
			<span class="saleCarTitle">查詢其它訂單</span>
			<!--span class="saleCarInfo">會員編號：{$memberSN}</span>

			<span class="saleNumber">訂單編號：{$saleSN}</span-->

	</div>
</form>	
<table width="730" border="0" align="center" cellpadding="0" cellspacing="0" id="info_tab" name="info_tab">  
	     
	  <tr>
		<td>
		<table width="730" height="86" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr bgcolor="#FFFFFF">
			    <td height="20" colspan="4" valign="bottom"><div align="right"></div>
				  <div align="left"></div>
				  <div align="right"></div>
				</td>
			</tr>
			<tr bgcolor="#853255">
			  <td height="15" colspan="4" valign="bottom"><div align="right"></div>
				  <div align="left"></div>
			  <div align="right"> </div></td>
		    </tr>
			<tr>
			  
			  <td width="397" valign="bottom"><div align="left"><span class="info">會員編號：<? echo $LOG_PRVL.sprintf("%05d",$buyer); ?></span></div></td>
			  <td width="32" valign="bottom">&nbsp;</td>
			  <td width="67" valign="bottom"><div align="left"></div>
				  <div align="right"> </div></td>
			</tr>
			<tr>
			  <td height="1" colspan="4" valign="top">&nbsp;</td>
			</tr>
			<tr>
			  <td height="1" colspan="4" valign="top"><hr width="100%" size="1" noshade></td>
			</tr>
		  </table>
			<table width="730" height="128" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td width="22" height="12"><div align="center"><img src=".jpg" width="13" height="13"></div></td>
				<td width="327" height="12"><span class="style8 style13"><span class="style44">查詢其它訂單</span></span></td>
				<td width="381" colspan="2"><div align="right"></div></td>
			  </tr>
			  <tr>
				<td width="22" height="38"><div align="center"></div></td>
				<td height="38" colspan="3"><select name="search_typ" style="font-size:9pt;width:110;height:20px;" onChange="search_type(this.options[this.selectedIndex].value);">
				  <option value="0" selected>--選擇查詢方式--</option>
				  <option value="1" {literal}<? if($_GET[MODE]=="SN"){ echo "selected"; } ?>{/literal}>歷史訂單</option>
				  <option value="2" {literal}<? if($_GET[MODE]=="DATE_SEARCH" || $_POST[MODE]=="DATE_SEARCH"){ echo "selected"; } ?>{/literal}>訂單日期</option>
				  <option value="5" {literal}<? if($_GET[MODE]=="MONTH_SEARCH" || $_POST[MODE]=="MONTH_SEARCH"){ echo "selected"; } ?>{/literal}>訂單月份</option>
				  <option value="3" {literal} <? if($_GET[MODE]=="FILES_SEARCH" || $_POST[MODE]=="FILES_SEARCH"){ echo "selected"; } ?>{/literal}>案件名稱</option>
				  <option value="4" {literal}<? if($_GET[MODE]=="PRICE_SEARCH" || $_POST[MODE]=="PRICE_SEARCH"){ echo "selected"; } ?>{/literal}>交易金額</option>
									</select>
				  <select name="detail" style="font-size:9pt;width:150;height:20px;" {literal}<? if($_GET[MODE]=="SN"){}else{ echo "disabled"; }?>{/literal} onChange="aq_select(this.options[this.selectedIndex].value);">
					<option value="0" selected>{literal}<? if($_GET[MODE]=="SN"){ echo "--選擇訂單編號--"; }else if($_GET[MODE]=="DATE_SEARCH" || $_POST[MODE]=="DATE_SEARCH"){ echo "--於右側輸入下單日期--"; }else if($_GET[MODE]=="FILES_SEARCH" || $_POST[MODE]=="FILES_SEARCH"){ echo "於右側輸入檔案名稱"; }else if($_GET[MODE]=="PRICE_SEARCH" || $_POST[MODE]=="PRICE_SEARCH"){ echo "於右側輸入交易金額"; }else if($_GET[MODE]=="MONTH_SEARCH" || $_POST[MODE]=="MONTH_SEARCH"){ echo "--於右側輸入下單月份--"; }else{ echo "---------選擇參數---------"; }?>{/literal}</option>
					{literal}<? if($_GET[MODE]=="SN"){ echo $SN_LIST_P; } ?>{/literal}
				  </select>                      
				  <input name="Caption" type="text"  style="font-size:9pt;width:120;height:18px;" onFocus="KEYWD()" size="8" {literal}<? if($_GET[MODE]=="DATE_SEARCH" || $_POST[MODE]=="DATE_SEARCH" || $_GET[MODE]=="FILES_SEARCH" || $_POST[MODE]=="FILES_SEARCH" || $_GET[MODE]=="PRICE_SEARCH" || $_POST[MODE]=="PRICE_SEARCH" || $_GET[MODE]=="MONTH_SEARCH" || $_POST[MODE]=="MONTH_SEARCH"){}else{ echo "disabled"; } ?>{/literal}>                      
				  <input name="送出" type="submit" id="送出" value="送出" style="font-size:9pt;width:40;height:22px;">
				  <input type="hidden" name="MODE"></td>
			  </tr>
			  <tr>
				{literal}
				<? 
				if($DISPLAY_RESULT==1){
					 echo $seach_display_con;
				}
				?>
				{/literal}
			  <tr>
				<td height="10" colspan="4"><div align="center"><span class="style46"></span></div></td>
			  </tr>
			   <tr valign="top">
				<td height="10" colspan="4"><div align="left">                      
				  <table width="100%" height="175" border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <td width="21" height="35"><div align="center" class="style26">
						<div align="center"><img src="arrowhead_small_bred.jpg" width="9" height="9"></div>
					  </div></td>
					  <td width="226" height="35" class="topic">訂單資訊：<span class="info"><? echo $List_mode; ?></span></td>
					  <td width="483" height="35" class="info">&nbsp;</td>
					</tr>
					<tr>
					  <td height="35">&nbsp;</td>
					  <td height="35" colspan="2" class="info"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
						<tr>
						  <td width="20%" class="info">訂單編號：
						  {literal}<?
						   if($CHECK_BUYED_R[0]==0){
							}else{
							   if($DISPLAY==0){
							   }else if($DISPLAY==1){
								   echo $CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$CHECK_BUYED_R[1][0]);
							   }
						   }
						  ?>{/literal}
						   </td>
						  <td width="26%" class="info">訂單日期：
						  {literal}<? 
							if($CHECK_BUYED_R[0]==0){
							}else{
								if($DISPLAY==0){
							   }else if($DISPLAY==1){
									echo date("Y/m/d",$CHECK_BUYED_R[1][UPD_DT]); 
							   }
							}
						  ?>{/literal}
						  </td>
						  <td width="54%" height="35" class="info">交易狀況：<span class="style48">
						 {literal} <?
						  if($DISPLAY==0){
						  }else if($DISPLAY==1){
							  echo $STAUS;
						   }
						  ?>{/literal}
						  </span></td>
						</tr>
					  </table></td>
					</tr>
					<tr>
					  <td height="35">&nbsp;</td>
					  <td height="35" colspan="2"><table width="100%" height="57" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
						<tr>
						  <td height="55"><table width="100%" border="0" cellpadding="0" cellspacing="3">
							<tr valign="middle" bgcolor="#A56961" class="PS">
							  <td width="33" height="35"><div align="center" class="style32">編號</div></td>
							  <td width="110" height="35"><div align="center" class="style32">類　別</div></td>
							  <td width="148" height="35"><div align="center"><span class="style32">紙張規格</span></div></td>
							  <td width="48"><div align="center"><span class="style32">單/雙面 </span></div></td>
							  <td width="96" height="35"><div align="center" class="style32">尺寸( mm X mm )</div></td>
							  <td width="90" height="35"><div align="center" class="style32">數　量</div></td>
							  <td width="56" height="35"><div align="center" class="style32">檔案上傳</div></td>
							  <td width="97" height="35"><div align="center" class="style32"></div>
								  <div align="center" class="style32">價　格</div></td>
							</tr>                               
							  {literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $BUY_LIST; }?>
							  <? 
								 if($CHECK_BUYED_R[0]==0){
								 }else{
									 if($trans_dis==1){}else{
										 if($DISPLAY_BUY_LIST==0){
										 }else{
											echo "<tr valign=\"middle\" bgcolor=\"#D9D9D9\" class=\"contents\"><td height=\"30\" bgcolor=\"#D5D3B3\"><div align=\"center\">".($r+1)."</div></td><td height=\"30\" bgcolor=\"#D5D3B3\"><div align=\"center\" class=\"style40\">運費</div></td><td height=\"30\" colspan=\"6\" bgcolor=\"#D5D3B3\"><div align=\"center\"></div><div align=\"center\">".$CHECK_BUYED_R[1][TRANS_PRICE]."</div><div align=\"center\"></div></td></tr>";
										 }
									 }
								 } 
							  ?>{/literal}
							</table>
							  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td valign="top"><hr size="1" noshade>
								  <table width="100%" height="52"  border="0" cellpadding="0" cellspacing="3">
									  <tr bgcolor="#FFFFFF">
										<td height="13" colspan="2" class="style34"><div align="center" class="style32">
										</div></td>
									  </tr>
									  <tr bgcolor="#E1E1C4">
										<td width="143" height="30" bgcolor="#B17B74" class="style34"><div align="center" class="style32">總　金　額</div></td>
										<td width="538" height="30" bgcolor="#DCCBC5"><div align="center" class="info">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo ($CHECK_BUYED_R[1][FINISH_PAY]+$CHECK_BUYED_R[1][TRANS_PRICE]); } ?>{/literal}(已含稅)</div></td>
									  </tr>
								  </table></td>
								</tr>
							</table></td>
						</tr>
					  </table></td>
					</tr>
					<tr>
					  <td colspan="3" class="info">&nbsp;</td>
					</tr>
					<tr>
					  <td height="35"><div align="center" class="style26">
						<div align="center"><img src="arrowhead_small_bred.jpg" width="9" height="9"></div>
					  </div></td>
					  <td height="35"><span class="topic">訂單處理狀況：</span></td>
					  <td height="35">&nbsp;</td>
					</tr>
					<tr>
					  <td height="35">&nbsp;</td>
					  <td height="35" colspan="2"><table width="100%" height="57" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
						<tr>
						  <td height="55"><table width="100%" border="0" cellpadding="0" cellspacing="3">                               
							<tr valign="middle" bgcolor="#648C8C" class="PS">
							  <td width="12%" height="35"><div align="center" class="style32">步　聚</div></td>
							  <td width="31%" height="35"><div align="center" class="style32">進　度</div></td>
							  <td width="13%" height="35"><div align="center"><span class="style32">狀　態</span></div></td>
							  <td width="44%" height="35"><div align="center" class="style32">備　註</div></td>
							</tr>
							<tr valign="middle" bgcolor="#E9E9E9" class="contents">
							  <td height="30"><div align="center">1</div></td>
							  <td height="30"><div align="center"><span class="menu style26"><? echo $pay_ta; ?></span></div></td>
							  <td height="30"><div align="center">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $PAY_PHOTO; } ?>{/literal}</div></td>
							  <td height="30"><div align="left"></div>                                    
							  {literal}<?
							   if($DISPLAY_BUY_LIST==1){
								  if($CHECK_BUYED_R[1][PAY_PS]!=0 && $CHECK_BUYED_R[1][PAY_PS]!=""){
									 echo "　".$CHECK_BUYED_R[1][PAY_PS]; }
								  if($CHECK_BUYED_R[1][PAY_DATE]!="" && $CHECK_BUYED_R[1][PAY_DATE]!=0){
									 echo "　".date("Y/m/d",$CHECK_BUYED_R[1][PAY_DATE])."確認"; 
								  }
							   } 
							  ?>{/literal}
							 </td>
							</tr>
							<tr valign="middle" bgcolor="#E2E2E2" class="contents">
							  <td height="30"><div align="center">2</div></td>
							  <td height="30"><div align="center">檔案確認</div></td>
							  <td height="30"><div align="center">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $FILES_PHOTO; } ?>{/literal}</div></td>
							  <td height="30"><div align="left"></div>                                   {literal} <? if($DISPLAY_BUY_LIST==1){ if($CHECK_BUYED_R[1][FILES_PS]!="0" && $CHECK_BUYED_R[1][FILES_PS]!=""){ echo "　".$CHECK_BUYED_R[1][FILES_PS]; } } ?>{/literal}</td>
							</tr>
							<tr valign="middle" bgcolor="#DBDBDB" class="contents">
							  <td height="30"><div align="center">3</div></td>
							  <td height="30"><div align="center">印刷製作</div></td>
							  <td height="30"><div align="center">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $PRINT_PHOTO; } ?>{/literal}</div></td>
							  <td height="30"><div align="left">{literal}<? if($DISPLAY_BUY_LIST==1){ if($CHECK_BUYED_R[1][PRINT_PS]!="0" && $CHECK_BUYED_R[1][PRINT_PS]!=""){ echo "　".$CHECK_BUYED_R[1][PRINT_PS]; } } ?>{/literal}</div></td>
							</tr>
							<tr valign="middle" bgcolor="#D4D4D4" class="contents">
							  <td height="30"><div align="center">4</div></td>
							  <td height="30"><div align="center">出貸送運</div></td>
							  <td height="30"><div align="center">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $TRANS_PHOTO; } ?>{/literal}</div></td>
							  <td height="30">{literal}<? if($DISPLAY_BUY_LIST==1){ if($CHECK_BUYED_R[1][TRANS_PS]!="0" && $CHECK_BUYED_R[1][TRANS_PS]!=""){ echo "　".$CHECK_BUYED_R[1][TRANS_PS]; } } ?>{/literal}</td>
							</tr>
							<tr valign="middle" bgcolor="#CFCFCF" class="contents">
							  <td height="30"><div align="center">5</div></td>
							  <td height="30"><div align="center">驗收結案</div></td>
							  <td height="30"><div align="center">{literal}<? if($DISPLAY_BUY_LIST==0){}else{ echo $CLOSE_PHOTO; } ?>{/literal}</div></td>
							  <td height="30">{literal}<? if($DISPLAY_BUY_LIST==1){ if($CHECK_BUYED_R[1][CLOSE_PS]!="0" && $CHECK_BUYED_R[1][CLOSE_PS]!=""){ echo "　".$CHECK_BUYED_R[1][CLOSE_PS]; } if($CHECK_BUYED_R[1][CLOSE_DATE]!="" && $CHECK_BUYED_R[1][CLOSE_DATE]!=0){ echo "　".date("Y/m/d",$CHECK_BUYED_R[1][CLOSE_DATE])."結案"; }} ?>{/literal}</td>
							</tr>
						  </table></td>
						</tr>
					  </table></td>
					</tr>
				  </table>
				  <span class="style46"></span></div></td>
			  </tr>                 
			  <tr>
				<td height="13" colspan="4">&nbsp;</td>
			  </tr>
		  </table>
		</td>
	  </tr>        
	</form> 
</table>