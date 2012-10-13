<? 
//定義URL常數;
define("ERRO_HEAD_URL","regist_3.php");
define("OK_HEAD_URL","regist_sus.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
//判斷會員是否已存在;
$QUERY_NM="REGIST_NM_CHECK";
$QUERY_SELECT_NM="SEQ_NBR,ACCOUNT";
$QUERY_TABLES_NM="RIGIST_DATA";
$QUERY_WHERE_ARG="ACCOUNT = \"".$_REQUEST[ACCOUNT]."\"";//
$QUERY_ORDER_ARG="";//SEQ_NBR asc
$QUERY_limit_ARG="";//"0,20"
$REGIST_NM_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
if($REGIST_NM_CHECK_R[0]>0){
   $Msg=urlencode("此帳號已被申請，請輸入其他帳號！");
   ERRO_HEAD($Msg);
}
session_start();
$cookes_v=SEL("cookies","*","session_value","SE_COOKIE = \"".$_SESSION['se_COOKIE']."\"","","");

//echo str_replace(" ","",$cookes_v[1][SE_SESSION])."<br>";
//echo md5($_POST[securityImageValue])."<br>";
//echo $cookes_v[1][SE_SESSION]."<br>";
//echo md5($_POST[securityImageValue]) != $cookes_v[1][SE_SESSION]."<br>";
if (md5($_POST[securityImageValue]) != $cookes_v[1][SE_SESSION]) {	
    $Msg=urlencode("確認碼輸入錯誤！請再次輸入確認碼！");
	ERRO_HEAD($Msg);
}
//判斷變數;
if($_POST[M_NAME]=="" || strlen($_POST[M_NAME])<6){
    $Msg=urlencode("請輸入二個中文字元或六個英文字元的姓名！");
	ERRO_HEAD($Msg);
}
if($_POST[EMAIL]){
    if(!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$_POST[EMAIL])) {
         $Msg=urlencode("您的郵件信箱帳號格式錯誤，請重新填寫！");
		 ERRO_HEAD($Msg);
    }
}else{
    $_POST[EMAIL]="";
}
if(!$_POST[PHONE] && !$_POST[MOBILE]){
    $Msg=urlencode("至少要填入一組電話！");
	ERRO_HEAD($Msg);
}
if($_POST[PHONE]==""){
    $_POST[PHONE]="";
}
if($_POST[MOBILE]==""){
    $_POST[MOBILE]="";
}
if($_POST[RECEIPT_SN] && (eregi("[^0-9]",$_POST[RECEIPT_SN]) || strlen($_POST[RECEIPT_SN])!=8)){
    $Msg=urlencode("請填寫正確的統一編號！");
	ERRO_HEAD($Msg);
}
if($_POST[RECEIPT_TYPE]==""){
    $Msg=urlencode("請選擇發票種類！");
	ERRO_HEAD($Msg);
}
foreach($_POST as $key=>$value){
   if($key!="RECEIPT_TYPE" && $key!="RECEIPT_addressr"){
       if($value=="0"){
	      $_POST[$key]="";
	   }
   }
}
if(!$_POST[RECEIPT_SN]){
   $_POST[RECEIPT_SN]="\"\"";
}
if(substr($_POST[MOBILE],0,1)==9){
    $_POST[MOBILE]="0".$_POST[MOBILE];
}
//foreach_data($_POST);
//寫入資料庫;
   //查資料庫欄位;
   $QUERY_NM="MEMBER_REGIST";
   $QUERY_SELECT_NM="*";
   $QUERY_TABLES_NM="RIGIST_DATA";
   $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;
   $TABLE="RIGIST_DATA";
   //echo $FIELD_NM."<br>";
   $FIELD_Value="\"".$_POST[ACCOUNT]."\",\"".$_POST[PWD]."\",1,\"".$_POST[M_NAME]."\",\"".$_POST[EMAIL]."\",\"".$_POST[PHONE]."\",\"".$_POST[MOBILE]."\",\"\",\"\",\"".$_POST[address]."\",\"".$_POST[comany_nm]."\",".$_POST[RECEIPT_SN].",\"".$_POST[RECEIPT_TITLE]."\",".$_POST[RECEIPT_TYPE].",".$_POST[RECEIPT_addressr].",\"\",\"\",\"".$_POST[addressr]."\",".$CRTE_TIME.",\"\"";
	//echo $FIELD_Value;
   //寫入;
   $ttt=insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="","break");
   if($ttt=="OK"){
$email_content="
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/tr/html4/strict.dtd'>
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<title>HiColor印刷購物網</title>
<style type=\"text/css\">
<!--
@import url(\"hicolor.css\");
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.info {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	letter-spacing: 2px;
	color: #333333;
}
.menu {
	font-family: \"Times New Roman\", Times, serif;
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
	font-family: \"Times New Roman\", Times, serif;
	font-size: 12px;
	letter-spacing: 3px;
	color: #666666;
	line-height: 17px;
}
.topic {
	font-family: \"Times New Roman\", Times, serif;
	font-size: 15px;
	letter-spacing: 2px;
}
.link_num {
	font-family: \"Times New Roman\", Times, serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	letter-spacing: 3px;
}
.PS {
	font-family: \"Times New Roman\", Times, serif;
	font-size: 12px;
	position: static;
	width: 260px;
	clip: rect(auto,auto,auto,auto);
}
.sub_name {
	font-family: \"華康中黑體(P)\";
	font-size: 18px;
}
.menu1 {font-family: \"Times New Roman\", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;
	line-height: 20px;
}
.style66 {color: #333333}
-->
</style></head>

<body>
<table width=\"507\" height=\"302\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
   <tr>
    <td height=\"30\"><div align=\"center\"></div></td>
  </tr>
  <tr>
    <td height=\"70\"><div align=\"center\"><img src=\"http://www.hicolor.tw/logo_2.jpg\" width=\"108\" height=\"109\"></div></td>
  </tr>
  <tr>
    <td height=\"25\" class=\"info\"><div align=\"center\" class=\"contents\">
      <hr>
    </div></td>
  </tr>
  <tr>
    <td height=\"147\" class=\"info\"><div align=\"center\"><span class=\"menu style66\">".$_POST[M_NAME]."先生/小姐 您好！<br>
      感謝您於".date("Y/m/d",$CRTE_TIME)."註冊HiColor印刷購物網會員，<br>
  您的帳號為：".$_POST[ACCOUNT]."　密碼為：".$_POST[PWD]."<br>
  如有任何疑問，請與我們聯絡~謝謝！<br>聯絡電話：（02）2254-7467 傳真號碼：（02）2250-2939 </span></div></td>
  </tr>
  <tr>
    <td height=\"21\" class=\"info\"><hr></td>
  </tr>
</table>
</body>
</html>";
  SystemSendMail( "html", $_POST[EMAIL], "Hicolor印刷購物網印刷註冊成功通知", $email_content, "HiColor印刷購物網", "hicolor.service@msa.hinet.net", 3);
  $Msg=urlencode("會員註冊成功！");
 //OK_HEAD($Msg);
   header("location:regist_sus.php?Msg=".$Msg);
  }
?>
