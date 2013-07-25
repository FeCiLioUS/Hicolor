<?
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//依權限查詢資料;
if(LOGIN_PRVL() == 1) {
   //查詢;
   $QUERY_NM = "PRODUCT_KIND_NM";
   $QUERY_SELECT_NM = "*";
   $QUERY_TABLES_NM = "PRODUCT_KIND";
   $QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";//ADMIN_CONT = \"".$_POST[CONT]."\"
   $QUERY_ORDER_ARG = "PR_KIND_LEV asc";//
   $QUERY_limit_ARG = "";//"0,20"
   $PRODUCT_KIND_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
	//echo  $PRODUCT_KIND_NM_R[0];
	$dataArray = array();
	if($PRODUCT_KIND_NM_R[0] == 1){
		array_push($dataArray, $PRODUCT_KIND_NM_R[1]);
	}else if($PRODUCT_KIND_NM_R[0] > 1){
		$dataArray = $PRODUCT_KIND_NM_R[1];		
	}
}else{
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
    ERRO_HEAD($Msg);
}
/*
$hicolor-> assign("urlAug", $URL_AUG);
$hicolor-> assign("pageNow", $PAGE_NOW);
$hicolor-> assign("pagination", $PAGE_DISPLAY);

$hicolor-> assign("kindOptions", $kindOptionsArray);
$hicolor-> assign("subkindOptions", $subkindOptionsArray);
$hicolor-> assign("transOptions", $transOptionsArray);*/
$hicolor-> assign("productKindsList", $dataArray);
$hicolor-> assign("pageTitle", "類別管理");
$hicolor-> assign("contentPath", "../templates/product_kind_admin.tpl");
$hicolor-> display("standard_template.tpl");
?>