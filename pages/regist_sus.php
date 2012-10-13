<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "會員註冊");
$hicolor-> assign("contentPath", "../templates/regist_sus.tpl"); 
$hicolor-> display("standard_template.tpl");
?>