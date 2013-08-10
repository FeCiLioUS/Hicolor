<? 
//定義URL常數及變數;
define("ERRO_HEAD_URL","product_fix.php");
define("OK_HEAD_URL","product_fix.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//依權限查詢資料;
if(LOGIN_PRVL() == 1){
	//修改資料處理;
	//echo foreach_data($_POST);
	//判斷輸入與否與存入變數整理;
	if ($_POST['kind'] == "" || eregi("[^0-9]",$_POST['kind'])) {
		$Msg = urlencode("請選擇產品類別！");
		ERRO_HEAD($Msg);
	} else if ($_POST['sub_kind'] == "" || eregi("[^0-9]",$_POST['sub_kind'])) {
		$Msg = urlencode("請選擇產品規格！");
		ERRO_HEAD($Msg);
	} else if ($_POST['face'] != 1 && $_POST['face'] != 2) {
		$Msg = urlencode("請選擇印刷面數！");	
		ERRO_HEAD($Msg);
	} else if ($_POST['unit_k'] == "" || eregi("[0-9]",$_POST['unit_k'])) {
		$Msg = urlencode("請輸入計算單位名稱！例如：「盒」！");	
		ERRO_HEAD($Msg);	
	}
	if ($_POST['amount'] == "" || eregi("[^0-9]",$_POST['amount']) || $_POST['amount'] <= 0) {
		$Msg = urlencode("請輸入數量");	
		ERRO_HEAD($Msg);	
	} else if ($_POST['price'] == "" || eregi("[^0-9]",$_POST['price']) || $_POST['price'] <= 0) {
		$Msg = urlencode("請輸入金額！");	
		ERRO_HEAD($Msg);	
	} else if ($_POST['trans_la'] == "" || $_POST['trans_la'] == 0 || eregi("[^0-9]",$_POST['trans_la'])) {
		$Msg = urlencode("請選擇運費等級！");	
		ERRO_HEAD($Msg);	
	}
	//修改消息;
	$UPDATE_NM = "PRODUCT_FIX";
	$UPDATE_TABLES_NM = "PRODUCT_DATA";
	$UPDATE_WHERE_ARG = "SEQ_NBR = ".$_GET['SEQ_NUM'];
	$UPDATE_DATA = "KIND = " . $_POST['kind'] . ",SUBKIND = " . $_POST['sub_kind'] . ",FACE = " . $_POST['face'] . ",UNIT_NM = \"" . $_POST['unit_k'] . "\",AMOUNT = " . $_POST['amount'] . ",PRICE = " . $_POST['price'] . ",TRANS_LEV = " . $_POST['trans_la'] . ",UPD_ADMIN_NM = " . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT = " . $CRTE_TIME;
	$$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
	if(!mysql_query($$UPDATE_NM, MyLink)){
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