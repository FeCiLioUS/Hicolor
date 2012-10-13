<?
define("ERRO_HEAD_URL","arri.php");
define("OK_HEAD_URL","sales_car.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
//echo $buyer;
if($LOGIN_OBJ["LOG_TAB"]!=1){
    $Msg=urlencode("您尚未登入，請先登入會員！");
    ERRO_HEAD($Msg);
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//判斷是否為續購;
$CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");
if($CHECK_BUYED_R[0]==1){
   $UPDATE_NM="ADD_BUY";
   $UPDATE_TABLES_NM="SALES_CAR";
   $UPDATE_WHERE_ARG="SEQ_NBR=".$CHECK_BUYED_R[1][SEQ_NBR];
   $UPDATE_DATA="UPD_DT = ".$CRTE_TIME;
   $$UPDATE_NM="update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
   if(!mysql_query($$UPDATE_NM, MyLink)){
	  $Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
	  ERRO_HEAD($Msg);
   }else{
	  //加入一筆購物;
	  //查資料庫欄位;
	  $QUERY_NM="SALES_CAR_DETAIL_Q";
	  $QUERY_SELECT_NM="*";
	  $QUERY_TABLES_NM="SALES_CAR_DETAIL";
	  $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改; 
	  //echo $FIELD_NM."<br>";
	  $TABLE="SALES_CAR_DETAIL";	
	  $FIELD_Value=$CHECK_BUYED_R[1][SEQ_NBR].",".$_GET[BUY_SEQ].",0,".$CRTE_TIME.",\"\"";
	  //echo $FIELD_Value."<br>";
	  //寫入;
	  insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="");
   }
}else if($CHECK_BUYED_R[0]==0){
	//寫入資料庫;
	//查資料庫欄位;
   $QUERY_NM="SALES_CAR_Q";
   $QUERY_SELECT_NM="*";
   $QUERY_TABLES_NM="SALES_CAR";
   $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;   
   $TABLE="SALES_CAR";	
   $FIELD_Value="\"".$LOG_PRVL."\",".$buyer.",0,0,0,\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",0,\"\",0,\"\",0,\"\",0,\"\",0,\"\",\"\",0,".$CRTE_TIME.",\"\"";
   //寫入;
   $INSER_R=insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="",$brea="PASS");   
   if($INSER_R=="OK"){
	   //判斷本次訂單編號;
	   $BUYED_SN_R=SEL("BUY_SN","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");	  
	   //加入一筆購物;
	   //查資料庫欄位;
	   $QUERY_NM="SALES_CAR_DETAIL_Q";
	   $QUERY_SELECT_NM="*";
	   $QUERY_TABLES_NM="SALES_CAR_DETAIL";
	   $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改; 
	   $TABLE="SALES_CAR_DETAIL";	
	   $FIELD_Value=$BUYED_SN_R[1][SEQ_NBR].",".$_GET[BUY_SEQ].",0,".$CRTE_TIME.",NULL";	   
	   //寫入;
	   insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="");
   }else{
	  $Msg=urlencode("新增購物失敗！請與我們銧彩聯絡，我們會儘速幫助您購物！謝謝！");
	  ERRO_HEAD($Msg);	
   }
}
?>

