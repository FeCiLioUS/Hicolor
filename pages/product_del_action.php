<? 
define("ERRO_HEAD_URL","admin_products.php");
define("OK_HEAD_URL","admin_products.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//依權限查詢資料;
if(LOGIN_PRVL() == 1){
	//刪除消息;
	$DEL_NM = "DEL_PRODUCT";
	$DEL_TABLES_NM = "PRODUCT_DATA";
	//foreach_data($_GET);
	if($_GET['MODE'] == "DEL"){
	   $Msg = DEL_ACTION($DEL_NM, $DEL_TABLES_NM, $DEL_WHERE_FIELD = "", $DEL_FILES_SEQ = "", $DEL_FILES_TAB_NM = "", $UPDATE_DATA = "", $PASS_DEL_AD = "", "");
	   if($Msg == "刪除成功！"){
		   $Msg = urlencode("刪除成功！");
		   OK_HEAD($Msg);
	   }else{
		   $Msg = str_replace("-","和",$Msg);
		   $Msg = urlencode("產品編號".$Msg."刪除失敗！");
		   ERRO_HEAD($Msg);
	   }
	}else{	   
	   foreach($_REQUEST['del_produ'] as $KEY => $VALUE){			
		   $PRODU_SEAR_R = SEL("PRODUCT_DATA", "UNIT_NM", "PRODUCT_DATA", "SEQ_NBR != 1 && SEQ_NBR != 2 && SEQ_NBR = " . $VALUE, "", "");
		   $UPDATE_NM = "update PRODUCT_DATA set UNIT_NM = \"DEL" . $PRODU_SEAR_R[1]['UNIT_NM'] . "\" where SEQ_NBR=" . $VALUE;		   
		   if(!mysql_query($UPDATE_NM, MyLink)){
				$Msg = urlencode("資料刪除失敗！");
				$result_errro = $result . "和" . sprintf("$04d" . $VALUE);
		   }else{
			   $Msg = urlencode("資料刪除成功！");
		   }
	   }   
	   $result_errro = substr($result_errro, 3, strlen($result_errro) - 3);
	   if($result_errro){
		   ERRO_HEAD("產品編號" . $result_errro . "，" . $Msg);
	   }else{
		   OK_HEAD($Msg);
	   }
	}
} else {
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
    ERRO_HEAD($Msg);
}
?>