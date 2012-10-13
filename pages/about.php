<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "最新消息");
//限制每頁筆數;
$MAX_NUM=5;
//查詢筆數;
$QUERY_NM="NEWS_DATA";
$QUERY_SELECT_NM="*";
$QUERY_TABLES_NM="NEWS_DATA";
$QUERY_WHERE_ARG="Bgl_time= 0 || ( Bgl_time = 1 and (Bgl_StartDate <= ".$CRTE_TIME." and Bgl_EndDate >= ".$CRTE_TIME.") )";//ADMIN_CONT = \"".$_POST[CONT]."\"
$QUERY_ORDER_ARG="VINEWS desc,Bgl_time asc,Bgl_StartDate asc,SEQ_NBR desc";
$QUERY_limit_ARG="";//"0,20"
$NEWS_DATA_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
//起始筆;
$START_NUM=START_NR($_GET[PAGE],$NEWS_DATA_R[0],$MAX_NUM);   
$PAGE_NOW=PAGE_NM($START_NUM,$MAX_NUM);  
//頁數系統;
$PAGE_DISPLAY=P_SYS($NEWS_DATA_R[0],$MAX_NUM,$PAGE_NOW,$URL="about.php",$URL_AUG="");
//按頁數查詢;
$QUERY_NM="NEWS_DATA_Q";
$QUERY_SELECT_NM="*";
$QUERY_TABLES_NM="NEWS_DATA";
$QUERY_WHERE_ARG=$QUERY_WHERE_ARG;//ADMIN_CONT = \"".$_POST[CONT]."\"
$QUERY_ORDER_ARG=$QUERY_ORDER_ARG;//
$QUERY_limit_ARG=$START_NUM.",".$MAX_NUM;//
$NEWS_DATA_Q_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG); 

$hicolor-> assign("newsData", $NEWS_DATA_R[0]);
function getUpload($sn){
	//查詢檔案名稱;
	$NEWS_upload_R=SEL("NEWS_UPLOAD","*","NEWS_UPLOAD","NEWS_SEQ = ".$sn,"",""); 
	$newsUpload= array();
	if($NEWS_upload_R[0]==1){
		array_push($newsUpload, $NEWS_upload_R[1]);		
	}else if($NEWS_upload_R[0]>1){
		$newsUpload= $NEWS_upload_R[1];	
	}
	return $newsUpload;
}
function getPhoto($sn){
	//查詢檔案名稱;	
	$NEWS_PHOTO_R=SEL("NEWS_PHOTO","*","NEWS_PHOTO","NEWS_SEQ = ".$sn,"",""); 
	$newsPhoto= array();
	if($NEWS_PHOTO_R[0]==1){
		array_push($newsPhoto, $NEWS_PHOTO_R[1]);		
	}else if($NEWS_PHOTO_R[0]>1){
		$newsPhoto= $NEWS_PHOTO_R[1];
	}		
	return $newsPhoto;
}
if($NEWS_DATA_R[0] > 0){
	$newsDataArr= array();
	if($NEWS_DATA_Q_R[0] == 1){		
		if($NEWS_DATA_Q_R[1][UPLOAD_TAB]==1){			
			$NEWS_DATA_Q_R[1][UPLOAD_DATA]= getUpload($NEWS_DATA_Q_R[1][SEQ_NBR]);
		}		
		if($NEWS_DATA_Q_R[1][PHOTO_TAB]==1){
			//查詢檔案名稱;				
			$NEWS_DATA_Q_R[1][PHOTO_DATA]= getUpload($NEWS_DATA_Q_R[1][SEQ_NBR]);	
		}
		array_push($newsDataArr, $NEWS_DATA_Q_R[1]);
	}else if($NEWS_DATA_Q_R[0]>1){		
		for($i=0; $i < count($NEWS_DATA_Q_R[1]); $i++){					
			if($NEWS_DATA_Q_R[1][$i][UPLOAD_TAB]==1){ 			
				$NEWS_DATA_Q_R[1][$i][UPLOAD_DATA]= getUpload($NEWS_DATA_Q_R[1][$i][SEQ_NBR]);				
			}			
			if($NEWS_DATA_Q_R[1][$i][PHOTO_TAB]==1){
				//查詢檔案名稱;				
				$NEWS_DATA_Q_R[1][$i][PHOTO_DATA]= getUpload($NEWS_DATA_Q_R[1][$i][SEQ_NBR]);	
			}
		}		
		$newsDataArr= $NEWS_DATA_Q_R[1];		
	}
	$hicolor-> assign("newsList", $newsDataArr);
}
if(isset($_GET[PAGE])){
	$add= ($_GET[PAGE]-1) * $MAX_NUM;
}else{
	$add= 0;
}
$hicolor-> assign("addCont", $add);
$hicolor-> assign("pagination", $PAGE_DISPLAY);
$hicolor-> assign("contentPath", "../templates/about.tpl"); 
$hicolor-> display("standard_template.tpl");
?>