<?php
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');
//限制每頁筆數;
$MAX_NUM = 10;
//依權限查詢資料;
if(LOGIN_PRVL() == 1){
   if($_POST['Q_TAB'] == 1){
       //查詢方式;
	   switch($_POST['search_typ']){
	       case"3";
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && SEQ_NBR  = " . $_POST[Keyword];
			  $QUERY_ORDER_ARG = "SUBKIND desc,SEQ_NBR desc";   
		   break;
		   case"5";
		      $YYMMDD = explode("/", $_POST[Keyword],3);
			  $YMD_S = mktime(0, 0, 0, $YYMMDD[1], $YYMMDD[2], $YYMMDD[0]);
			  $YMD_e = mktime(12, 59, 59, $YYMMDD[1], $YYMMDD[2], $YYMMDD[0]);
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && CRT_DT >= ".$YMD_S." && CRT_DT <= ".$YMD_e;
			  $QUERY_ORDER_ARG = "SUBKIND desc,SEQ_NBR desc";   
		  break;
	   }
   }else if($_GET['MODE'] && $_GET['MODE'] != "DEL"){
       switch($_GET['MODE']){
	       case"kind";
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && KIND = ".$_GET['Keyword'];
			  $QUERY_ORDER_ARG = "SUBKIND desc,SEQ_NBR desc";   
		   break;
		   case"sub_kind";
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && SUBKIND = ".$_GET['Keyword'];
			  $QUERY_ORDER_ARG = "KIND desc,SEQ_NBR desc";
		   break;
		   case"trans_la";
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && TRANS_LEV = ".$_GET['Keyword'];
			  $QUERY_ORDER_ARG = "KIND desc,SUBKIND desc,SEQ_NBR desc";
		   break;
	   }
   }else if($_GET['search_typ'] || $_GET['search_aq'] || $_GET['Keyword']){
         //查詢方式;
	    switch($_GET['search_typ']){
	       case"3";
		      $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && SEQ_NBR  = ".$_GET['Keyword'];
			  $QUERY_ORDER_ARG = "SUBKIND desc,SEQ_NBR desc";   
		   break;
		   case"5";
		      $YYMMDD = explode("/",$_GET['Keyword'],3);
			  $YMD_S = mktime(0, 0, 0, $YYMMDD[1], $YYMMDD[2], $YYMMDD[0]);
			  $YMD_e = mktime(12, 59, 59, $YYMMDD[1], $YYMMDD[2], $YYMMDD[0]);
		      $QUERY_WHERE_ARG="SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\" && CRT_DT >= ".$YMD_S." && CRT_DT <= ".$YMD_e;
			  $QUERY_ORDER_ARG="SUBKIND desc,SEQ_NBR desc";   
		  break;
	   }
   }else if($_GET['MODE'] == "DEL"){
	   $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM like \"DEL%\"";
	   $QUERY_ORDER_ARG = "KIND desc,SUBKIND desc,SEQ_NBR desc";
	   $DEL_TAB = "?MODE=DEL";
   }else{
       $QUERY_WHERE_ARG = "SEQ_NBR!=1 && SEQ_NBR!=2 && UNIT_NM not like \"DEL%\"";   
	   $QUERY_ORDER_ARG = "SEQ_NBR desc";
   }
}else{
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
    ERRO_HEAD($Msg);
}
	//判斷筆數;
   $QUERY_NM = "PRODUCT_DATA_NM";
   $QUERY_SELECT_NM = "SEQ_NBR";
   $QUERY_TABLES_NM = "PRODUCT_DATA";
   $QUERY_WHERE_ARG = $QUERY_WHERE_ARG;//ADMIN_CONT = \"".$_POST[CONT]."\"
   $QUERY_ORDER_ARG = $QUERY_ORDER_ARG;//
   $QUERY_limit_ARG = "";//"0,20"
   $PRODUCT_DATA_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
   //echo $PRODUCT_DATA_NM_R[0];
   //起始筆;
   $START_NUM = START_NR($_GET['PAGE'],$PRODUCT_DATA_NM_R[0], $MAX_NUM);
   $PAGE_NOW = PAGE_NM($START_NUM,$MAX_NUM);
   //頁數系統;
   if($_POST['Q_TAB'] == 1){
       $URL_AUG="&search_typ=".$_POST['search_typ']."&Keyword=".$_POST['Keyword'];
   }else if($_GET['MODE']){
       $URL_AUG="&MODE=".$_GET['MODE']."&Keyword=".$_GET['Keyword'];
   }else if($_GET['search_typ']){
       $URL_AUG="&search_typ=".$_GET['search_typ']."&Keyword=".$_GET['Keyword'];
   }
   $PAGE_DISPLAY = P_SYS($PRODUCT_DATA_NM_R[0],$MAX_NUM,$PAGE_NOW,$URL="admin_products.php",$URL_AUG);
   //按頁數查詢;
   $QUERY_NM = "PRODUCT";
   $QUERY_SELECT_NM = "*";
   $QUERY_TABLES_NM = "PRODUCT_DATA";
   $QUERY_WHERE_ARG = $QUERY_WHERE_ARG;//ADMIN_CONT = \"".$_POST[CONT]."\"
   $QUERY_ORDER_ARG = $QUERY_ORDER_ARG;//
   $QUERY_limit_ARG = $START_NUM.",".$MAX_NUM;//
   $PRODUCT_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
   //echo $PRODUCT_R[0];
    $dataArray = array();	
	if ($PRODUCT_R[0] == 1) {
		array_push($dataArray, $PRODUCT_R[1]);
	} else if ($PRODUCT_R[0] > 1) {
		$dataArray = $PRODUCT_R[1];
	}
	
	$i=0;
	foreach($dataArray as $VALUE){
		//echo $dataArray[$i]['SEQ_NBR'].'<br>';
		$SN = (($PAGE_NOW - 1) * $MAX_NUM);
		$num = $SN + $i + 1;
		//查詢產品類別;
		$QUERY_NM="PRODUCT_KIND";
		$QUERY_SELECT_NM = "*";
		$QUERY_TABLES_NM = "PRODUCT_KIND";
		$QUERY_WHERE_ARG = "SEQ_NBR = ".$VALUE['KIND'];
		$QUERY_ORDER_ARG = "";
		$QUERY_limit_ARG = "";
		$PRODUCT_KIND_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
		
		//查詢產品規格;
		$QUERY_NM = "PRODUCT_SUBKIND";
		$QUERY_SELECT_NM = "*";
		$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
		$QUERY_WHERE_ARG = "SEQ_NBR = ".$VALUE['SUBKIND'];
		$QUERY_ORDER_ARG = "";
		$QUERY_limit_ARG = "";
		$PRODUCT_SUBKIND_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);		
		if($VALUE['FACE'] == 1){
		    //$FACE_R ="單面";
		}else if($VALUE['FACE'] == 2){
		    //$FACE_R="雙面";
		}
		
		$dataArray[$i]['PRO_KIND_NAME'] = $PRODUCT_KIND_R[1]['NAME'];
		$dataArray[$i]['PRO_SUBKIND_NAME'] = $PRODUCT_SUBKIND_R[1]['PRO_SUBKIND_NAME'];
		$dataArray[$i]['PRO_SN'] = $num;
		$i++;
	}
	//查詢類別選項; 
	$KIND_SEAR_R = SEL("KIND_SEAR","*","PRODUCT_KIND","SEQ_NBR != 1 && SEQ_NBR != 2","PR_KIND_LEV asc", $QUERY_limit_ARG = "");
	//echo $KIND_SEAR_R[0];
	
	$kindOptionsArray = array();
	if($KIND_SEAR_R[0] == 1){
		array_push($kindOptionsArray, $KIND_SEAR_R[1]);
	} else if ($KIND_SEAR_R[0] > 1) {
		$kindOptionsArray = $KIND_SEAR_R[1];
	}
	//查詢產品規格選項;
	$SUBKIND_SEAR_R = SEL("SUBKIND_SEAR", "*", "PRODUCT_SUBKIND", "SEQ_NBR != 1 && SEQ_NBR != 2", "PRO_KIND desc, PRO_SUBKIND_LEV desc", $QUERY_limit_ARG = "");
	 //echo $SUBKIND_SEAR_R[0];
	$subkindOptionsArray = array();
	if($SUBKIND_SEAR_R[0] == 1){		
		array_push($subkindOptionsArray, $SUBKIND_SEAR_R[1]);
	} else if ($SUBKIND_SEAR_R[0] > 1) {
		$subkindOptionsArray = $SUBKIND_SEAR_R[1];
	}
	$subkindIndex = 0;
	foreach($subkindOptionsArray as $key => $val) {		
		$SUBKIND_SEAR_R_IND = SEL("SUBKIND_SEAR_KIND", "*", "PRODUCT_KIND", "SEQ_NBR = ".$val['PRO_KIND'], "", "", $QUERY_limit_ARG = "");
		$subkindOptionsArray[$subkindIndex]['NAME'] = $SUBKIND_SEAR_R_IND[1]['NAME'];
		$subkindIndex ++;
	}	
	//查詢運費等級選項;
	$TRANS_SEAR_R = SEL("TRANS_SEAR","*", "TRANS_DATA","SEQ_NBR != 1 && SEQ_NBR != 2", "TRANS_LEV asc", $QUERY_limit_ARG="");
	$transOptionsArray = array();
	if($TRANS_SEAR_R[0] == 1){		
		array_push($transOptionsArray, $TRANS_SEAR_R[1]);
	} else if ($TRANS_SEAR_R[0] > 1) {
		$transOptionsArray = $TRANS_SEAR_R[1];
	}	
$hicolor-> assign("delTab", $DEL_TAB);
$hicolor-> assign("urlAug", $URL_AUG);
$hicolor-> assign("pageNow", $PAGE_NOW);
$hicolor-> assign("pagination", $PAGE_DISPLAY);
$hicolor-> assign("productsList", $dataArray);
$hicolor-> assign("kindOptions", $kindOptionsArray);
$hicolor-> assign("subkindOptions", $subkindOptionsArray);
$hicolor-> assign("transOptions", $transOptionsArray);
$hicolor-> assign("pageTitle", "產品管理");
$hicolor-> assign("contentPath", "../templates/admin_products.tpl");
$hicolor-> display("standard_template.tpl");
?>