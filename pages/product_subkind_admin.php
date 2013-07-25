<?
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');
//限制每頁筆數;
$MAX_NUM = 10;
$URL_AUG = "";
if ($_GET["PAGE"]) {
	$URL_AUG .= "&PAGE=" . $_GET["PAGE"];
}
if ($_GET["MODE"]) {
	$URL_AUG .= "&MODE=" . $_GET["MODE"];
}
if ($_GET["Keyword"]) {
	$URL_AUG .= "&Keyword=" . $_GET["Keyword"];
}
//依權限查詢資料;
if(LOGIN_PRVL() == 1) {
	if($_GET['KIND']){
		if($_GET['KIND'] == "ALL"){			
			$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";
			$QUERY_ORDER_ARG = "PRO_KIND asc,SEARC_SUBKIND_LEV asc";			
		}else{
			$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_KIND = " . $_GET["KIND"];
			$QUERY_ORDER_ARG = "SEARC_SUBKIND_LEV asc";
		}
	}else{		
		$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";
		$QUERY_ORDER_ARG = "PRO_SUBKIND_LEV asc";		
	}
	//查詢;
	$QUERY_NM = "PRODUCT_SUBKIND_NM";
	$QUERY_SELECT_NM = "*";
	$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
	$QUERY_limit_ARG = "";//"0,20"
	$SUBKIND_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
	//查詢類別;
	$QUERY_NM = "PRODUCT_KIND_NM";
	$QUERY_SELECT_NM = "*";
	$QUERY_TABLES_NM = "PRODUCT_KIND";
	$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";//ADMIN_CONT = \"".$_POST[CONT]."\"
	$QUERY_ORDER_ARG2 = "PR_KIND_LEV asc";//
	$QUERY_limit_ARG = "";//"0,20"
	$PRODUCT_KIND_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG2, $QUERY_limit_ARG);
	
	$kindlistArray = array();
	if($PRODUCT_KIND_NM_R[0] == 1){
		array_push($kindlistArray, $PRODUCT_KIND_NM_R[1]);
	} else if($PRODUCT_KIND_NM_R[0]>1) {
		$kindlistArray = $PRODUCT_KIND_NM_R[1];
	}
	$kindList =  array();
	$searchKindList = array();
	$kindList[""] = "--棣屬類別--";
	$searchKindList[""] = "--棣屬類別--";
	$searchKindList["ALL"] = "--全部類別--";
	foreach($kindlistArray as $key => $value) {		
		$kindList[$value['SEQ_NBR']] = $value["NAME"];
		$searchKindList[$value['SEQ_NBR']] = $value['NAME'];
	}	
	
	//如未分類查詢時照筆數查詢;
	$subKindListArray = array();
	if ($SUBKIND_NM_R[0] > 0) {
		if ($_GET['KIND'] == "ALL" || !$_GET['KIND']) {
			//起始筆;
			$START_NUM = START_NR($_GET['SUB_PAGE'], $SUBKIND_NM_R[0], $MAX_NUM);			
			$PAGE_NOW = PAGE_NM($START_NUM, $MAX_NUM);
			//頁數系統;			
			if ($_GET['KIND'] == "ALL") {
				$URL_AUG .= "&KIND=ALL";
			}
			$PAGE_DISPLAY = P_SYS($SUBKIND_NM_R[0], $MAX_NUM, $PAGE_NOW, $URL="product_subkind_admin.php", $URL_AUG, "SUB_PAGE");
			
			//查詢;
			$QUERY_NM = "PRODUCT_SUBKIND_NM2";
			$QUERY_SELECT_NM = "*";
			$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
			$QUERY_limit_ARG = $START_NUM.",".$MAX_NUM;
			$SUBKIND_NM_R2 = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
			
			if ($SUBKIND_NM_R2[0] == 1) {
				array_push($subKindListArray, $SUBKIND_NM_R2[1]);				
			} else if ($SUBKIND_NM_R2[0] > 1) {
				$subKindListArray = $SUBKIND_NM_R2[1];
			}
		} else {
			if ($SUBKIND_NM_R[0] == 1) {
				array_push($subKindListArray, $SUBKIND_NM_R[1]);				
			}else if($SUBKIND_NM_R[0] > 1) {
				$subKindListArray = $SUBKIND_NM_R[1];				
			}
		}
	}
} else {
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}

$hicolor-> assign("URL_AUG", $URL_AUG);
$hicolor-> assign("searchKindList", $searchKindList);
$hicolor-> assign("kindsListArray", $kindList);
$hicolor-> assign("subKindListArray", $subKindListArray);
$hicolor-> assign("PAGE_DISPLAY", $PAGE_DISPLAY);
$hicolor-> assign("pageTitle", "規格管理");
$hicolor-> assign("contentPath", "../templates/product_subkind_admin.tpl");
$hicolor-> display("standard_template.tpl");
?>