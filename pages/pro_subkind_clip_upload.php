<?
//定義URL常數及變數;
define("ERRO_HEAD_URL","admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');
//權限檢查;
if(LOGIN_PRVL()==1){    
}else{
    $Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}
$hicolor-> assign("pageTitle", "上傳刀模");
$hicolor-> assign("contentPath", "../templates/product_subkind_clip_upload.tpl");
$hicolor-> display("popup_template.tpl");
?>