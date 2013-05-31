<?
define("ERRO_HEAD_URL","NEWS_Photo_Upload.php");
define("OK_HEAD_URL","NEWS_Photo_Upload.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
LOGIN_PRVL_RESULT($Msg=urlencode("管理者尚未登入或沒有消息檔案上傳的權限！"));
$hicolor-> assign("pageTitle", "上傳檔案");
$hicolor-> assign("contentPath", "../templates/NEWS_Photo_Upload.tpl");
$hicolor-> display("popup_template.tpl");
?>