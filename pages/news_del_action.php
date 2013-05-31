<?
define("ERRO_HEAD_URL","admin_news.php");
define("OK_HEAD_URL","admin_news.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
if(LOGIN_PRVL()!=1){
    $Msg=urlencode("你的權限無法刪除消息！");
    ERRO_HEAD($Msg);
} else {
	//刪除消息;
	$DEL_NM="DEL_NEWS";
	$DEL_TABLES_NM="NEWS_DATA";
	$Msg = DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="");	
	if($Msg=="刪除成功！"){
	   $Msg=urlencode("刪除成功！");
	   OK_HEAD($Msg);
	}else{   
	   $Msg=str_replace("-","和",$Msg);   
	   $Msg=urlencode("消息編號".$Msg."刪除失敗！");
	   ERRO_HEAD($Msg);
	}
}
?>
