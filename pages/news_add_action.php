<?
define("ERRO_HEAD_URL","news_add.php");
define("OK_HEAD_URL","admin_news.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
LOGIN_PRVL_RESULT($Msg=urlencode("管理者尚未登入或沒有消息管理的管理權限！"));
//foreach_data($_POST);
$AD = ADMIN_LOGIN();
//判斷輸入與否與存入變數整理;
if($_POST['Caption']=="" || strlen($_POST['Caption'])<6){
    $Msg=urlencode("請輸入至少二個字以上的消息標題！");
    ERRO_HEAD($Msg);
}else if($_POST['Bgl_Contents']=="" || strlen($_POST['Bgl_Contents'])<6){
    $Msg=urlencode("請輸入至少二個字以上的消息內容！");
    ERRO_HEAD($Msg);
}else if($_POST['Bgl_time']==1 && ($_POST['Bgl_StartDate']=="" || $_POST['Bgl_EndDate']=="")){
    $Msg=urlencode("請輸入消息的公佈期限！");	
    ERRO_HEAD($Msg);
}else if($_POST['Bgl_time']==1 && DATE_CHECK($_POST['Bgl_StartDate'])>(DATE_CHECK($_POST['Bgl_EndDate']))){
    $Msg=urlencode("公佈起始日期不得大於截止日期！");	
    ERRO_HEAD($Msg);	
}

if($_POST['Bgl_time']==1){
   $Bgl_StartDate = DATE_CHECK($_POST['Bgl_StartDate']);   
   //echo $Bgl_StartDate. '<br>';
   //echo $CRTE_TIME;
   $Bgl_EndDate=(DATE_CHECK($_POST['Bgl_EndDate']));
}else{
   $Bgl_StartDate="\"\"";
   $Bgl_EndDate="\"\"";
}

//寫入資料庫;
   //查資料庫欄位;
   $QUERY_NM="NEWS_DATA_CHECK";
   $QUERY_SELECT_NM="*";
   $QUERY_TABLES_NM="NEWS_DATA";
   $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改; 
   //echo $FIELD_NM."<br>";
   $TABLE="NEWS_DATA";	
   $FIELD_Value="\"".$_POST['Caption']."\",\"".$_POST['Bgl_Contents']."\",".$_POST['Bgl_time'].",".$Bgl_StartDate.",".$Bgl_EndDate.",".$_POST['Bgl_vinews'].",0,0,".$AD['LOGIN_ID'].",\"\",".$CRTE_TIME.",\"\"";
   //寫入;
   insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="", "");
?>
