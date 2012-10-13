<?php
//定義URL常數;
define("ERRO_HEAD_URL","fix_regist.php");
define("OK_HEAD_URL","fix_regist.php");
//載入基本變數及函式及基本變數檢查;
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$LOGIN_OBJ=USER_LOGIN();
if($LOGIN_OBJ["LOG_TAB"]!=1){
    $Msg=urlencode("會員尚未登入或已登出！");
    ERRO_HEAD($Msg);
}else{
    //判斷變數;
    if($_POST[M_NAME]=="" || strlen($_POST[M_NAME])<6){
        $Msg=urlencode("請輸入二個中文字元或六個英文字元的姓名！");
	    ERRO_HEAD($Msg);
    }
    if($_POST[EMAIL]){
        if(!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$_POST[EMAIL])) {
            $Msg=urlencode("您的郵件信箱帳號格式錯誤，請重新填寫！");
		    ERRO_HEAD($Msg);
        }
    }else{
        $_POST[EMAIL]="";
    }
    if(!$_POST[PHONE] && !$_POST[MOBILE]){
        $Msg=urlencode("至少要填入一組電話！");
	    ERRO_HEAD($Msg);
    }
    if($_POST[PHONE]==""){
        $_POST[PHONE]="";
    }
    if($_POST[MOBILE]==""){
        $_POST[MOBILE]="";
    }
    if($_POST[RECEIPT_SN] && (eregi("[^0-9]",$_POST[RECEIPT_SN]) || strlen($_POST[RECEIPT_SN])!=8)){
        $Msg=urlencode("請填寫正確的統一編號！");
	    ERRO_HEAD($Msg);
    }
    if($_POST[RECEIPT_TYPE]==""){
        $Msg=urlencode("請選擇發票種類！");
	    ERRO_HEAD($Msg);
    }
    foreach($_POST as $key=>$value){
        if($key!="RECEIPT_TYPE" && $key!="RECEIPT_addressr"){
            if($value=="0"){
	           $_POST[$key]="";
	        }
        }
    }
    if(substr($_POST[MOBILE],0,1)==9){
        $_POST[MOBILE]="0".$_POST[MOBILE];
    }
    //修改消息;
    $UPDATE_NM="REGIST_FIX";
    $UPDATE_TABLES_NM="RIGIST_DATA";
    $UPDATE_WHERE_ARG="SEQ_NBR=".$LOGIN_OBJ["LOGIN_ID"];
    $UPDATE_DATA="M_NAME = \"".$_POST[M_NAME]."\",EMAIL = \"".$_POST[EMAIL]."\",PHONE = \"".$_POST[PHONE]."\",MOBILE = \"".$_POST[MOBILE]."\",address = \"".$_POST[address]."\",comany_nm = \"".$_POST[comany_nm]."\",RECEIPT_SN = \"".$_POST[RECEIPT_SN]."\",RECEIPT_TITLE = \"".$_POST[RECEIPT_TITLE]."\",RECEIPT_TYPE = ".$_POST[RECEIPT_TYPE].",RECEIPT_addressr = ".$_POST[RECEIPT_addressr].",addressr = \"".$_POST[addressr]."\",UPD_DT=".$CRTE_TIME;
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
