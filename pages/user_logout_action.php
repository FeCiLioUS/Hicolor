<?php
//定義URL常數及變數;
$orgURL= explode("?", $_SERVER["HTTP_REFERER"]);
define("ERRO_HEAD_URL",$orgURL[0]);
define("OK_HEAD_URL",$orgURL[0]);
define("UPTIME_TIME",time());
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
include($__DIR__."/../library/main.php");
USER_LOG_OUT();
?>
