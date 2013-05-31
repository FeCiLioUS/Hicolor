<? 
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "最新消息附加檔");
$hicolor-> assign("contentPath", "../templates/NEWS_OPEN_FILES.tpl");
$hicolor-> display("popup_template.tpl");
?>