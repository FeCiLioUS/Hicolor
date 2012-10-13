<?php
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../lib/Smarty/libs/Smarty.class.php");
require_once($__DIR__."/../lib/main.php");
class Hicolor extends Smarty{
	var $config;
	var $FREE_MODE;
	function Hicolor(){	
		$__DIR__= dirname(__FILE__);
		$this-> template_dir= "../templates";
		$this-> compile_dir= "../templates_c";
		$this-> cache_dir= "../cache";
		//更﹚竡郎
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
		//更玻珇兜ヘ;
		include($__DIR__."/../middleware/PRODUCT_LIST.php");
		$this-> FREE_MODE= $FREE_MODE;
		$this-> assign("productArray", $productArray);
		//更HEADER家舱
		$this-> assign("headerPath", "../templates/header.tpl");
		//Error Handlering
		if(isset($_REQUEST[Msg]) && strlen($_REQUEST[Msg]) > 0){
			$this-> assign("Msg", $_REQUEST[Msg]);
		}
		//更祅家舱
		$this-> assign("logInfo", "../templates/log_info.tpl");
		//浪琩祅篈
		USER_LOGIN();	
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
	 * 琩高琌祅;
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