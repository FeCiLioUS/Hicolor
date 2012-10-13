<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "製作規則");
$hicolor-> assign("contentPath", "../templates/files_mo.tpl"); 
$hicolor-> display("standard_template.tpl");
?>