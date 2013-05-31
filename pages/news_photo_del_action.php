<? 
define("ERRO_HEAD_URL","admin_news.php");
define("OK_HEAD_URL","admin_news.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//查詢登入與否與登入者;
$AD = ADMIN_LOGIN();
//權限檢查;
LOGIN_PRVL_RESULT($Msg=urlencode("管理者尚未登入或沒有消息檔案上傳的權限！"));

//刪除圖檔;
$DEL_NM = "DEL_IMG";
$DEL_TABLES_NM = "NEWS_PHOTO";
$DEL_WHERE_FIELD = "NEWS_SEQ";
$DEL_FILES_SEQ = $_GET['FILES_SEQ'];
$DEL_FILES_TAB_NM = "NEWS_DATA";
$UPDATE_DATA = "PHOTO_TAB=0";
$pass_DEL = "";
$file_rout = "../news_img";
$Msg = DEL_ACTION($DEL_NM, $DEL_TABLES_NM, $DEL_WHERE_FIELD, $DEL_FILES_SEQ, $DEL_FILES_TAB_NM, $UPDATE_DATA, $pass_DEL, $file_rout);
if($Msg == "刪除成功！"){
   $Msg = urlencode("刪除成功！");
   OK_HEAD($Msg);	
}else{   
   $Msg = str_replace("-", "和", $Msg);   
   $Msg = urlencode("管理者編號" . $Msg . "刪除失敗！");
   ERRO_HEAD($Msg);
}
?>
