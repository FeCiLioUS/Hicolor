<? 
//定義URL常數;
define("OK_HEAD_URL","fix_secu_suc.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
	define("ERRO_HEAD_URL","about.php");
    $Msg=urlencode("會員尚未登入或已登出！");
    ERRO_HEAD($Msg);
}else{
	define("ERRO_HEAD_URL","fix_secu_2.php");
     //修改消息;
     $UPDATE_NM="REGIST_FIX";
     $UPDATE_TABLES_NM="RIGIST_DATA";
     $UPDATE_WHERE_ARG="SEQ_NBR=".$LOGIN_OBJ["LOGIN_ID"];
     $UPDATE_DATA="PWD = \"".$_POST[PWD]."\",UPD_DT =".$CRTE_TIME;
     $$UPDATE_NM="update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
     if(!mysql_query($$UPDATE_NM, MyLink)){
          $Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
          ERRO_HEAD($Msg);
     }else{
          $Msg=urlencode("資料修改成功！");
          OK_HEAD($Msg);
     }
}
?>
