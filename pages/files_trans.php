<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "傳檔方式");
$hicolor-> assign("contentPath", "../templates/files_trans.tpl"); 
$hicolor-> display("standard_template.tpl");
?>