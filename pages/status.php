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
$CHECK_HISTORY_BUYED_R = SEL("CHECK_HISTORY_BUYED","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
$Mode = "";
$history = array();
$SN_LIST_P = array();
$SN_LIST = array();
$searchData = array();
$searchTotal = 0;
$resultData;
$resultTotal = 0;
$queryModes = array(
	0 => "最後交易訂單",
	1 => "歷史訂單",
	2 => "訂單日期",
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
if ($_GET["search_typ"]) {
	$queryMode = $_GET["search_typ"];
    $Caption = $_GET["Caption"];
	$Caption2 = $_GET["Caption2"];
	$DISPLAY = $_GET["DISPLAY"];
	$DETAIL = $_GET["detail"];	
} else if($_POST["search_typ"]){
	$queryMode = $_POST["search_typ"];
	$Caption = $_POST["Caption"];
	$Caption2 = $_POST["Caption2"];	
	$DISPLAY = $_POST["DISPLAY"];
	$DETAIL = $_POST["detail"];
} else {
	$queryMode = 0;
	$DETAIL = "";
}
switch ($queryMode) {
case 1:
	$CHECK_BUYED_R = SEL("BUY_CHECK", "*", "SALES_CAR", "BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$DETAIL." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
	if ($CHECK_BUYED_R[0] == 1) {
		$resultData = $CHECK_BUYED_R[1];
		$resultTotal = 1;
	}
	$DISPLAY=1;
	$DISPLAY_RESULT=0;
	$DISPLAY_BUY_LIST=1;
	break;
case 2:
	$DAT = explode("/", $_POST['Caption']);
	$SD = mktime(0, 0, 0, $DAT[0], $DAT[1], $DAT[2]);
	$DAT = explode("/", $_POST['Caption2']);
	$ED = mktime(23, 59, 59, $DAT[0], $DAT[1], $DAT[2]);
	$CHECK_BUYED_R = SEL("BUY_CHECK", "*", "SALES_CAR", "BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
	$searchTotal = $CHECK_BUYED_R[0];
	$SN_LIST[0] = '----選擇編號----';
	if($CHECK_BUYED_R[0] != 0) {
		if($CHECK_BUYED_R[0] == 1){
			$searchData[] = $CHECK_BUYED_R[1];		
		}else{
			$searchData = $CHECK_BUYED_R[1];		
		}
		foreach($searchData as $KEY => $VALUE){		
			$SN_LIST[$VALUE["SEQ_NBR"]] = $VALUE["SALES_LA"].sprintf("%04d",$VALUE["SEQ_NBR"]);
		}
	}	
	$hicolor-> assign('SN_LIST', $SN_LIST);
	$hicolor-> assign('Caption', $_POST['Caption']);
	$hicolor-> assign('Caption2', $_POST['Caption2']);
	$DISPLAY = 1;
	$DISPLAY_RESULT = 1;
	$DISPLAY_BUY_LIST = 0;
	if (isset($_POST['search_result'])) {
		$CHECK_BUYED_R = SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_POST['search_result']." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
		if ($CHECK_BUYED_R[0] == 1) {
			$resultData = $CHECK_BUYED_R[1];
			$resultTotal = 1;
			$DISPLAY_BUY_LIST = 1;
		}
		$hicolor-> assign('search_result', $_POST['search_result']);		
	}
	break;
case 3:
	if (isset($_POST['Caption'])) {
		$hicolor-> assign('Caption', $_POST['Caption']);
		if (count($history) > 0) {	
			foreach($history as $KEY => $VALUE){			
				$CHECK_DETAIL_BUYED_R = SEL("BUY_CHECK", "*", "SALES_CAR_DETAIL", "SALES_SEQ = ".$VALUE['SEQ_NBR'], "SEQ_NBR asc", "");
				$DETAIL_BUYED_DATA = array();			
				if ($CHECK_DETAIL_BUYED_R[0] > 0) {				
					if ($CHECK_DETAIL_BUYED_R[0] == 1) {
						$DETAIL_BUYED_DATA[] = $CHECK_DETAIL_BUYED_R[1];
					} else {
						$DETAIL_BUYED_DATA = $CHECK_DETAIL_BUYED_R[1];
					}				
					foreach($DETAIL_BUYED_DATA as $KEY2 => $VALUE2){													
						$upload_R = SEL("BUY_CHECK", "*", "SALES_CAR_UPLOAD", "SALES_DETAIL_SEQ = ".$VALUE2['SEQ_NBR']." && (FILE_NM like \"%".$_POST['Caption']."%\" || FILE_NICK like \"%".$_POST['Caption']."%\")","SEQ_NBR asc","");
						if($upload_R[0]!=0){							
							array_push($searchData, $VALUE);
						}						
					}
				}
			}
		}
		$searchTotal = count($searchData);
		$SN_LIST[0] = '----選擇編號----';
		if($searchTotal > 0){			
			foreach($searchData as $KEY => $VALUE){
				$SN_LIST[$VALUE["SEQ_NBR"]] = $VALUE["SALES_LA"].sprintf("%04d",$VALUE["SEQ_NBR"]);			
			}
	    }
		$hicolor-> assign('SN_LIST', $SN_LIST);
		$DISPLAY = 1;
		$DISPLAY_RESULT = 1;
		$DISPLAY_BUY_LIST = 0;
		if (isset($_POST['search_result'])) {
			$CHECK_BUYED_R = SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_POST['search_result']." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
			if ($CHECK_BUYED_R[0] == 1) {
				$resultData = $CHECK_BUYED_R[1];
				$resultTotal = 1;
				$DISPLAY_BUY_LIST = 1;
			}
			$hicolor-> assign('search_result', $_POST['search_result']);
		}
	}
	break;
case 4:
	if (isset($_POST['Caption2'])) {
		$hicolor-> assign('Caption', $_POST['Caption']);
		$hicolor-> assign('Caption2', $_POST['Caption2']);
		$price = explode(",", $_POST['Caption2']);		
		if (count($history) > 0) {	
			foreach($history as $KEY => $VALUE) {
				$totalPrice = $VALUE['FINISH_PAY'] + $VALUE['TRANS_PRICE'];
				if ($price[0] <= $totalPrice && $totalPrice <= $price[1]) {
					array_push($searchData, $VALUE);
				}				
			}
			
		}
		$searchTotal = count($searchData);
		$SN_LIST[0] = '----選擇編號----';
		if($searchTotal > 0){			
			foreach($searchData as $KEY => $VALUE){
				$SN_LIST[$VALUE["SEQ_NBR"]] = $VALUE["SALES_LA"].sprintf("%04d",$VALUE["SEQ_NBR"]);
			}
		}
		$hicolor-> assign('SN_LIST', $SN_LIST);
		$DISPLAY = 1;
		$DISPLAY_RESULT = 1;
		$DISPLAY_BUY_LIST = 0;
		if (isset($_POST['search_result'])) {
			$CHECK_BUYED_R = SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_POST['search_result']." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
			if ($CHECK_BUYED_R[0] == 1) {
				$resultData = $CHECK_BUYED_R[1];
				$resultTotal = 1;
				$DISPLAY_BUY_LIST = 1;
			}
			$hicolor-> assign('search_result', $_POST['search_result']);
		}		
	}
	break;
default:
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
	$hicolor-> assign('resultData', $resultData);
	$resultBuyList = array();
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
$hicolor-> assign('DETAIL', $DETAIL);
$hicolor-> assign('queryModes', $queryModes);
$hicolor-> assign('queryMode', $queryMode);
$hicolor-> assign('SN_LIST_P', $SN_LIST_P);
$hicolor-> assign('searchTotal', $searchTotal);
$hicolor-> assign('resultTotal', $resultTotal);
$hicolor-> assign('resultBuyList', $resultBuyList);
$hicolor-> assign('pageTitle', '交易記錄');
$hicolor-> assign('memberSN', $LOG_PRVL.sprintf("%05d",$buyer));
$hicolor-> assign("contentPath", "../templates/status.tpl");
$hicolor-> display("standard_template.tpl");
?>