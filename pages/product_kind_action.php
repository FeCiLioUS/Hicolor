<?
define("ERRO_HEAD_URL","product_kind_admin.php");
define("OK_HEAD_URL","product_kind_admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

//依權限查詢資料;
if(LOGIN_PRVL() == 1){
	//新增資料;	
	if($_POST['edit_mode'] == "add"){
		if(!$_POST['NICK']){
			  $Msg = urlencode("請輸入新增類別代號！");
			  ERRO_HEAD($Msg);
		}else if(strlen($_POST['NICK']) == 0){
			  $Msg = urlencode("請輸入新增類別代號！");
			  ERRO_HEAD($Msg);
		}else if(strlen($_POST['NAME']) == 0){
			  $Msg = urlencode("請輸入新增類別名稱！");
			  ERRO_HEAD($Msg);
		}else{
			$kind_la_num = $CRTE_TIME.sprintf("%02d",($_POST['total_num'] + 1));
			//echo $kind_la_num;
			//寫入資料庫;
			//查資料庫欄位;
			$QUERY_NM = "KIND_DATA_CHECK";
			$QUERY_SELECT_NM = "*";
			$QUERY_TABLES_NM = "PRODUCT_KIND";
			$FIELD_NM = TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改; 
			//echo $FIELD_NM."<br>";
			$TABLE="PRODUCT_KIND";
			
			$FIELD_Value="\"".$_POST['NICK']."\",\"".$_POST['NAME']."\",\"".$kind_la_num."\",".$hicolor-> loginInfo['LOGIN_ID'].",\"\",".$CRTE_TIME.",\"\"";
			//echo $FIELD_Value."<br>";
			//寫入;
			if($_POST['total_num'] == 0){
				$brea = "";
			}else{
				$brea = "pass";
			}
			$inset_re = insertdata($FIELD_NM, $FIELD_Value, $TABLE, $Msg="", $brea);
			if(!$inset_re){
				$Msg = urlencode("產品類別代號或名稱已存在！請輸入其它的代號或名稱！");
				ERRO_HEAD($Msg);
			}else{
				//更新舊等級;
				//查資料庫;
				$QUERY_NM = "kind_sn";
				$QUERY_SELECT_NM = "*";
				$QUERY_TABLES_NM = "PRODUCT_KIND";
				$QUERY_WHERE_ARG = "PR_KIND_LEV != 1 && PR_KIND_LEV != 2 && PR_KIND_LEV != \"".$kind_la_num."\"";//ADMIN_CONT = \"".$_POST[CONT]."\"
				$QUERY_ORDER_ARG = "PR_KIND_LEV asc";//
				$QUERY_limit_ARG = "";//"0,20"
				$kind_sn_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
				if($kind_sn_R[0] != 0){
					if($kind_sn_R[0] == 1){
						//修改等級參數;
						$UPDATE_NM = "KIND_FIX";
						$UPDATE_TABLES_NM = "PRODUCT_KIND";
						$UPDATE_WHERE_ARG = "PR_KIND_LEV = \"" . $kind_sn_R[1]['PR_KIND_LEV'] . "\"";
						$UPDATE_DATA = "PR_KIND_LEV=\"" . $CRTE_TIME . "01\",UPD_ADMIN_NM=" . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT=" . $CRTE_TIME;
						$$UPDATE_NM = "update " . $UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;	
						if(!mysql_query($$UPDATE_NM, MyLink)){
							$Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
							ERRO_HEAD($Msg);
						}else{
							$Msg = urlencode("新增產品類別成功！");
							OK_HEAD($Msg);
						}
					}else{
						$t = 1;
						$check_add = 1;
						foreach($kind_sn_R[1] as $KEY=>$VALUE){
							//echo $VALUE[PR_KIND_LEV]."<br>";
							//修改等級參數;
							$UPDATE_NM = "KIND_FIX";
							$UPDATE_TABLES_NM = "PRODUCT_KIND";
							$UPDATE_WHERE_ARG = "PR_KIND_LEV = \"".$VALUE['PR_KIND_LEV']."\"";
							$UPDATE_DATA = "PR_KIND_LEV=\"".$CRTE_TIME.sprintf("%02d",$t)."\",UPD_ADMIN_NM=".$hicolor-> loginInfo['LOGIN_ID'].",UPD_DT=".$CRTE_TIME;
							$$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;	      
							if(!mysql_query($$UPDATE_NM, MyLink)){
								$Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
								ERRO_HEAD($Msg);
								$check_add=0;
							}
							$t++;
						}
						if($check_add==1){
							$Msg=urlencode("新增產品類別成功！");
							OK_HEAD($Msg);
						}
					}
				}
			}
		}	
	}else if($_POST['edit_mode'] == "fix"){
	//foreach_data($_POST);
	   //查詢;
	   $QUERY_NM = "KIND_DATA_NM";
	   $QUERY_SELECT_NM = "*";
	   $QUERY_TABLES_NM = "PRODUCT_KIND";
	   $QUERY_WHERE_ARG = "PR_KIND_LEV != 1 && PR_KIND_LEV != 2";
	   $QUERY_ORDER_ARG = "PR_KIND_LEV asc";//
	   $QUERY_limit_ARG = "";//"0,20"
	   $KIND_DATA_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);    
	   //echo $KIND_DATA_NM_R[0]."<br>";
	   $seq_n=0;
	   
	   while($seq_n < $KIND_DATA_NM_R[0]){
			//修改類別;
			$UPDATE_NM = "KIND_FIX";
			$UPDATE_TABLES_NM = "PRODUCT_KIND";
			if($KIND_DATA_NM_R[0] == 1){
				$UPDATE_WHERE_ARG = "PR_KIND_LEV = ".$KIND_DATA_NM_R[1]['PR_KIND_LEV'];
			}else if($KIND_DATA_NM_R[0] > 1){
				$UPDATE_WHERE_ARG = "PR_KIND_LEV = ".$KIND_DATA_NM_R[1][$seq_n]['PR_KIND_LEV'];
			}
			$index = ($seq_n + 1);			
			$UPDATE_DATA = "NICK = \"" . $_REQUEST['KIND_NICK'][$index] . "\",NAME = \"" . $_REQUEST['KIND_NAME'][$index] . "\",PR_KIND_LEV = \"" . $CRTE_TIME . sprintf("%02d",$_REQUEST['SN'][$index]) . "\",UPD_ADMIN_NM = " . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT = " . $CRTE_TIME;
			//echo $UPDATE_DATA. '<br>';
			$$UPDATE_NM = "update " . $UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;			
			if(!mysql_query($$UPDATE_NM, MyLink)){
			   $Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
			   ERRO_HEAD($Msg);
			}else{
			   $Msg = urlencode("資料修改成功！");
			}			
			$seq_n++;
	   }
	   
	   OK_HEAD($Msg);
	}else if($_POST['edit_mode'] == "del"){
	   //foreach_data($_POST);
	   //刪除類別;
	   $DEL_NM = "DEL_KIND";
	   $DEL_TABLES_NM = "PRODUCT_KIND";
	   $Msg = DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="", "");
	   if($Msg == "刪除成功！"){
		   $Msg = urlencode("刪除成功！");
		   OK_HEAD($Msg);	
	   }else{   
		   $Msg = str_replace("-", "和", $Msg);   
		   $Msg = urlencode("產品類別編號" . $Msg . "刪除失敗！");
		   ERRO_HEAD($Msg);
	   }
	}
} else {
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}
?>
