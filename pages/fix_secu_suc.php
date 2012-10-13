<? 
//定義URL常數;
define("ERRO_HEAD_URL","about.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
    $Msg=urlencode("會員尚未登入或已登出！");
    ERRO_HEAD($Msg);
}
$hicolor-> assign("pageTitle", "修改密碼");
$hicolor-> assign("contentPath", "../templates/fix_secu_suc.tpl"); 
$hicolor-> display("standard_template.tpl");
?>
