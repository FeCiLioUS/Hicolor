<? 
session_start();
define("ERRO_HEAD_URL","regist_2.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
USER_LOGIN();
//判斷會員是否已存在;
$QUERY_NM="REGIST_NM_CHECK";
$QUERY_SELECT_NM="SEQ_NBR,ACCOUNT";
$QUERY_TABLES_NM="RIGIST_DATA";
//echo $_REQUEST[ACCOUNT];
if($_REQUEST[ACCOUNT]){
   $QUERY_WHERE_ARG="ACCOUNT = \"".$_REQUEST[ACCOUNT]."\"";//
   $ACCOUNT=$_REQUEST[ACCOUNT];
   $PWD=$_REQUEST[PWD];   
   $REGIST_COOKIE_VAL=md5($_REQUEST[ACCOUNT].$_REQUEST[PWD].time());
 //  echo $REGIST_COOKIE_VAL;
}else if($_GET[ACCOUNT]){
   foreach($_GET as $KEY=>$VALUE){
       if($VALUE=="0"){
	       $_GET[$KEY]="";
	   }
   }
   $QUERY_WHERE_ARG="ACCOUNT = \"".$_GET[ACCOUNT]."\"";//
   $ACCOUNT=$_GET[ACCOUNT];
   $PWD=$_GET[PWD];
   $REGIST_COOKIE_VAL=md5($_GET[ACCOUNT].$_GET[PWD].time());
}
$QUERY_ORDER_ARG="";//SEQ_NBR asc
$QUERY_limit_ARG="";//"0,20"
$REGIST_NM_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
//echo $REGIST_NM_CHECK_R[0];
if($REGIST_NM_CHECK_R[0]>0){
   $Msg=urlencode("此帳號已被申請，請輸入其他帳號！");
   ERRO_HEAD($Msg);
}
$_SESSION['se_COOKIE']= $REGIST_COOKIE_VAL;

$hicolor-> assign("pageTitle", "會員註冊");
$hicolor-> assign("M_NAME",$_GET[M_NAME]);
$hicolor-> assign("EMAIL",$_GET[EMAIL]);
$hicolor-> assign("PHONE",$_GET[PHONE]);
$hicolor-> assign("MOBILE",$_GET[MOBILE]);
$hicolor-> assign("address",$_GET[address]);
$hicolor-> assign("comany_nm",$_GET[comany_nm]);
$hicolor-> assign("RECEIPT_SN",$_GET[RECEIPT_SN]);
$hicolor-> assign("RECEIPT_TITLE",$_GET[RECEIPT_TITLE]);
if(isset($_GET[RECEIPT_TYPE])){
	$RECEIPT_TYPE_SELECTED= $_GET[RECEIPT_TYPE];
}
$RECEIPT_TYPE_OPTIONS= array(
	""=> "--選擇發票種類--",
	2 => "二聯式發票",
	3 => "三聯式發票"
);
$hicolor-> assign("RECEIPT_TYPE_OPTIONS", $RECEIPT_TYPE_OPTIONS);
$hicolor-> assign("RECEIPT_TYPE_SELECTED", $RECEIPT_TYPE_SELECTED);
$hicolor-> assign("RECEIPT_addressr", $_GET[RECEIPT_addressr]);
$hicolor-> assign("addressr", $_GET[addressr]);
if(isset($_GET[ACCOUNT])){
	$hicolor-> assign("ACCOUNT", $_GET[ACCOUNT]);
}else if(isset($_POST[ACCOUNT])){ 
	$hicolor-> assign("ACCOUNT", $_POST[ACCOUNT]);
}
if(isset($_GET[PWD])){
	$hicolor-> assign("PWD", $_GET[PWD]);
}else if(isset($_POST[PWD])){
	$hicolor-> assign("PWD", $_POST[PWD]);
} 
$hicolor-> assign("contentPath", "../templates/regist_3.tpl"); 
$hicolor-> display("standard_template.tpl");
?>