<? 
define("ERRO_HEAD_URL","news_fix.php");
define("OK_HEAD_URL","news_fix.php");
define("PRVL_SN", 0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//查詢登入與否與登入者;
$AD = ADMIN_LOGIN();
//依權限查詢資料;
LOGIN_PRVL_RESULT($Msg=urlencode("管理者尚未登入或沒有消息檔案上傳的權限！"));
//foreach_data($_GET);
//刪除檔案;
$DEL_NM="DEL_FILES";
$DEL_TABLES_NM="NEWS_UPLOAD";
$DEL_WHERE_FIELD="NEWS_SEQ";
$DEL_FILES_SEQ=$_GET['SEQ_NUM'];
$DEL_FILES_TAB_NM="NEWS_DATA";
$UPDATE_DATA="UPLOAD_TAB=0";
$pass_DEL="";
$file_rout="../news_file";
$Msg=DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD,$DEL_FILES_SEQ,$DEL_FILES_TAB_NM,$UPDATE_DATA,$pass_DEL,$file_rout);

if($Msg=="刪除成功！"){
   $Msg=urlencode("刪除成功！");
   OK_HEAD($Msg);	
}else{   
   $Msg=str_replace("-","和",$Msg);   
   $Msg=urlencode("管理者編號".$Msg."刪除失敗！");
   ERRO_HEAD($Msg);
}
?>
