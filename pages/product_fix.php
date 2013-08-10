<?
define("ERRO_HEAD_URL","admin_products.php");
define("OK_HEAD_URL","admin_products.php");
define("PRVL_SN",1);
$__DIR__ = dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor = new Hicolor('admin');
define("PRVL_SN",1);
//依權限查詢資料;
if(LOGIN_PRVL() != 1){
   $Msg=urlencode("管理者尚未登入或沒有產品管理的管理權限！");
   ERRO_HEAD($Msg);
} else {
	//資料查詢;
    $PRODUCT_DARA_R = SEL("PRO_DATA","*","PRODUCT_DATA","SEQ_NBR=".$_GET['SEQ_NUM'], "", "");
	//查詢資料對照的規格;
	$PROD_SUBKIND_R = SEL("PRO_DATA_SUBKIND","*","PRODUCT_SUBKIND","PRO_KIND = ".$PRODUCT_DARA_R[1]['KIND'],"","");
	$productSubKind = $PRODUCT_DARA_R[1]['SUBKIND'];
	$subKindList = array();	
	$subKindList[0] = '--選擇規格--';
	
	if ($PROD_SUBKIND_R[0] == 1) {		
		$subKindList[$PROD_SUBKIND_R[1]['SEQ_NBR']] = $PROD_SUBKIND_R[1]['PRO_SUBKIND_NAME'];
	} else if ($PROD_SUBKIND_R[0] > 1) {		
	    $b = 0;		
		foreach($PROD_SUBKIND_R[1] as $KEY => $VALUE) {
			$subKindList[$VALUE['SEQ_NBR']] = $VALUE['PRO_SUBKIND_NAME'];		    
		}		
	}	
														
	$faceData = array();
	$faceData[0] = '--選擇面數--';
	$faceData[1] = '單面';
	$faceData[2] = '雙面';
	$faceSelected;
	//比對面數;
	if($PRODUCT_DARA_R[1]['FACE'] == 1) {
	    $faceSelected = 1;
	}else if($PRODUCT_DARA_R[1]['FACE'] == 2){
	    $faceSelected = 2;
	}
	
	//查詢類別;
    $QUERY_NM = "PRODUCT_KIND_NM";
    $QUERY_SELECT_NM = "*";
    $QUERY_TABLES_NM = "PRODUCT_KIND";
    $QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";
    $QUERY_ORDER_ARG2 = "PR_KIND_LEV asc";
    $QUERY_limit_ARG = "";
    $PRODUCT_KIND_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG2,$QUERY_limit_ARG);
	$productKind = $PRODUCT_DARA_R[1]['KIND'];
	$kindList = array();	
	$kindList[0] = '--選擇規格--';

	$productAllSubkind = array();
	
	if ($PRODUCT_KIND_NM_R[0] == 1) {
		
		//echo "類別有".$PRODUCT_KIND_NM_R[0]."<br><br>";			
		$kindList[$PRODUCT_KIND_NM_R[1]['SEQ_NBR']] = $PRODUCT_KIND_NM_R[1]['NAME'];
		
		$nbr = $PRODUCT_KIND_NM_R[1]['SEQ_NBR'];
		//查詢規格;
		$QUERY_NM = "PRODUCT_SUBKIND_NM";
		$QUERY_SELECT_NM = "*";
		$QUERY_TABLES_NM = "PRODUCT_SUBKIND";
		$QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_KIND = " . $nbr;
		$QUERY_ORDER_ARG2 = "SEARC_SUBKIND_LEV asc";//
		$QUERY_limit_ARG = "";//"0,20"
		$PRODUCT_SUBKIND_NM_R = SEL($QUERY_NM, $QUERY_SELECT_NM, $QUERY_TABLES_NM, $QUERY_WHERE_ARG, $QUERY_ORDER_ARG2, $QUERY_limit_ARG);		
		
		$productAllSubkind[$nbr] = array();		
		
		if ($PRODUCT_SUBKIND_NM_R[0] == 1) {
			foreach($PRODUCT_SUBKIND_NM_R[1] as $key => $item) {
				switch($key) {
				case "SEQ_NBR": case "PRO_SUBKIND_NAME":							
					$productAllSubkind[$nbr][0][$key] = $item;						
					break;
				}				
			}				
		} if ($PRODUCT_SUBKIND_NM_R[0] > 1) {
			foreach($PRODUCT_SUBKIND_NM_R[1] as $key => $item) {
				foreach($item as $key2 => $item2) {
					switch($key2) {
					case "SEQ_NBR": case "PRO_SUBKIND_NAME":							
						$productAllSubkind[$nbr][$key][$key2] = $item2;						
						break;
					}						
				}
			}				
		}	
	} else if($PRODUCT_KIND_NM_R[0] > 1) {
	    // echo "類別有".$PRODUCT_KIND_NM_R[0]."<br><br>";		
		
		foreach ($PRODUCT_KIND_NM_R[1] as $KEY => $VALUE) {
		    //$h = $VALUE['SEQ_NBR'];
		    //echo "類別==".$VALUE[SEQ_NBR]."==>".$VALUE[NAME]."<br>";			
			$kindList[$VALUE['SEQ_NBR']] = $VALUE['NAME'];			
	        
			//查詢規格;
			$nbr = $VALUE['SEQ_NBR'];
	        $QUERY_NM = "PRODUCT_SUBKIND_NM";
            $QUERY_SELECT_NM = "*";
            $QUERY_TABLES_NM = "PRODUCT_SUBKIND";
            $QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2 && PRO_KIND = ".$VALUE['SEQ_NBR'];//ADMIN_CONT = \"".$_POST[CONT]."\"
            $QUERY_ORDER_ARG2 = "SEARC_SUBKIND_LEV asc";//
            $QUERY_limit_ARG = "";//"0,20"
			
            $PRODUCT_SUBKIND_NM_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG2,$QUERY_limit_ARG);
			// echo "規格有".$PRODUCT_SUBKIND_NM_R[$nbr][0]."<br>";			
			$productAllSubkind[$nbr] = array();
			
			if ($PRODUCT_SUBKIND_NM_R[0] == 1) {
				foreach($PRODUCT_SUBKIND_NM_R[1] as $key => $item) {
					switch($key) {
					case "SEQ_NBR": case "PRO_SUBKIND_NAME":							
						$productAllSubkind[$nbr][0][$key] = $item;						
						break;
					}
					
				}				
			} if ($PRODUCT_SUBKIND_NM_R[0] > 1) {
				foreach($PRODUCT_SUBKIND_NM_R[1] as $key => $item) {
					foreach($item as $key2 => $item2) {
						switch($key2) {
						case "SEQ_NBR": case "PRO_SUBKIND_NAME":							
							$productAllSubkind[$nbr][$key][$key2] = $item2;						
							break;
						}						
					}
				}				
			}			
		}		
	}	
		
	//查詢運費等級;
    $QUERY_NM = "TRANS_PRICE";
    $QUERY_SELECT_NM = "*";
    $QUERY_TABLES_NM = "TRANS_DATA";
    $QUERY_WHERE_ARG = "SEQ_NBR != 1 && SEQ_NBR != 2";//ADMIN_CONT = \"".$_POST[CONT]."\"
    $QUERY_ORDER_ARG2 = "TRANS_LEV asc";//
    $QUERY_limit_ARG = "";//"0,20"
    $TRANS_PRICE_R = SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG2,$QUERY_limit_ARG);
	$transPrice = array();	
	$transSelected = $PRODUCT_DARA_R[1]['TRANS_LEV'];	
	$transPrice[0] = '--選擇等級--';
	if($TRANS_PRICE_R[0] == 1) {
		$transPrice[$TRANS_PRICE_R[1]['SEQ_NBR']] = 1;
	}else if($TRANS_PRICE_R[0]>1){	    
	    foreach($TRANS_PRICE_R[1] as $KEY => $VALUE){		   
		   $transPrice[$VALUE['SEQ_NBR']] = ($KEY + 1);
		}		 
	}
	/*
	//錯誤回傳;
	if($_GET[kind] && $_GET[sub_kind]){
	    foreach($_GET as $KEY=>$VALUE){
		    //echo $KEY."==".$VALUE."<br>";
			if($VALUE=="0"){
			    $_GET[$KEY]="";
			}
		}
	}
	//get參數傳送;
	if($_GET){
	    foreach($_GET as $KEY=>$VALUE){
		   if($KEY!="PAGE"){
		       $URL_AUG=$URL_AUG."&".$KEY."=".$VALUE;
		   }
		}
	}*/
}

$hicolor-> assign("faceData", $faceData);
$hicolor-> assign("faceSelected", $faceSelected);
$hicolor-> assign("kindList", $kindList);
$hicolor-> assign("productKind", $productKind);
$hicolor-> assign("subKindList", $subKindList);
$hicolor-> assign("productSubKind", $productSubKind);
$hicolor-> assign("productAllSubkind", $productAllSubkind);
$hicolor-> assign("productData", $PRODUCT_DARA_R[1]);
$hicolor-> assign("transLevel", $transPrice);
$hicolor-> assign("transSelected", $transSelected);
$hicolor-> assign("pageTitle", "修改產品");
$hicolor-> assign("contentPath", "../templates/product_fix.tpl");
$hicolor-> display("standard_template.tpl");
