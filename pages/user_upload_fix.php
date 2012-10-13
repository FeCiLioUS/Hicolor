<?
//定義URL常數;
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
define("CRTE_TIME",$CRTE_TIME);
//查詢登入與否與登入者;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
	$hicolor-> assign('Msg',"您尚未登入，請先登入會員！");
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//查詢購物車;
$CHECK_BUYED_R= SEL("BUY_CHECK", "*", "SALES_CAR", "BUYER = ".$buyer." && FINISH_TAB = 0", "", "");
//核對購物車資料;
$BUYED_DETAIL_R= SEL("BUY_DETAIL", "*", "SALES_CAR_DETAIL", "SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR], "SEQ_NBR asc", "");
$CHECK=0;
$result= array();
$detailResult= array();
if($BUYED_DETAIL_R[0]==0){
	$Msg="尚無任何上傳的檔案可供修改！";
	//$hicolor-> assign('Msg', $Msg);
}else{	
	if($BUYED_DETAIL_R[0]==1){
		array_push($result, $BUYED_DETAIL_R[1]);
	}else{
		$result= $BUYED_DETAIL_R[1];
	}	
	foreach($result as $KEY=>$VALUE){
		if($VALUE[SEQ_NBR] == $_GET[seq]){
			if($VALUE[UPLOAD_TAB]==0){				
				$CHECK=0;				
			}if($VALUE[UPLOAD_TAB]==1){
				$CHECK=1;
				// echo $VALUE[SEQ_NBR];
				$BUYED_DETAIL_UP_R= SEL("BUYED_DETAIL_UP","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE[SEQ_NBR],"SEQ_NBR asc","");
				//echo $BUYED_DETAIL_UP_R[0];
				if($BUYED_DETAIL_UP_R[0] > 0){					
					if($BUYED_DETAIL_UP_R[0] == 1){
						array_push($detailResult, $BUYED_DETAIL_UP_R[1]);
					}else{
						$detailResult= $BUYED_DETAIL_UP_R[1];
					}
				}
			}
		}
	}
	if($CHECK == 0){		
		$Msg="尚無任何上傳的檔案可供修改！";
		//$hicolor-> assign('Msg', $Msg);
	}
}
$hicolor-> assign('seq', $_GET["seq"]);
$hicolor-> assign('mbr', $_GET["mbr"]);
$hicolor-> assign('rowData', $detailResult);
$hicolor-> assign('pageTitle', '上傳檔案');
$hicolor-> assign("contentPath", "../templates/user_upload_fix.tpl");
$hicolor-> display("popup_template.tpl");
?>