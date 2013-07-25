<?php
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');
//依權限查詢資料;
if(LOGIN_PRVL() == 1) {
	//查詢;
	$QUERY_NM = "PRODUCT_SUBKIND_INFO";
	$QUERY_SELECT_NM = "*";
	$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
	$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && SEQ_NBR = ".$_GET['SEQ'];
	$QUERY_ORDER_ARG = "";
	$QUERY_limit_ARG = "";
	$PRODUCT_SUBKIND_INFO_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
} else {
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);   
}
$hicolor-> assign('subkindDetails', $PRODUCT_SUBKIND_INFO_R[1]);
$hicolor-> assign("pageTitle", "規格管理");
$hicolor-> assign("contentPath", "../templates/product_subkind_info.tpl");
$hicolor-> display("popup_template.tpl");
?>