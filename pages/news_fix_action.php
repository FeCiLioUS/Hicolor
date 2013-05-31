<? 
define("ERRO_HEAD_URL","news_fix.php");
define("OK_HEAD_URL","admin_news.php");
define("PRVL_SN",0);
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor('admin');
//權限檢查;
LOGIN_PRVL_RESULT($Msg=urlencode("管理者尚未登入或沒有消息管理的管理權限！"));
//查詢是否登入;
$AD=ADMIN_LOGIN();
//修改資料處理;
//echo foreach_data($_POST);

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
   $Bgl_EndDate=(DATE_CHECK($_POST['Bgl_EndDate']));
}else{
   $Bgl_StartDate="\"\"";
   $Bgl_EndDate="\"\"";
}
//修改消息;
$UPDATE_NM = "NEWS_FIX";
$UPDATE_TABLES_NM = "NEWS_DATA";
$UPDATE_WHERE_ARG = "SEQ_NBR=".$_GET['SEQ_NUM'];
$UPDATE_DATA = "Caption=\"".$_POST['Caption']."\",Bgl_Contents=\"".$_POST['Bgl_Contents']."\",Bgl_time=".$_POST['Bgl_time'].",Bgl_StartDate=\"".$Bgl_StartDate."\",Bgl_EndDate=\"".$Bgl_EndDate."\",VINEWS=".$_POST['Bgl_vinews'].",UPD_ADMIN_NM=".$AD['LOGIN_ID'].",UPD_DT=".$CRTE_TIME;
$$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
if(!mysql_query($$UPDATE_NM, MyLink)){
   $Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
   ERRO_HEAD($Msg);
}else{
   $Msg=urlencode("資料修改成功！");
   OK_HEAD($Msg);
}
?>