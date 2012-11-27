<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "最新消息");
$hicolor-> assign("contentPath", "../templates/about.tpl"); 
$hicolor-> display("standard_template.tpl");
?>