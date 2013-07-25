<?
define("ERRO_HEAD_URL","product_subkind_admin.php");
define("OK_HEAD_URL","product_subkind_admin.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');

if(LOGIN_PRVL() == 1){
//判斷輸入與否與存入變數整理;
//新增資料判斷;
	$now_time = $CRTE_TIME;
	$files_tab = 0;
	switch($_POST["mode"]) {
	case "add":
		if (!$_POST["new_belong_kind"]) {
			$Msg = urlencode("請選擇規格所屬類別！");
			ERRO_HEAD($Msg);
		} else if (strlen($_POST["NICK"]) == 0) {
			$Msg = urlencode("請輸入規格代號！");
			ERRO_HEAD($Msg);
		} else if (strlen($_POST["NAME"]) == 0) {
			$Msg = urlencode("請輸入規格名稱！");
			ERRO_HEAD($Msg);
		} else if ($_POST["finish_width"] && eregi("[^0-9]", $_POST["finish_width"])) {
			$Msg = urlencode("請輸入數字格式的寬度！");
			ERRO_HEAD($Msg);
		} else if ($_POST["finish_heigh"] && eregi("[^0-9]", $_POST["finish_heigh"])) {
			$Msg = urlencode("請輸入數字格式的高度！");
			ERRO_HEAD($Msg);
		} else if ($_POST["border_width"] && eregi("[^0-9]", $_POST["border_width"])) {
			$Msg = urlencode("請輸入數字格式的寬度！");
			ERRO_HEAD($Msg);
		} else if ($_POST["border_heigh"] && eregi("[^0-9]", $_POST["border_heigh"])) {
			$Msg = urlencode("請輸入數字格式的高度！");
			ERRO_HEAD($Msg);
		} else if ($_POST["finish_width"] > $_POST["border_width"]) {
			$Msg = urlencode("完成尺寸寬度不得大於出血尺寸寬度！");
			ERRO_HEAD($Msg);
		} else if ($_POST["finish_heigh"] > $_POST["border_heigh"]) {
			$Msg = urlencode("完成尺寸高度不得大於出血尺寸高度！");
			ERRO_HEAD($Msg);
		} else {
			//查資料庫筆數;
			//寫入資料庫;
			$QUERY_NM = "TOTAL_SUBKIND";
			$QUERY_SELECT_NM = "*";
			$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
			$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 ";//ADMIN_CONT = \"".$_POST[CONT]."\"
			$QUERY_ORDER_ARG = "";//
			$QUERY_limit_ARG = "";//"0,20"
			$TOTAL_SUBKIND_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
			$subkind_sn = $now_time . sprintf("%03d",($TOTAL_SUBKIND_R[0] + 1));
			//查詢同類別序號;
			$QUERY_NM = "THE_SAME_KIND_NM";
			$QUERY_SELECT_NM = "*";
			$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
			$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_KIND = ".$_POST["new_belong_kind"];//ADMIN_CONT = \"".$_POST[CONT]."\"
			$QUERY_ORDER_ARG = "SEARC_SUBKIND_LEV asc";//
			$QUERY_limit_ARG = "";//"0,20"
			$THE_SAME_KIND_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);
			// echo $THE_SAME_KIND_NM_R[0]."<br>";
			$THE_SAME_KIND_SN = $now_time . sprintf("%03d", ($THE_SAME_KIND_NM_R[0] + 1));
			//查資料庫欄位;
			$QUERY_NM = "SUBKIND_DATA_CHECK";
			$QUERY_SELECT_NM = "*";
			$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
			$FIELD_NM = TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改; 
			//  echo $_POST[finish_info]."<br>";
			//echo $FIELD_NM."<br>";
			$TABLE = "PRODUCT_SUBKIND"; 
			// echo "紙張說明".$_POST[paper_info]."<br>";
			if ($_POST["paper_info"] == "0") {
				$_POST["paper_info"] = "";
			}
			if ($_POST["finish_info"] == "0") {
				$_POST["finish_info"] = "";
			}
			$FIELD_Value = $_POST["new_belong_kind"] . ",\"" . $_POST["NICK"] . "\",\"" . $_POST["NAME"] . "\",\"" . $_POST["paper_info"] . "\"," . $_POST["finish_width"] . "," . $_POST["finish_heigh"] . "," . $_POST["border_width"] . "," . $_POST["border_heigh"] . ",\"" . $_POST["finish_info"] . "\",\"" . $subkind_sn . "\",\"" . $THE_SAME_KIND_SN . "\"," . $files_tab . ",0," . $hicolor-> loginInfo['LOGIN_ID'] . ",\"\"," . $CRTE_TIME . ",\"\"";
			//echo $FIELD_Value."<br>";
			//寫入;
			if($TOTAL_SUBKIND_R[0] == 0){
				$brea = "";
			}else{
				$brea = "pass";
			}			  
			$inset_re = insertdata($FIELD_NM, $FIELD_Value, $TABLE, $Msg = "", $brea);	

			if(!$inset_re){
				$Msg = urlencode("產品規格代號或名稱已存在！請輸入其它的代號或名稱！");
				ERRO_HEAD($Msg);
			}else{
				//更新同類別的序號;
				$sameKindList = array();
				if ($THE_SAME_KIND_NM_R [0] == 1) {
					array_push($sameKindList, $THE_SAME_KIND_NM_R[1]);					
				} else{
					$sameKindList = $THE_SAME_KIND_NM_R[1];					
				}
				$h = 1;
				foreach ($sameKindList as $KEY => $VALUE) {
					$UPDATE_NM = "THE_SAME_SUBKIND_FIX";
					$UPDATE_TABLES_NM = "PRODUCT_SUBKIND";
					$UPDATE_WHERE_ARG = "SEQ_NBR = \"" . $VALUE["SEQ_NBR"] . "\"";
					$UPDATE_DATA = "SEARC_SUBKIND_LEV =\"" . $now_time . sprintf("%03d", $h) . "\",UPD_ADMIN_NM=" . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT=" . $CRTE_TIME;
					$$UPDATE_NM = "update " . $UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;
					//echo $$UPDATE_NM."<br>";
					if (!mysql_query($$UPDATE_NM, MyLink)) {
						$Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
						ERRO_HEAD($Msg);
					}
					$h++;
				}
				
				//更新舊等級;
				//查資料庫;
				$QUERY_NM = "pro_subkind_sn";
				$QUERY_SELECT_NM = "*";
				$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
				$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_SUBKIND_LEV != \"".$subkind_sn."\"";//ADMIN_CONT = \"".$_POST[CONT]."\"
				$QUERY_ORDER_ARG = "PRO_SUBKIND_LEV asc";
				$QUERY_limit_ARG = "";//"0,20"
				$subkind_sn_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
				//  echo $subkind_sn_R[0]."<br>";
				
				if ($subkind_sn_R[0]  != 0) {
					$subkindSNArray = array();
					if ($subkind_sn_R[0] == 1) {
						array_push($subkindSNArray, $subkind_sn_R[1]);						
					}else{
						$t = 1;
						$check_add = 1;
						foreach ($subkind_sn_R[1] as $KEY=>$VALUE) {
							//echo $VALUE[PRO_SUBKIND_LEV]."<br>";
							//修改等級參數;
							$UPDATE_NM = "SUBKIND_FIX";
							$UPDATE_TABLES_NM = "PRODUCT_SUBKIND";
							$UPDATE_WHERE_ARG = "SEQ_NBR = \"".$VALUE["SEQ_NBR"]."\"";
							$UPDATE_DATA = "PRO_SUBKIND_LEV =\"" . $now_time . sprintf("%03d",$t)."\",UPD_ADMIN_NM=" . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT=".$CRTE_TIME;
							$$UPDATE_NM = "update ".$UPDATE_TABLES_NM . " set " . $UPDATE_DATA . " where " . $UPDATE_WHERE_ARG;
							
							if (!mysql_query($$UPDATE_NM, MyLink)) {
								$Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
								ERRO_HEAD($Msg);
								$check_add = 0;
							}
							$t++;
						}
						if ($check_add == 1) {
							$_POST = array();
							$Msg = urlencode("新增產品規格成功！");
							OK_HEAD($Msg);
						}
					}
				}
			}
		}
		break;
	case "fix":
		$seq_n = 0;
		//echo phpinfo();		
		//foreach_data($_POST);		
		while($seq_n < count($_REQUEST["NICK_NAME"])){
			//修改規格;
			$UPDATE_NM = "SUBKIND_FIX";
			$UPDATE_TABLES_NM = "PRODUCT_SUBKIND";	
			$UPDATE_WHERE_ARG = "SEQ_NBR =" . $_REQUEST['subseq'][$seq_n + 1];	
			//echo $UPDATE_WHERE_ARG."<br>";
			//查出原本類別;
			$QUERY_NM = "ORG_KIND_NM";
			$QUERY_SELECT_NM = "SEQ_NBR, PRO_KIND,SEARC_SUBKIND_LEV";
			$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
			$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && SEQ_NBR = ".$_REQUEST['subseq'][($seq_n + 1)];
			//echo $QUERY_WHERE_ARG.'<br>';	
			$QUERY_ORDER_ARG = "SEARC_SUBKIND_LEV asc";//
			$QUERY_limit_ARG = "";//"0,20"
			$ORG_KIND_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
			//echo "原本".$ORG_KIND_NM_R[1]['PRO_KIND']."換成".$_REQUEST['belong_kind'][($seq_n+1)]."<br>";
			//是否更改;
			//echo $ORG_KIND_NM_R[1]['PRO_KIND'];
			if($ORG_KIND_NM_R[1]['PRO_KIND'] == $_REQUEST['belong_kind'][($seq_n+1)]){				
				$seq = $ORG_KIND_NM_R[1]['SEARC_SUBKIND_LEV'];		
				if (isset($_REQUEST['SN'])) {
					$seq = substr($seq, 0, strlen($seq) - 3) . sprintf('%03d', $_REQUEST['SN'][$seq_n + 1]);
				}				
				//echo $seq.'<br>';
			}else{
				//查詢更改的同類別序號;
				$QUERY_NM = "diff_KIND_NM";
				$QUERY_SELECT_NM = "SEQ_NBR,SEARC_SUBKIND_LEV";
				$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
				$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_KIND = ".$_REQUEST['belong_kind'][($seq_n+1)];
				$QUERY_ORDER_ARG = "SEARC_SUBKIND_LEV asc";//
				$QUERY_limit_ARG = "";//"0,20"
				$diff_KIND_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG, $QUERY_limit_ARG);		
				
				if($diff_KIND_NM_R[0] == 0){
					$seq = ($now_time + 500)."001";
				}else if($diff_KIND_NM_R[0] == 1){					
					$seq = $diff_KIND_NM_R[1]['SEARC_SUBKIND_LEV'];
					$seq1 = substr($seq, 0, strlen($seq) - 3);
					$seq2 = substr($seq, strlen($seq) - 3, strlen($seq));
					$seq = $seq1.sprintf('%03d',(int)$seq2 + 1);
				}else{
					$seq = ($diff_KIND_NM_R[1][$diff_KIND_NM_R[0] - 1]['SEARC_SUBKIND_LEV']);					
					$seq1 = substr($seq, 0, strlen($seq) - 3);
					$seq2 = substr($seq, strlen($seq) - 3, strlen($seq));
					$seq = $seq1.sprintf('%03d',(int)$seq2 + 1);
				}				
			}
			
	   	    $UPDATE_SN = ",SEARC_SUBKIND_LEV =\"".$seq."\"";	
			$UPDATE_DATA = "PRO_KIND = ".$_REQUEST['belong_kind'][($seq_n+1)].",PRO_SUBKIND_NICK = \"".$_REQUEST['NICK_NAME'][($seq_n+1)]."\",PRO_SUBKIND_NAME = \"".$_REQUEST['SUBKIND_NAME'][($seq_n+1)]."\"".$UPDATE_SN.",UPD_ADMIN_NM = " . $hicolor-> loginInfo['LOGIN_ID'] . ",UPD_DT = " . $now_time;
			$$UPDATE_NM = "update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
			//echo $$UPDATE_NM."<br><br>";
			if(!mysql_query($$UPDATE_NM, MyLink)){
			   $Msg = urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
			   ERRO_HEAD($Msg);
			}else{
			   $Msg = urlencode("資料修改成功！");
			}
			$seq_n++;
		}
		OK_HEAD($Msg);
		break;
	case "del":
		//foreach_data($_POST);
		//刪除類別;		
		if ($_POST['del_num'] > 0) {
			$DEL_NM = "DEL_SUBKIND";
			$DEL_TABLES_NM = "PRODUCT_SUBKIND";
			$Msg = DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD="",$DEL_FILES_SEQ="",$DEL_FILES_TAB_NM="",$UPDATE_DATA="",$PASS_DEL_AD="", "");
			if($Msg == "刪除成功！"){
			   $Msg = urlencode("刪除成功！");
			   OK_HEAD($Msg);	
			}
			else{   
			   $Msg = str_replace("-","和",$Msg);   
			   $Msg = urlencode("產品類別編號".$Msg."刪除失敗！");
			   ERRO_HEAD($Msg);
			}
		}		
		break;
	}	
} else {
	$Msg = urlencode("管理者尚未登入或沒有產品管理的管理權限！");
	ERRO_HEAD($Msg);
}
?>
