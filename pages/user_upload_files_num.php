<?
//定義URL常數;
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
define("CRTE_TIME",$CRTE_TIME);
//查詢是否登入;
//查詢登入與否與登入者;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){    
    $Msg=urlencode("您尚未登入，請先登入會員！");
    ERRO_HEAD($Msg);
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
$hicolor-> assign('seq', $_GET[seq]);
$hicolor-> assign('mbr', $_GET[mbr]);
$hicolor-> assign('pageTitle', '上傳檔案');
$hicolor-> assign("contentPath", "../templates/user_upload_files_num.tpl");
$hicolor-> display("popup_template.tpl");
?>