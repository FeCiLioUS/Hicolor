<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "會員權利和義務");
$hicolor-> assign("contentPath", "../templates/interest.tpl"); 
$hicolor-> display("standard_template.tpl");
?>