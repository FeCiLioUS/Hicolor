<?
//定義URL常數及變數;
define("ERRO_HEAD_URL","PRO_SUBKIND_CLIP_Upload.php");
define("OK_HEAD_URL","PRO_SUBKIND_CLIP_Upload.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//權限檢查;
if (LOGIN_PRVL()==1) {
	if ($_GET['MODE'] == "DEL") {
	  //刪除刀模;
	  $DEL_NM = "DEL_CLIP";
	  $DEL_TABLES_NM = "PRO_SUBKIND_CLIP";
	  $DEL_WHERE_FIELD = "SUBKIND_SEQ";
	  $DEL_FILES_SEQ = $_GET['SEQ'];
	  $DEL_FILES_TAB_NM = "PRODUCT_SUBKIND";
	  $UPDATE_DATA = "CLIP_TAB = 0";
	  $pass_DEL = "";
	  $file_rout = "../subkind_clip";
	  $Msg = DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD,$DEL_FILES_SEQ,$DEL_FILES_TAB_NM,$UPDATE_DATA,$pass_DEL,$file_rout);
	  
		 if($Msg == "刪除成功！"){
			$Msg = urlencode("刪除成功！");
			header("location:product_subkind_info.php?Msg=".$Msg."&SEQ=".$_GET['SEQ']);
		 }else{   
			$Msg = str_replace("-","和",$Msg);   
			$Msg = urlencode("規格編號".$Msg."刪除失敗！");
			header("location:product_subkind_info.php?Msg=".$Msg."&SEQ=".$_GET['SEQ']);
		 }
	} else {
	  //更新資料庫檔案註記;
	  $UPDATE_NM = "pro_clip_upload_TAB";
	  $UPDATE_TABLES_NM = "PRODUCT_SUBKIND";
	  $UPDATE_WHERE_ARG = "SEQ_NBR=".$_POST['Bgl_Num'];
	  $UPDATE_DATA = "CLIP_TAB=1";
	  $$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
	 // echo $$UPDATE_NM."<br>";
	  //資料檢查；
	  $file_name = "Name";//對應名稱;
	  $upload_Name = "upload";//上傳檔案變變名稱;
	  $upload_Amount = $_POST['Amount'];//上傳數量;
	  $upload_mode = "jpg,jpeg,psd,eps,cdr,ufo,doc,docx,xls,xlsx,ppt,pptx,pps,pdf,rar,zip,ai,indd,qxd,p65,bmp,gif,tif,txt";//上傳格式限制;
	  $SAVE_NAME = "clip_file";//檔案儲存檔名;
	  $uploae_mode = upload_date_check($upload_Amount,$file_name,$upload_Name,$upload_mode);//接收的檔案格式陣列;
	 // echo $uploae_mode;
	  //查詢上傳資料表欄位;
	  $QUERY_NM = "CLIP_UPLOAD_CHECK";
	  $QUERY_SELECT_NM = "*";
	  $QUERY_TABLES_NM = "PRO_SUBKIND_CLIP";
	  $TABLE = $QUERY_TABLES_NM;
	  $FIELD_NM = TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;
	  //echo $FIELD_NM."<br>";
	  //上傳資料寫入及拷貝;s
	  $SAVE_KIND = "SUBKIND_CLIP";//上傳功能名稱;
	  $SAVE_ROUT = "../subkind_clip/";//上傳路徑;
	  upload_action($file_name,$upload_Name,$upload_Amount,$SAVE_NAME,$uploae_mode,$FIELD_NM,$TABLE,$$UPDATE_NM,$SAVE_KIND,$SAVE_ROUT, "", $hicolor-> loginInfo['LOGIN_ID']);
	}
} else {
    $Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}


?>
