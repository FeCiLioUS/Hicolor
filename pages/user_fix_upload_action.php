<?
//定義URL常數;
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
define("ERRO_HEAD_URL","user_fix_upload_files.php");
define("OK_HEAD_URL","user_upload_fix.php");
//define("OK_HEAD_URL","user_upload_files.php");
$hicolor= new Hicolor();
define("CRTE_TIME",$CRTE_TIME);
//查詢是否登入;
//查詢登入與否與登入者;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){    
    $Msg=urlencode("您尚未登入，請先登入會員！");
	if($_POST[Amount]){
		header("location:user_fix_upload_files.php?Msg=".$Msg."&SEQ=".$_POST[SEQ]."&Amount=".$_POST[Amount]);
	}
	exit();
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
    //查詢購物車;
	$CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");
    //echo $CHECK_BUYED_R[0];
	//核對購物車資料;
	$BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
	//echo $BUYED_DETAIL_R[0];
	if($BUYED_DETAIL_R[0]==0){
		$Msg=urlencode("尚無任何購物可供上傳！");
		//echo "尚無任何購物可供上傳！";
		//ERRO_HEAD($Msg);
	}else{		
		$dataArray = array();
		$dataNameArray = array();
		$dataExistArray = array();
		$uploadExistArray = array();
		$CHECK=0;
		if($BUYED_DETAIL_R[0]==1){
			array_push($dataArray, $BUYED_DETAIL_R[1]);
		}else{
			$dataArray= $BUYED_DETAIL_R[1];
		}
		foreach($dataArray as $KEY=>$VALUE){			
			if($VALUE[SEQ_NBR]==$_POST["SEQ"]){
				$CHECK=1;
			}
		}		
		if($CHECK==0){
			$Msg=urlencode("你上傳的檔案編號不在你的購物車內！");
			ERRO_HEAD($Msg);
		}
		//核對上傳資料;		
		$BUYED_UPLOAD_R=SEL("UPLOAD_DETAIL","*", "SALES_CAR_UPLOAD", "SALES_DETAIL_SEQ = ".$_POST["SEQ"], "SEQ_NBR asc", "");
		if($BUYED_UPLOAD_R[0]==1){
			array_push($uploadExistArray, $BUYED_UPLOAD_R[1]);
		} else {
			$uploadExistArray = $BUYED_UPLOAD_R[1];
		}
		foreach($uploadExistArray as $key => $value) {			
			array_push($dataNameArray, $value["FILE_NM"]);
		}
		foreach($_FILES as $KEY=>$VALUE){			
			if (in_array($VALUE['name'], $dataNameArray)) {
				array_push($dataExistArray, $VALUE['name']);				
			} else {
				array_push($dataNameArray, $VALUE['name']);
			}
		}		
		if(count($dataExistArray) > 0){
			$Msg = "你上傳的檔案名稱";
			foreach ($dataExistArray as $name) {
				$Msg = $Msg . "「".$name."」、";
			}
			$Msg = substr($Msg, 0, strlen($Msg) - 3);
			$Msg = $Msg . "己存在或重覆！";
			ERRO_HEAD(urlencode($Msg));
		}			
	}
	$mother=$LOG_PRVL.sprintf("%04d",$CHECK_BUYED_R[1][SEQ_NBR]);
	if(!is_dir("../updata/".$mother."/")){
		mkdir("../updata/".$mother."/", 0777);
	}
	if(!is_dir("../updata/".$mother."/".$_POST[SEQ]."/")){
		mkdir("../updata/".$mother."/".$_POST[SEQ]."/", 0777);
	}
	//更新資料庫檔案註記;
	$UPDATE_NM="upload_TAB";
	$UPDATE_TABLES_NM="SALES_CAR_DETAIL";
	$UPDATE_WHERE_ARG="SEQ_NBR=".$_POST[SEQ];
	$UPDATE_DATA="UPLOAD_TAB=1";
	$$UPDATE_NM="update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
	//資料檢查；
	$file_name="files_nm";//對應名稱;
	$upload_Name="file_upload";//上傳檔案名稱;
	$upload_Amount=$_POST[Amount];//上傳數量;
	$upload_mode="jpg,jpeg,psd,eps,cdr,ufo,doc,docx,xls,xlsx,ppt,pptx,pps,pdf,rar,zip,ai,indd,qxd,p65,bmp,gif,tif,txt";//上傳格式限制;
	$SAVE_NAME="file";//檔案儲存檔名;
	$uploae_mode=upload_date_check($upload_Amount,$file_name,$upload_Name,$upload_mode);//接收的檔案格式陣列;
	//查詢上傳資料表欄位;
	$QUERY_NM="UPLOAD_CHECK";
	$QUERY_SELECT_NM="*";
	$QUERY_TABLES_NM="SALES_CAR_UPLOAD";
	$TABLE=$QUERY_TABLES_NM;
	$FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;	
	//上傳資料寫入及拷貝;s
	$SAVE_KIND="DATA";//上傳功能名稱;
	$SAVE_ROUT="../updata/".$mother."/".$_POST[SEQ]."/";//上傳路徑;
	upload_action($file_name,$upload_Name,$upload_Amount,$SAVE_NAME,$uploae_mode,$FIELD_NM,$TABLE,$$UPDATE_NM,$SAVE_KIND,$SAVE_ROUT,$name_pass="pass",$buyer);
?>