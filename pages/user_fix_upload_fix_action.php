<? 
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
//定義URL常數;
define("ERRO_HEAD_URL","user_upload_fix.php");
define("OK_HEAD_URL","user_upload_fix.php");
define("CRTE_TIME",$CRTE_TIME);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
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
//echo $BUYED_DETAIL_R[0];
$CHECK=0;
$result= array();
$detailResult= array();
if($BUYED_DETAIL_R[0]==0){
	$Msg=urlencode("尚無任何購物可供刪除或修改！");
	ERRO_HEAD($Msg);
}else{
	if($BUYED_DETAIL_R[0]==1){
		array_push($result, $BUYED_DETAIL_R[1]);
	}else{
		$result= $BUYED_DETAIL_R[1];
	}
	foreach($result as $KEY=>$VALUE){
		//echo $VALUE[SEQ_NBR]."==".$_GET[seq];
		if($VALUE["SEQ_NBR"]==$_POST[SEQ]){
			$CHECK=1;
			$OK_SEQ=$VALUE["SEQ_NBR"];
		}
	}
	
	if($CHECK==0){
		$Msg=urlencode("你刪除或修改的購物內容沒有在你的購物車內！");
		ERRO_HEAD($Msg);
	}else{
		if($_REQUEST["del_sub"]){			
			//核對上傳物件是否與刪除物件一樣;
			$BUYED_upload_R=SEL("BUY_UPLOAD","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$OK_SEQ,"SEQ_NBR asc","");
			if($BUYED_upload_R[0]==0){
				$Msg=urlencode("你刪的購物內容沒有在你的購物車內！");
				ERRO_HEAD($Msg);
			}else{
				$uploadData= array();
				if($BUYED_upload_R[0]==1){
					array_push($uploadData, $BUYED_upload_R[1]);
				}else{
					$uploadData= $BUYED_upload_R[1];
				}
				foreach($_REQUEST["del_sub"] as $KEY=>$VALUE){
					$CHECK=0;
					foreach($uploadData as $KEY2=>$VALUE2){
						// echo $VALUE2[SEQ_NBR]."<br>";
						if($VALUE==$VALUE2["SEQ_NBR"]){
							// echo $VALUE."==".$VALUE2[SEQ_NBR]."<br>";
							$CHECK=1;
						}
					}					
					//echo  $CHECK;
					if($CHECK==0){
						$Msg=urlencode("你刪的購物內容沒有在你的購物車內！");
						ERRO_HEAD($Msg);
					}
				}
			}
		}
	}
}
//刪除附加檔;
$DEL_NM="DEL_FILES";
$DEL_TABLES_NM="SALES_CAR_UPLOAD";
$DEL_WHERE_FIELD="SALES_DETAIL_SEQ";
$DEL_FILES_SEQ=$_POST["SEQ"];
$DEL_FILES_TAB_NM="SALES_CAR_DETAIL";
$UPDATE_DATA="UPLOAD_TAB=0";
$pass_DEL="";
$FILES_ROUT_SEAR_R=SEL("FILES_ROUT_SEAR", "*", "SALES_CAR_DETAIL", "SEQ_NBR = ".$_POST["SEQ"], "", "");
$ROUT=$LOG_PRVL.sprintf("%04d", $FILES_ROUT_SEAR_R[1]["SALES_SEQ"]);
$file_rout="../updata/".$ROUT."/".$_POST[SEQ];
//echo $file_rout;
//foreach_data($_GET);
//foreach_data($_POST);
if($_POST[MODE]=="DEL"){
	$Msg=DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="",$file_rout);
	//查看是否全部刪完;
	$FILES_SEAR_R=SEL("FILES_SEAR", "SEQ_NBR", "SALES_CAR_UPLOAD", "SALES_DETAIL_SEQ = ".$FILES_ROUT_SEAR_R[1][SEQ_NBR], "", "");
	//echo $FILES_SEAR_R[0];
	$empty= false;
	if($FILES_SEAR_R[0]==0){
		rmdir($file_rout);
		$empty= true;
		$upload_detail="update SALES_CAR_DETAIL set UPLOAD_TAB=0 where SEQ_NBR = ".$FILES_ROUT_SEAR_R[1]["SEQ_NBR"];
		if(!mysql_query($upload_detail, MyLink)){
			$Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
			ERRO_HEAD($Msg);
		}	
	}
	if($Msg=="刪除成功！"){
		$Msg=urlencode("刪除成功！");
		if($empty){
			$Msg=urlencode("全部附件刪除完畢！");
		}		
		OK_HEAD($Msg);
	}else{   
		$Msg=str_replace("-","和",$Msg);   
		$Msg=urlencode("產品編號".$Msg."刪除失敗！");
		ERRO_HEAD($Msg);
	}
}else if($_POST[MODE]=="FIX") {
	//調出上傳檔案的編號;
	$FILES_upload_SEAR_R=SEL("FILES_upload_SEAR","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ  = ".$_POST["SEQ"],"","");
	if($FILES_upload_SEAR_R[0]==0){
		$Msg=urlencode("你修改的購物內容沒有在你的購物車內！");
		ERRO_HEAD($Msg);
	}
	$filesUploadData= array();
	if($FILES_upload_SEAR_R[0] == 1){
		array_push($filesUploadData, $FILES_upload_SEAR_R[1]);
	}else{
		$filesUploadData= $FILES_upload_SEAR_R[1];
	}
	//原資料內容;
	$f=0;
	foreach($_REQUEST["SEQ_NBR"] as $KEY=>$VALUE){
		$f++;		
		$CHECK=0;
		foreach($filesUploadData as $KEY2=>$VALUE2){
			if($VALUE==$VALUE2["SEQ_NBR"]){
				$files_NICK="files_nm".$f;
				//echo $VALUE2[SEQ_NBR]."==".$VALUE."<br>";
				$UPDATE_NM="update SALES_CAR_UPLOAD set FILE_NICK = \"".$$files_NICK."\" where SEQ_NBR=".$VALUE;
				if(!mysql_query($UPDATE_NM, MyLink)){
					$Msg=urlencode("資料修改失敗！");
					$result_errro=$result."和".sprintf("$04d".$VALUE);
				}else{
					$Msg=urlencode("資料修改成功！");
				}
				//echo $UPDATE_NM."<br>";
				$CHECK=1;
			}
		}
		if($CHECK==0){
			$Msg=urlencode("你修改的購物內容沒有在你的購物車內！");
			ERRO_HEAD($Msg);
		}
	}
	$result_errro=substr($result_errro,3,strlen($result_errro)-3);
	if($result_errro){
		ERRO_HEAD("產品編號".$result_errro."，".$Msg);
	}else{
		OK_HEAD($Msg);
	}
}
?>
