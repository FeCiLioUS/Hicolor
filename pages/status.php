<? 
define("ERRO_HEAD_URL","about.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){    
    $Msg=urlencode("您尚未登入，請先登入會員！");
    ERRO_HEAD($Msg);
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//調閱歷史;
$CHECK_HISTORY_BUYED_R=SEL("CHECK_HISTORY_BUYED","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
$Mode = "";
$history = array();
$SN_LIST_P = array();
$SN_LIST = array();
$searchData = array();
$searchTotal = 0;
$resultData;
$resultTotal = 0;
$dateN = date("Y/m/d");
$monthN = date("Y/m");
$queryModes = array(
	0 => "--選擇查詢方式--",
	1 => "歷史訂單",
	2 => "訂單日期",
	5 => "訂單月份",
	3 => "案件名稱",
	4 => "交易金額"
);
if($CHECK_HISTORY_BUYED_R[0]==1){
	$history[] = $CHECK_HISTORY_BUYED_R[1];
} else if($CHECK_HISTORY_BUYED_R[0] > 1){
	$history = $CHECK_HISTORY_BUYED_R[1];
}
foreach ($history as $key => $value) {
	$SN_LIST_P[$value["SEQ_NBR"]] = $value["SALES_LA"].sprintf("%04d",$value["SEQ_NBR"]);	
}
if ($_GET["MODE"]) {
	$Mode = $_GET["MODE"];	
    $S_CAP = $_GET["Caption"];
	$DISPLAY = $_GET["DISPLAY"];
	$SN = $_GET["SN"];
} else if($_POST["MODE"]){
	$Mode = $_POST["MODE"];
	$S_CAP = $_POST["Caption"];	
	$DISPLAY = $_POST["DISPLAY"];
	$SN = $_POST["SN"];
}
switch ($Mode) {
case "SN":
/*
	$queryMode = 1;	
	//$SN_LIST_P[0] = "--選擇訂單編號--";
	//$detailDisabled = false;
	//$captionDisabled = true;
	break;
case "DATE_SEARCH":

	$queryMode = 2;
	$DAT = explode("/",$S_CAP,3);
	$SD = mktime(0,0,0, $DAT[1], $DAT[2], $DAT[0]);
	$ED = mktime(23,59,59, $DAT[1], $DAT[2], $DAT[0]);
	echo $SD."===";
	echo $ED."===";
	$CHECK_BUYED_R = SEL("BUY_CHECK", "*", "SALES_CAR", "BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
	$searchTotal = $CHECK_BUYED_R[0];	
	echo $CHECK_BUYED_R[0];
	if($CHECK_BUYED_R[0] == 1){
		$searchData[] = $CHECK_BUYED_R[1];		
	}else{
		$searchData = $CHECK_BUYED_R[1];		
	}
	foreach($searchData as $KEY => $VALUE){		
		$SN_LIST[$VALUE["SEQ_NBR"]] = $VALUE["SALES_LA"].sprintf("%04d",$VALUE["SEQ_NBR"]);
	}
	//$SN_LIST_P[0] = "--於右側輸入下單日期--";
	$DISPLAY_RESULT=1;
	$DISPLAY_BUY_LIST=1;
	$dateN = $S_CAP;
	$CHECK_BUYED_R = SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$SN." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
	break;
case "MONTH_SEARCH":
	$queryMode = 5;
	//$SN_LIST_P[0] = "--於右側輸入下單月份--";
	break;
case "FILES_SEARCH":
	$queryMode = 3;
	//$SN_LIST_P[0] = "--於右側輸入檔案名稱--";
	//$detailDisabled = true;
	//$captionDisabled = false;
	break;
case "PRICE_SEARCH":
	$queryMode = 4;
	//$SN_LIST_P[0] = "--於右側輸入交易金額--";
	//$detailDisabled = true;
	//$captionDisabled = false;*/
	break;
default:
	$queryMode = 0;
	$resultData = end($history);
	if($resultData) {
		$resultTotal = 1;
	}
	$DISPLAY = 1;
    $DISPLAY_RESULT = 0;
    $DISPLAY_BUY_LIST = 1;
	$hicolor-> assign('listMode', '最後交易訂單');
	break;
}
if($resultTotal > 0){
	$resultBuyList = array();
	if($resultData["CLOSE"]==0){
		$STAUS= true;
	}else if($resultData["CLOSE"]==1){
		$STAUS= false;
	}
	if($resultData["PAY_CHECK"]==1){
		$payStatus = true;
		//$PAY_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
	}else{
		$payStatus = false;
		//$PAY_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
	}
	if($resultData["FILES_CHECK"]==1){
		$filesStatus = true;
		//$FILES_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
	}else{
		$filesStatus = false;
	    //$FILES_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
	}
	if($resultData["PRINT_CHECK"]==1){
		$printStatus = true;
		//$PRINT_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
	}else{
		$printStatus = false;
		//$PRINT_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
	}
	if($resultData["TRANS_CHECK"]==1){
		$transStatus = true;
		//$TRANS_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
	}else{
		$transStatus = false;
		//$TRANS_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
	}
	$trans_ti = split("~",$resultData["trans_time"], 2);
	/*if (substr($trans_ti[0], 0, 2) > 12) {
		$SH = sprintf("%02d",(substr($trans_ti[0], 0, 2) - 12));
		$start_hour = "PM" . $SH . "：" . substr($trans_ti[0], 2, 2);
	}else{
		$start_hour = "AM" . substr($trans_ti[0], 0, 2) . "：" . substr($trans_ti[0], 2, 2);
	}
	if (substr($trans_ti[1], 0, 2) > 12) {
		$EH = sprintf("%02d",(substr($trans_ti[1], 0, 2) - 12));
		$end_hour = "PM" . $EH . "：" . substr($trans_ti[1], 2, 2);
	}else{
		$end_hour = "AM" . substr($trans_ti[1], 0, 2) . "：" . substr($trans_ti[1], 2, 2);
	}*/
	//date("Y/m/d",$CHECK_BUYED_R[1][])
	$hicolor-> assign('resultData', $resultData);
	//$CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$CHECK_BUYED_R[1][0])
	/*if($CHECK_BUYED_R[1][CLOSE]==1){
	$CLOSE_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
	}else{
	$CLOSE_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
	}*/
	//查詢購物內容;
    $BUYED_DETAIL_R = SEL("BUY_DETAIL", "*", "SALES_CAR_DETAIL", "SALES_SEQ = ".$resultData["SEQ_NBR"], "SEQ_NBR asc", "");
	$BUYED_DETAIL_DATA = array();
	$tans = array();
	$BUY_SUB_TOTAL = 0;
	if($BUYED_DETAIL_R[0] == 1){
		$BUYED_DETAIL_DATA[] = $BUYED_DETAIL_R[1];
	} else {
		$BUYED_DETAIL_DATA = $BUYED_DETAIL_R[1];
	}	
	foreach ($BUYED_DETAIL_DATA as $value) {		
		$BUYED_DATA_R = SEL("BUY_DATA", "*", "PRODUCT_DATA", "SEQ_NBR = ".$value["BUY_SEQ"], "", "");
		$BUYED_KIND_R = SEL("BUY_KIND", "*", "PRODUCT_KIND", "SEQ_NBR = ".$BUYED_DATA_R[1]["KIND"], "", "");
		$BUYED_SUBKIND_R = SEL("BUY_SUBKIND", "*", "PRODUCT_SUBKIND", "SEQ_NBR = ".$BUYED_DATA_R[1]["SUBKIND"], "", "");
		if ($BUYED_DATA_R[1]["FACE"] == 1) {
			$BUY_FACE = "單";
		}else if ($BUYED_DATA_R[1]["FACE"] == 2) {
			$BUY_FACE="雙";
		}
		$tans[] = $value["TRANS_LEV"];
		$BUY_SUB_TOTAL += $BUYED_DATA_R[1]["PRICE"];
		$resultBuyList[] = array(
			"SEQ" => $value["SEQ_NBR"],
			"NAME" => $BUYED_KIND_R[1]["NAME"],
			"PRO_SUBKIND_NAME" => $BUYED_SUBKIND_R[1]["PRO_SUBKIND_NAME"],
			"BUY_FACE" => $BUY_FACE,
			"UPLOAD_TAB" => $value["UPLOAD_TAB"],
			"SIZE" => $BUYED_SUBKIND_R[1]["FINISH_W"] . "X" . $BUYED_SUBKIND_R[1]["FINISH_H"],
			"QUANTITY" => $BUYED_DATA_R[1]["AMOUNT"] . " " . $BUYED_DATA_R[1]["UNIT_NM"],
			"PRICE" => $BUYED_DATA_R[1]["PRICE"]
		);
	}	
}
$hicolor-> assign('DISPLAY', $DISPLAY);
$hicolor-> assign('DISPLAY_RESULT', $DISPLAY_RESULT);
$hicolor-> assign('DISPLAY_BUY_LIST', $DISPLAY_BUY_LIST);
$hicolor-> assign('queryModes', $queryModes);
$hicolor-> assign('queryMode', $queryMode);
$hicolor-> assign('SN_LIST_P', $SN_LIST_P);
$hicolor-> assign('date', $dateN);
$hicolor-> assign('month', $monthN);
$hicolor-> assign('searchTotal', $searchTotal);
$hicolor-> assign('resultTotal', $resultTotal);
$hicolor-> assign('resultBuyList', $resultBuyList);
$hicolor-> assign('pageTitle', '交易記錄');
$hicolor-> assign('memberSN', $LOG_PRVL.sprintf("%05d",$buyer));
$hicolor-> assign("contentPath", "../templates/status.tpl");
$hicolor-> display("standard_template.tpl");
?>