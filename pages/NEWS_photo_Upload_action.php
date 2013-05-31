<?
//定義URL常數;
define("ERRO_HEAD_URL","NEWS_Photo_Upload.php");
define("OK_HEAD_URL","NEWS_Photo_Upload.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//查詢登入與否與登入者;
$AD = ADMIN_LOGIN();
//依權限查詢資料;
LOGIN_PRVL_RESULT($Msg = urlencode("管理者尚未登入或沒有消息檔案上傳的權限！"));

//更新資料庫檔案註記;
$UPDATE_NM = "NEWS_PHTO_TAB";
$UPDATE_TABLES_NM = "NEWS_DATA";
$UPDATE_WHERE_ARG = "SEQ_NBR=" . $_POST['Bgl_Num'];
$UPDATE_DATA = "PHOTO_TAB=1";
$$UPDATE_NM = "update " . $UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;
//資料檢查；
$file_name = "Name";//對應名稱;
$upload_Name = "upload";//上傳檔案變變名稱;
$upload_Amount = $_POST['Amount'];//上傳數量;
$upload_mode = "jpg,jpeg,bmp,gif";//上傳格式限制;
$SAVE_NAME = "photo";//檔案儲存檔名;
$uploae_mode = upload_date_check($upload_Amount,$file_name,$upload_Name,$upload_mode);//接收的檔案格式陣列;
//查詢上傳資料表欄位;
$QUERY_NM = "NEWS_PHOTO_CHECK";
$QUERY_SELECT_NM = "*";
$QUERY_TABLES_NM = "NEWS_PHOTO";
$TABLE = $QUERY_TABLES_NM;
$FIELD_NM = TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;
//上傳資料寫入及拷貝;s
$SAVE_KIND = "news";//上傳功能名稱;
$SAVE_ROUT = "../news_img/";//上傳路徑;
upload_action($file_name, $upload_Name, $upload_Amount, $SAVE_NAME, $uploae_mode, $FIELD_NM, $TABLE, $$UPDATE_NM, $SAVE_KIND, $SAVE_ROUT, "", $AD['LOGIN_ID']);
?>
