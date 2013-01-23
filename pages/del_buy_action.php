<? 
define("ERRO_HEAD_URL","about.php");
define("OK_HEAD_URL","sales_car.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
    $Msg=urlencode("您尚未登入，請先登入會員！");
    ERRO_HEAD($Msg);
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];

//查詢購物車;
   $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");
//核對購物車資料;
   $BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
   if($BUYED_DETAIL_R[0]==0){
      $Msg=urlencode("尚無任何購物可供刪除！");
	  ERRO_HEAD($Msg);
   }else if($BUYED_DETAIL_R[0]==1){
       $CHECK=0;
	   if($BUYED_DETAIL_R[1][SEQ_NBR]==$_REQUEST[del_sub][1]){
			$CHECK=1;
	   }
   }else if($BUYED_DETAIL_R[0]>1){
        foreach($_REQUEST[del_sub] as $KEY=>$VALUE){
		    $CHECK=0;
			//echo $VALUE."<br>";
			foreach($BUYED_DETAIL_R[1] as $KEY2=>$VALUE2){			  
			  //echo $VALUE2[SEQ_NBR]."<br>";
			  if($VALUE==$VALUE2[SEQ_NBR]){
			      $CHECK=1;
			  }
		    }
		   if($CHECK==0){
               $Msg=urlencode("你刪的購物內容沒有在你的購物車內！");
	           ERRO_HEAD($Msg);
		   }
	   }
   }


//刪除購買;
$DEL_NM="DEL_BUY";
$DEL_TABLES_NM="SALES_CAR_DETAIL";
$Msg=DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="");

//查詢是否全部刪完;
$BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
if($BUYED_DETAIL_R[0]==0){
   //刪除購買;
   $DEL_CAR="delete from SALES_CAR where SEQ_NBR =".$CHECK_BUYED_R[1][SEQ_NBR];
   if(!mysql_query($DEL_CAR, MyLink)){
	  $Msg="刪除失敗！";
   }else{
	  $Msg="刪除成功！";
   }
}

foreach($_REQUEST[del_sub] as $KEY=>$VALUE){
	//echo $VALUE."<br>";
   //刪除上傳註記;
   $BUYED_UPDATE_R=SEL("BUYED_UPDATE","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE,"","");
   //echo $BUYED_UPDATE_R[0];
   unset($_REQUEST[del_sub]);
   if($BUYED_UPDATE_R[0]==0){
   }else{
		$_REQUEST[del_sub] = array();
       if($BUYED_UPDATE_R[0]==1){
            $_REQUEST[del_sub][1]=$BUYED_UPDATE_R[1][SEQ_NBR];
       }else if($BUYED_UPDATE_R[0]>1){
            $r=0;
	        foreach($BUYED_UPDATE_R[1] as $KEY1=>$VALUE1){
	           $r++;
		       $_REQUEST[del_sub][$r]=$VALUE1[SEQ_NBR];
	        }
       }
	   $file_rout="../updata/".$LOG_PRVL.sprintf("%04d",$CHECK_BUYED_R[1][SEQ_NBR])."/".$VALUE;
       $DEL_NM="DEL_upload";
       $DEL_TABLES_NM="SALES_CAR_UPLOAD";
       $Msg=DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="",$file_rout);
	   if($Msg=="刪除成功！"){
	       if(!rmdir($file_rout)){
		        $Msg="刪除失敗！";
	       }else{
		        $Msg=="刪除成功！";
	       }
	   }
   }
}
if($Msg=="刪除成功！"){
   $Msg=urlencode("刪除成功！");
   OK_HEAD($Msg);
}else{   
   $Msg=str_replace("-","和",$Msg);   
   $Msg=urlencode("消息編號".$Msg."刪除失敗！");
   ERRO_HEAD($Msg);
}
?>
