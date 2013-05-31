<?
define("ERRO_HEAD_URL","admin_news.php");
define("OK_HEAD_URL","admin_news.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
if(LOGIN_PRVL() != 1){
   $Msg=urlencode("管理者尚未登入或沒有消息管理的管理權限！");
   ERRO_HEAD($Msg);
} else {
	//查詢修改編號內容;
   $QUERY_NM = "NEWS_fix_NM";
   $QUERY_SELECT_NM = "*";
   $QUERY_TABLES_NM = "NEWS_DATA";
   $QUERY_WHERE_ARG = "SEQ_NBR=" . $_GET['SEQ_NUM'];
   $QUERY_ORDER_ARG = "";
   $QUERY_limit_ARG = "";
   $NEWS_fix_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG); 
   if($NEWS_fix_NM_R[1]['UPLOAD_TAB'] == 1){
       $upload_lis = "<span class=\"info\">己有上傳的檔案，我要刪除它	<INPUT style=\"FONT-SIZE: 9pt; WIDTH: 90px; HEIGHT: 22px\" onclick=\"DELUploadForm();\" type=\"button\" value=\"刪除上傳物件\" name=\"upload_b\"></span>";
   }else if($NEWS_fix_NM_R[1]['UPLOAD_TAB'] == 0){
       $upload_lis = "<span class=\"info\">請先設定物件上傳的件數：<INPUT style=\"FONT-SIZE: 9pt; WIDTH: 30px; HEIGHT: 18px\" maxLength=2 value=1 name=\"Amount\">件<INPUT type=\"hidden\" value=\"".$_GET[SEQ_NUM]."\" name=\"Bgl_Num\"><INPUT name=\"upload_b\" type=\"button\" style=\"FONT-SIZE: 9pt; WIDTH: 90px; HEIGHT: 22px\" onclick=\"SetUploadForm();\" value=\"新增上傳物件\"></span>";
   }
    
	//回最新消息的參數;
	foreach($_GET as $KEY=>$VALUE){
		if($KEY != "Msg"){
			$URL_ARG = $URL_ARG . "&" . $KEY . "=" . $VALUE;
		}      
	}
	$URL_ARG = substr($URL_ARG, 1, (strlen($URL_ARG)-1));
	
	$hicolor-> assign("urlAug", $URL_ARG);
	$hicolor-> assign("newData", $NEWS_fix_NM_R[1]);
	$hicolor-> assign("pageTitle", "修改消息");
	$hicolor-> assign("contentPath", "../templates/news_fix.tpl");
	$hicolor-> display("standard_template.tpl");
}
?>