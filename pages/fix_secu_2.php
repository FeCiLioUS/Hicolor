<? 
//定義URL常數;
define("ERRO_HEAD_URL","about.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
    $Msg=urlencode("會員尚未登入或已登出！");
    ERRO_HEAD($Msg);
}else{
       //比對帳號;
	   if($_POST[ACCOUNT] != $LOGIN_OBJ["LOG_ACCOUNT"]){			
			$Msg=urlencode("帳號密碼輸入錯誤！");
			header("Location:fix_secu.php?Msg=".$Msg);
			exit();
	   }
	   //比對密碼;
       define("CRTE_TIME",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));
       $QUERY_NM="USER_LOGIN";
       $QUERY_SELECT_NM="*";
       $QUERY_TABLES_NM="RIGIST_DATA";
	   $QUERY_WHERE_ARG="ACCOUNT = \"".$_POST[ACCOUNT]."\" and PWD = \"".$_POST[PWD]."\"";
	  // echo $QUERY_WHERE_ARG;
	   $QUERY_ORDER_ARG="";//SEQ_NBR asc
       $QUERY_limit_ARG="";//"0,20"
       $USER_LOGIN_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
	   if($USER_LOGIN_R[0]!=1){
          $Msg=urlencode("帳號密碼輸入錯誤！");
	      header("Location:fix_secu.php?Msg=".$Msg);
	   }
}
$hicolor-> assign("pageTitle", "修改密碼");
$hicolor-> assign("contentPath", "../templates/fix_secu_2.tpl"); 
$hicolor-> display("standard_template.tpl");
?>