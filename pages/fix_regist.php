<? 
//定義URL常數;
define("ERRO_HEAD_URL","index.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
  // $Msg=urlencode("會員尚未登入或已登出！");
   $Msg = "";
   ERRO_HEAD($Msg);
}else{
   //查詢資料;
   $QUERY_NM="REGIST_DATA";
   $QUERY_SELECT_NM="*";
   $QUERY_TABLES_NM="RIGIST_DATA";
   $QUERY_WHERE_ARG="SEQ_NBR=".$LOGIN_OBJ["LOGIN_ID"];//ADMIN_CONT = \"".$_POST[CONT]."\"
   $QUERY_ORDER_ARG="";//VINEWS desc,SEQ_NBR desc
   $QUERY_limit_ARG="";//"0,20"
   $REGIST_DATA_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
}
foreach($REGIST_DATA_R[1] as $rkey=>$rvalue){    
	if($rvalue=="0"){
	    $REGIST_DATA_R[1][$rkey]="";
	}
}
if($REGIST_DATA_R[1][RECEIPT_TYPE]){
	$RECEIPT_TYPE_SELECTED= $REGIST_DATA_R[1][RECEIPT_TYPE];
}
$RECEIPT_TYPE_OPTIONS= array(
	""=> "--選擇發票種類--",
	2 => "二聯式發票",
	3 => "三聯式發票"
);
$hicolor-> assign("M_NAME", $REGIST_DATA_R[1][M_NAME]);
$hicolor-> assign("EMAIL", $REGIST_DATA_R[1][EMAIL]);
$hicolor-> assign("PHONE", $REGIST_DATA_R[1][PHONE]);
$hicolor-> assign("MOBILE", $REGIST_DATA_R[1][MOBILE]);
$hicolor-> assign("address", $REGIST_DATA_R[1][address]);
$hicolor-> assign("comany_nm", $REGIST_DATA_R[1][comany_nm]);
$hicolor-> assign("RECEIPT_SN", $REGIST_DATA_R[1][RECEIPT_SN]);
$hicolor-> assign("RECEIPT_TITLE", $REGIST_DATA_R[1][RECEIPT_TITLE]);
$hicolor-> assign("RECEIPT_TYPE_SELECTED", $RECEIPT_TYPE_SELECTED);
$hicolor-> assign("RECEIPT_TYPE_OPTIONS", $RECEIPT_TYPE_OPTIONS);
$hicolor-> assign("RECEIPT_addressr", $REGIST_DATA_R[1][RECEIPT_addressr]);
$hicolor-> assign("addressr", $REGIST_DATA_R[1][addressr]);
$hicolor-> assign("pageTitle", "修改基本資料");
$hicolor-> assign("contentPath", "../templates/fix_regist.tpl"); 
$hicolor-> display("standard_template.tpl");
?>