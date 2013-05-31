<? 
define("ERRO_HEAD_URL","news_add.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
LOGIN_PRVL_RESULT($Msg=urlencode("你的權限無法新增消息！"));
//列印檢查;
$Bgl_time_tab1 = false;
if($_GET['Bgl_time'] === "1"){
	$hicolor-> assign("Bgl_time_tab1", "");
	$hicolor-> assign("Bgl_time_tab2", "checked=\"checked\"");
} else if($_GET['Bgl_time'] === "0"){
	$Bgl_time_tab1 = true;
	$hicolor-> assign("Bgl_time_tab1", "checked=\"checked\"");
	$hicolor-> assign("Bgl_time_tab2", "");
} else {
	$hicolor-> assign("Bgl_time_tab1", "");
	$hicolor-> assign("Bgl_time_tab2", "checked=\"checked\"");
}

if($_GET['Bgl_StartDate']){
	if($Bgl_time_tab1 != true){
	   $Bgl_StartDate = $_GET['Bgl_StartDate'];
	} 
}else{
   if($Bgl_time_tab1 != true){	
       $Bgl_StartDate = date("Y/m/d");	   
   }
}
$hicolor-> assign("Bgl_StartDate", $Bgl_StartDate);
if($_GET['Bgl_EndDate']){
   if($Bgl_time_tab1 != true){
       $Bgl_EndDate = $_GET['Bgl_EndDate'];
   }
}else{
   if($Bgl_time_tab1 != true){
       $Bgl_EndDate = date("Y/m/d", mktime(0, 0, 0, date("m"), date("d"), date("Y")) + 86400);
   }
}
$hicolor-> assign("Bgl_EndDate", $Bgl_EndDate);
$hicolor-> assign("pageTitle", "新增消息");
$hicolor-> assign("contentPath", "../templates/news_add.tpl");
$hicolor-> display("standard_template.tpl");
?>
