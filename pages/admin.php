<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin', true);
$hicolor-> assign("pageTitle", "管理系統");
$hicolor-> assign("contentPath", "../templates/admin.tpl");
$hicolor-> display("standard_template.tpl");
?>