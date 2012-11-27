<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>上傳檔案</title>
<script language="javascript" type="text/JavaScript">
<!--
function upload(){
   var num=document.buy_upload.Amount.value;
   if(num<1 || isNaN(num)){
      alert("最少要設定一件上傳檔案！");
	  document.buy_upload.Amount.value=1;
	  return;
   }
   document.buy_upload.submit();
}
function ErrMsg(Msg){
   if(Msg.length != 0){
       if(Msg=="您尚未登入，請先登入會員！"){
           alert(Msg);
		   window.close();
		   return;	
	   }else{
           alert(Msg);
		   return;
	   }
   }
}

//-->
</script>
<style type="text/css">
<!--
@import url("hicolor.css");
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
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
.style31 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #FFFFFF; font-variant: normal; }
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; letter-spacing: 2px; color: #FFFFFF; }
.style33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; letter-spacing: 2px; color: #FFFFFF; }
-->
</style></head>

<body onLoad="ErrMsg('<? echo $Msg; ?>');">
<table width="400"  border="0" cellspacing="0" cellpadding="0">
<form action="upload_files.php?SEQ_NUM=<? echo $SEQ_NUM; ?>&STATUS=<? echo $_GET[STATUS]; ?>&SEQ=<? echo $_GET[seq]; ?><? if($_GET[MODE]){ echo "&MODE=".$_GET[MODE]."&Keyword=".$Keyword."&Caption=".$_GET[Caption]; }else if($_POST[MODE]){ echo "&MODE=".$_POST[MODE]."&Keyword=".$Keyword."&Caption=".$_POST[Caption]; } ?><? if($_GET[SN]){ echo "&SN=".$_GET[SN]."&DISPLAY=".$_GET[DISPLAY]; } ?>" method="post" name="buy_upload">
  <tr>
    <td><img src="Aarrowhand_b3.JPG" width="400" height="23"></td>
  </tr>
  <tr>
    <td><table width="400"  border="1" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
      <tr bgcolor="#999999">
        <td height="30" class="style31"><div align="center">設定上傳檔案數量</div>          <div align="center" class="style31"></div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="35"><div align="center">
              <span class="info">針對第<? echo $_GET[mbr]; ?>個編號，我要上傳</span>              
              <input name="Amount" type="text" style="font-size:9pt;width:40px;height:14px;" value="1"> 
              <span class="info">件檔案
              <input type="button" name="Submit" value="確定" style="font-size:9pt;width:40px;height:20px;" onclick="upload();">
              <input type="button" name="Submit" value="取消" style="font-size:9pt;width:40px;height:22px;" onclick="javascript:window.close();">
</span></div></td>
      </tr>
      <tr bgcolor="#999999">
        <td height="35"><div align="center">
            </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="Aarrowhand_b4.JPG" width="400" height="23"></td>
  </tr>
  </form>
</table>
</body>
</html>
