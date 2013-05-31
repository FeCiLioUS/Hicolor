<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "客服中心");
$hicolor-> assign("contentPath", "../templates/contact.tpl"); 
$hicolor-> display("standard_template.tpl");
?>