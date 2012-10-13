<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "公司簡介");
$hicolor-> assign("contentPath", "../templates/about_company.tpl"); 
$hicolor-> display("standard_template.tpl");
?>