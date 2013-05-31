<?
header("Content-Type:text/html; charset=utf-8");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
//定義URL常數及變數;
define("ERRO_HEAD_URL","../pages/admin.php");
define("OK_HEAD_URL","../pages/admin_news.php");
ADMIN_LOG_CHECK();
?>