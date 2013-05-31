<?php
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//限制每頁筆數;
$MAX_NUM=5;
//依權限查詢資料;
if(LOGIN_PRVL() == 1) {
	if($_POST['Q_TAB'] == 1) {		
		if($_POST['KEYWORD'] != "") {
			if($_POST['year'] == ""){
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_POST['KEYWORD']."%\"";  
			}else{
				if($_POST['month'] == ""){
					$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_POST['KEYWORD']."%\" && (( Bgl_StartDate > \"".mktime(23,59,59,12,31,($_POST['year']-1))."\" &&  Bgl_StartDate < \"".mktime(0,0,0,1,1,($_POST['year']+1))."\" ) ||  ( Bgl_EndDate > \"".mktime(23,59,59,12,31,($_POST['year']-1))."\" && Bgl_EndDate < \"".mktime(0,0,0,1,1,($_POST['year']+1))."\" ))";  
				}else{
					$time_start = mktime(0,0,0,$_POST['month'],1,$_POST['year']);  
					$time_end = mktime(23,59,59,$_POST['month'],date("t",mktime(0,0,0,$_POST['month'],1,$_POST['year'])),$_POST['year']);
					$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_POST['KEYWORD']."%\" && (( Bgl_StartDate > \"".($time_start-1)."\" &&  Bgl_StartDate < \"".($time_end+1)."\" ) ||  ( Bgl_EndDate > \"".($time_start-1)."\" && Bgl_EndDate < \"".($time_end+1)."\" ))";  
				}
			}
		}else if($_POST['KEYWORD'] == ""){
			if($_POST['month'] == ""){
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && ( Bgl_StartDate > \"".mktime(23,59,59,12,31,($_POST['year']-1))."\" &&  Bgl_StartDate < \"".mktime(0,0,0,1,1,($_POST['year']+1))."\" ) ||  ( Bgl_EndDate > \"".mktime(23,59,59,12,31,($_POST['year']-1))."\" && Bgl_EndDate < \"".mktime(0,0,0,1,1,($_POST['year']+1))."\" )";  
			}else{
				$time_start = mktime(0,0,0,$_POST['month'],1,$_POST['year']);  
				$time_end = mktime(23,59,59,$_POST['month'],date("t",mktime(0,0,0,$_POST['month'],1,$_POST['year'])),$_POST['year']);
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && ( Bgl_StartDate > \"".($time_start-1)."\" &&  Bgl_StartDate < \"".($time_end+1)."\" ) ||  ( Bgl_EndDate > \"".($time_start-1)."\" && Bgl_EndDate < \"".($time_end+1)."\" )";
			}
		}   
	} else if($_GET['year'] || $_GET['month'] || $_GET['KEYWORD']) {
		if($_GET['KEYWORD'] != ""){		
			if($_GET['year'] == ""){
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_GET['KEYWORD']."%\"";  
			}else{
				if($_GET['month']==""){
					$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_GET['KEYWORD']."%\" && (( Bgl_StartDate > \"".mktime(23,59,59,12,31,($_GET['year']-1))."\" &&  Bgl_StartDate < \"".mktime(0,0,0,1,1,($_GET['year']+1))."\" ) ||  ( Bgl_EndDate > \"".mktime(23,59,59,12,31,($_GET['year']-1))."\" && Bgl_EndDate < \"".mktime(0,0,0,1,1,($_GET['year']+1))."\" ))";  
				}else{
					$time_start = mktime(0,0,0,$_GET['month'],1,$_GET['year']);  
					$time_end = mktime(23,59,59,$_GET['month'],date("t",mktime(0,0,0,$_GET['month'],1,$_GET['year'])),$_GET['year']);
					$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Caption like \"%".$_GET['KEYWORD']."%\" && (( Bgl_StartDate > \"".($time_start-1)."\" &&  Bgl_StartDate < \"".($time_end+1)."\" ) ||  ( Bgl_EndDate > \"".($time_start-1)."\" && Bgl_EndDate < \"".($time_end+1)."\" ))";  
				}
			}
		}else if($_GET['KEYWORD'] == "") {
			if($_GET['month'] == "") {
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && ( Bgl_StartDate > \"".mktime(23,59,59,12,31,($_GET['year']-1))."\" &&  Bgl_StartDate < \"".mktime(0,0,0,1,1,($_GET['year']+1))."\" ) ||  ( Bgl_EndDate > \"".mktime(23,59,59,12,31,($_GET['year']-1))."\" && Bgl_EndDate < \"".mktime(0,0,0,1,1,($_GET['year']+1))."\" )";  
			}else{
				$time_start = mktime(0,0,0,$_GET['month'],1,$_GET['year']);  
				$time_end = mktime(23,59,59,$_GET['month'],date("t",mktime(0,0,0,$_GET['month'],1,$_GET['year'])),$_GET['year']);
				$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && ( Bgl_StartDate > \"".($time_start-1)."\" &&  Bgl_StartDate < \"".($time_end+1)."\" ) ||  ( Bgl_EndDate > \"".($time_start-1)."\" && Bgl_EndDate < \"".($time_end+1)."\" )";
			}
		}
	}else if($_GET['MODE'] == "OVER") {
		$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && Bgl_time=1 && (Bgl_EndDate < ".$CRTE_TIME.")";   
	}else{
		$QUERY_WHERE_ARG = "(SEQ_NBR!=1 && SEQ_NBR!=2) && (Bgl_EndDate >".$CRTE_TIME." || Bgl_time = 0)";		
	}
} else {
	$Msg = urlencode("管理者尚未登入或沒有消息管理的管理權限！");
	ERRO_HEAD($Msg);
}
//判斷筆數;
$QUERY_NM = "NEWS_DATA_NM";
$QUERY_SELECT_NM = "*";
$QUERY_TABLES_NM = "NEWS_DATA";
$QUERY_WHERE_ARG = $QUERY_WHERE_ARG;//ADMIN_CONT = \"".$_POST[CONT]."\"
$QUERY_ORDER_ARG = "VINEWS desc,SEQ_NBR desc";//
$QUERY_limit_ARG = "";//"0,20"
$NEWS_DATA_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
//起始筆;
$START_NUM = START_NR($_GET[PAGE],$NEWS_DATA_NM_R[0],$MAX_NUM);
$PAGE_NOW = PAGE_NM($START_NUM,$MAX_NUM);
//頁數系統;
if($_POST['Q_TAB'] == 1){
	$URL_AUG = "&year=".$_POST['year']."&month=".$_POST['month']."&KEYWORD=".$_POST['KEYWORD'];	
}else if($_GET['year']){
	$URL_AUG = "&year=".$_GET['year']."&month=".$_GET['month']."&KEYWORD=".$_GET['KEYWORD'];
}
if($_GET['MODE'] == 'OVER') {
	$URL_AUG.= "&MODE=OVER";
}
$PAGE_DISPLAY = P_SYS($NEWS_DATA_NM_R[0], $MAX_NUM, $PAGE_NOW, $URL="admin_news.php", $URL_AUG);
//按頁數查詢;
$QUERY_NM = "NEWS";
$QUERY_SELECT_NM = "*";
$QUERY_TABLES_NM = "NEWS_DATA";
$QUERY_WHERE_ARG = $QUERY_WHERE_ARG;//ADMIN_CONT = \"".$_POST[CONT]."\"
$QUERY_ORDER_ARG = $QUERY_ORDER_ARG;//
$QUERY_limit_ARG = $START_NUM . "," . $MAX_NUM;//
$NEWS_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
$dataArray = array();
if ($NEWS_R[0] == 1) {
	array_push($dataArray, $NEWS_R[1]);
} else if ($NEWS_R[0] > 1) {
	$dataArray = $NEWS_R[1];
}
$i=0;
foreach($dataArray as $NEWS_R_SN => $NEWS_R_Value){
	$i++;
	if($NEWS_R_Value['Bgl_time'] == 0){
		$NEWS_DATE = "消息為期限永久";
	}else if($NEWS_R_Value['Bgl_time'] == 1){
		$NEWS_DATE = date("Y/m/d",$NEWS_R_Value['Bgl_StartDate'])."~".date("Y/m/d",$NEWS_R_Value['Bgl_EndDate']);
	}	
	if($NEWS_R_Value['UPLOAD_TAB'] == 1){
		$upload_tab = "ok_gray.jpg";
	}else if($NEWS_R_Value['UPLOAD_TAB'] == 0){
		$upload_tab = "no_gray.jpg";
	}	
	if($NEWS_R_Value['PHOTO_TAB'] == 0){
		$dataArray[$NEWS_R_SN]['newsPhotoData'] = null;
	}else if($NEWS_R_Value['PHOTO_TAB'] == 1){
		//查詢圖檔名稱;
		$QUERY_NM = "NEWS_PHOTO";
		$QUERY_SELECT_NM = "PHOTO_NM";
		$QUERY_TABLES_NM = "NEWS_PHOTO";
		$QUERY_WHERE_ARG = "NEWS_SEQ=".$NEWS_R_Value['SEQ_NBR'];
		$QUERY_ORDER_ARG = "";
		$QUERY_limit_ARG = "";
		$NEWS_PHOTO_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
		$dataArray[$NEWS_R_SN]['newsPhotoData'] = $NEWS_PHOTO_R[1];
	}
	$dataArray[$NEWS_R_SN]['NEWS_DATE'] = $NEWS_DATE;	
}
$hicolor-> assign("urlAug", $URL_AUG);
$hicolor-> assign("pageNow", $PAGE_NOW);
$hicolor-> assign("pagination", $PAGE_DISPLAY);
$hicolor-> assign("newsList", $dataArray);
$hicolor-> assign("pageTitle", "消息管理");
$hicolor-> assign("contentPath", "../templates/admin_news.tpl");
$hicolor-> display("standard_template.tpl");
?>