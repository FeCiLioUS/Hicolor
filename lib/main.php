<?php
/*
if(eregi("MSIE 7.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 6.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 5.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 4.0",$_SERVER["HTTP_USER_AGENT"])){
}else{
  echo $_SERVER["HTTP_USER_AGENT"];
}*/
$__DIR__= dirname(__FILE__);
//引入no-catch程式;
include($__DIR__."/../lib/no-cache.php");
//引入資料庫連結程式，並回傳狀態;
require_once($__DIR__."/../lib/link.php");
//載入functin;
require_once ($__DIR__."/../lib/data_class.php");

require_once ($__DIR__."/../lib/page_class.php");
//載入變數定義檔;
require_once ($__DIR__."/../lib/variable.php");
//檢查變數合法;
check(urlencode("您輸入的字元有含非法的字元！"));
$_POST=slashes();
?>
