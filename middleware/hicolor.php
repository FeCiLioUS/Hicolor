<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../library/Smarty/libs/Smarty.class.php");
require_once($__DIR__."/../library/main.php");
class Hicolor extends Smarty{
	var $config;
	var $FREE_MODE;
	function Hicolor($type = 'user', $isDefault = false){	
		$__DIR__= dirname(__FILE__);
		$this-> template_dir= "../templates";
		$this-> compile_dir= "../templates_c";
		$this-> cache_dir= "../cache";
		//載入定義檔
		$iniPath= $__DIR__ . '\\..\\config\\' . preg_replace('/^.+\\\/', '', __CLASS__) . '.ini';
		$ret = $this -> readConfigFile($iniPath);
		if($ret != 1){
			die ('Please verify your configuration file exists and valid.');	
		}else{
			//set footer config value			
			$this-> assign("requirement", $this-> getConfigAttr("requirement"));
			$this-> assign("copyright", $this-> getConfigAttr("copyright"));
			$this-> assign("address", $this-> getConfigAttr("address"));
		}
		//載入產品項目;
		include($__DIR__."/../middleware/PRODUCT_LIST.php");
		$this-> FREE_MODE = $FREE_MODE;
		$this-> assign("productArray", $productArray);		
		//Error Handlering
		if(isset($_REQUEST[Msg]) && strlen($_REQUEST[Msg]) > 0){
			$this-> assign("Msg", $_REQUEST[Msg]);
		}		
		if($type == 'user') {
			//載入登入模組
			$this-> assign("logInfo", "../templates/log_info.tpl");			
			$this-> assign("headerPath", "../templates/header.tpl");
			//載入HEADER模組
			$this-> assign("loginType", "user");
			//檢查登入狀態
			USER_LOGIN();	
		} else {
			//載入登入模組
			$this-> assign("logInfo", "../templates/admin_login.tpl");
			$this-> assign("loginType", "admin");
			//載入HEADER模組
			$this-> assign("headerPath", "../templates/adminHeader.tpl");
			//檢查登入狀態
			ADMIN_LOGIN();
			$fp     = fopen("../tmp/counter.txt","rw");
			$num    = fgets($fp, 5);			
			$this-> assign("counter", $num);
			if (LOG_TAB == 0 && $isDefault == false) {				
				//header('location:../pages/admin.php?Msg=尚未登入！');
			}
		}		
		if(LOG_TAB == 0){
			$this-> assign("loginStatus", false);
		}else{
			$this-> assign("loginStatus", true);
		}
	}
	/*
	 * @Purpose: read configuration from file.
	 * @Parameters: 1: Filename.
	 * @Return:
	 *	 1: Success
	 *  -1: Fail(file is not exists)
	 *	-2: Fail(parse_ini_file return error)
	 */	
	function readConfigFile($filename) {
		if ( is_readable($filename) == FALSE ) return -1;

		// parser config data
		//$para = parse_ini_string($str);
		$config = parse_ini_file($filename);
		if ( $config == false ) return -2;

		// assign variable
		$this->config = $config;
		
		return 1;
	}
	/*
	 * @Purpose: get single config attriable.
	 * @Parameters: 1. config attribute name.
	 * @Return: {String} success / {null} fail(parameter error or no data)
	 */	    
	function getConfigAttr($name) {
		if ( (! is_string($name)) || empty($name) ) return null;

		return ( isset($this->config[$name]) ) ? $this->config[$name] : null;
	}
	/**
	 * 查詢是否登入;
	 */
	/*function loginStatus(){		
		$QUERY_NM="COOKIES_CHECK";
		$QUERY_SELECT_NM="*";
		$QUERY_TABLES_NM="USER_COOKIE";		
		$QUERY_WHERE_ARG="COOKIE_VAL = \"".$_COOKIE["USER_COOKIE"]."\" and LOG_OUT=\"\"";//		
		$QUERY_ORDER_ARG="";//SEQ_NBR asc
		$QUERY_limit_ARG="";//"0,20"
		$COOKIES_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
		if($COOKIES_CHECK_R[0]==0){
			$this-> assign("loginStatus", false);
		}else{
			$this-> assign("loginStatus", true);
		}
	}*/
}
?>