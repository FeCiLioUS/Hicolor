<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "友站連結");
$hicolor-> assign("contentPath", "../templates/link.tpl"); 
$hicolor-> display("standard_template.tpl");
?>