<? 
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
//定義URL常數及變數;
define("ERRO_HEAD_URL","../pages/admin.php");
define("OK_HEAD_URL","../pages/admin.php");
define("UPTIME_TIME", time());
//修改管理者;
$UPDATE_NM = "ADMIN_LOGOUT";
$UPDATE_TABLES_NM = "ADMIN_COOKIE";
$UPDATE_WHERE_ARG = "COOKIE_VAL=\"".$_COOKIE["ADMIN_COOKIE"]."\"";
$UPDATE_DATA = "LOG_OUT=" . UPTIME_TIME;
$$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
if(!mysql_query($$UPDATE_NM, MyLink)){
   $Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
   ERRO_HEAD($Msg);
}else{
   $Msg=urlencode("管理者登出成功！");
   //清除cookies值;
   	//setcookie("ADMIN_COOKIE","",0,"/",".hicolor.tw"); 
	//setcookie("ADMIN_COOKIE","",0,"/",".hicolor.com.tw"); 
   setcookie("ADMIN_COOKIE","",0,"/",".localhost"); 
   //setcookie("ADMIN_COOKIE",""); 
   OK_HEAD($Msg);
}
?>
