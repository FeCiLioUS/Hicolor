<?php
/*
if(eregi("MSIE 7.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 6.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 5.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 4.0",$_SERVER["HTTP_USER_AGENT"])){
}else{
  echo $_SERVER["HTTP_USER_AGENT"];
}*/
$__DIR__= dirname(__FILE__);
//引入no-catch程式;
include($__DIR__."/../library/no-cache.php");
//引入資料庫連結程式，並回傳狀態;
require_once($__DIR__."/../library/link.php");
//載入functin;
require_once ($__DIR__."/../library/data_class.php");

require_once ($__DIR__."/../library/page_class.php");
//載入變數定義檔;
require_once ($__DIR__."/../library/variable.php");
//檢查變數合法;
check(urlencode("您輸入的字元有含非法的字元！"));
$_POST=slashes();
?>
