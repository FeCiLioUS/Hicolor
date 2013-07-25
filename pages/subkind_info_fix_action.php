<?
define("ERRO_HEAD_URL","product_subkind_info.php");
define("OK_HEAD_URL","product_subkind_info.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//權限檢查;
if(LOGIN_PRVL() == 1) {
	//foreach_data($_POST);
    //判斷輸入與否與存入變數整理;
    //新增資料;
    $now_time = $CRTE_TIME;
    //查詢;
    $QUERY_NM = "SUBKIND_DATA_NM";
    $QUERY_SELECT_NM = "*";
    $QUERY_TABLES_NM = "PRODUCT_SUBKIND";
    $QUERY_WHERE_ARG = "SEQ_NBR  != 1 && SEQ_NBR  != 2 && SEQ_NBR = ".$_POST["SEQ"];
    $QUERY_ORDER_ARG = "";
    $QUERY_limit_ARG = "";//"0,20"
    $KIND_DATA_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
    //echo $KIND_DATA_NM_R[0]."<br>";
    //修改詳細資料;
	$UPDATE_NM = "SUBKIND_INFO_FIX";
	$UPDATE_TABLES_NM = "PRODUCT_SUBKIND";
	$UPDATE_WHERE_ARG = "SEQ_NBR = " . $_POST["SEQ"];
	if ($_POST["paper_info"] == "0") {
	   $_POST["paper_info"] = "";
	}
	if ($_POST["finish_info"] == "0") {
	   $_POST["finish_info"] = "";
	}

	$UPDATE_DATA = "PAPER_INFO = \"" . $_POST["paper_info"] . "\",FINISH_W = " . $_POST["finish_width"] . ",FINISH_H = " . $_POST["finish_heigh"] . ",BODER_W = " . $_POST["border_width"] . ",BODER_H = " . $_POST["border_heigh"] . ",FINISH_INFO = \"" . $_POST["finish_info"] . "\",UPD_ADMIN_NM = " . $hicolor-> loginInfo['LOGIN_ID'] . ", UPD_DT = " . $now_time;
	$$UPDATE_NM = "update " . $UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;
	//echo $$UPDATE_NM;
	
	if (!mysql_query($$UPDATE_NM, MyLink)) {
		$Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
		ERRO_HEAD($Msg);
	}else{
		$Msg = urlencode("資料修改成功！");
		OK_HEAD($Msg);
	}
    
} else {
    $Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}    
?>
