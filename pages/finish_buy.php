<? 
//載入基本變數及函式及基本變數檢查;
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
	$LOG_PAY="月結會員";
} else {
	$LOG_PAY="一般會員";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//foreach_data($_GET);
//載入產品項目;
if(!$_GET[MODE]){
	$_GET[MODE] = $hicolor-> FREE_MODE;
}
//查詢購物車;
$CHECK_BUYED_R = SEL("BUY_CHECK","*","SALES_CAR","SEQ_NBR = ".$_GET["sq"], "", "");
$BUY_SUB_TOTAL = 0;
$total_money = 0;
$BUY_LIST = array();
if ($CHECK_BUYED_R[0] == 1) {
	if($CHECK_BUYED_R[1]["trans_time"] == "全日"){
		$hicolor-> assign('trans_time', "全日");
    }else{
       $trans_ti = split("~",$CHECK_BUYED_R[1]["trans_time"], 2);
       if(substr($trans_ti[0], 0, 2) > 12){
          $SH = sprintf("%02d",(substr($trans_ti[0], 0, 2) - 12));
          $start_hour = "PM-" . $SH . "：" . substr($trans_ti[0], 2, 2);
       }else{
          $start_hour = "AM-" . substr($trans_ti[0], 0, 2) . "：" . substr($trans_ti[0], 2, 2);
       }
       if(substr($trans_ti[1], 0, 2)>12){
          $EH = sprintf("%02d", (substr($trans_ti[1], 0, 2) - 12));
          $end_hour = "PM" . $EH . "：" . substr($trans_ti[1],2,2);
       }else{
          $end_hour = "AM" . substr($trans_ti[1], 0, 2) . "：" . substr($trans_ti[1], 2, 2);
       }
	   $hicolor-> assign('trans_time', $start_hour."~".$end_hour);
    }
	switch($CHECK_BUYED_R[1]["receipt_type"]){
       case"1";
	   $receipt_ty="電子發票";
	   break;
       case"2";
	   $receipt_ty="二聯式發票";
	   break;
       case"3";
	   $receipt_ty="三聯式發票";
	   break;
    }
	if($CHECK_BUYED_R[1]["TRANS_PRICE"] == 0){
		$transNote=" (自行領貨)";
	}else{
		$transNote=" (代請運送)";
	}
	//查詢購物內容;
    $BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1]["SEQ_NBR"],"SEQ_NBR asc","");
	//echo $BUYED_DETAIL_R[0];
	$detailArray = array();	
	$tans = array();	
	if($BUYED_DETAIL_R[0] == 1){
		$detailArray[] = $BUYED_DETAIL_R[1];
	} else if ($BUYED_DETAIL_R[0]>1) {
		$detailArray = $BUYED_DETAIL_R[1];		
	}
	$r=0;
	foreach ($detailArray as $KEY => $VALUE) {
		$r++;
		$BUYED_DATA_R = SEL("BUY_DATA", "*", "PRODUCT_DATA", "SEQ_NBR = ".$VALUE["BUY_SEQ"], "", "");
		//echo $BUYED_DATA_R[1][KIND]."===".$BUYED_DATA_R[1][SUBKIND]."<br>";
		if($BUYED_DATA_R[1]["FACE"]==1){
			$BUY_FACE = "單";
		}else if($BUYED_DATA_R[1]["FACE"]==2){
			$BUY_FACE = "雙";
		}
		//查詢所購買的類別和規格;
		$BUYED_KIND_R = SEL("BUY_KIND", "*", "PRODUCT_KIND", "SEQ_NBR = " . $BUYED_DATA_R[1]["KIND"], "", "");
		$BUYED_SUBKIND_R = SEL("BUY_SUBKIND", "*", "PRODUCT_SUBKIND", "SEQ_NBR = " . $BUYED_DATA_R[1]["SUBKIND"], "", "");
		$BUY_LIST[] = array(
			"NAME" => $BUYED_KIND_R[1]["NAME"],
			"PRO_SUBKIND_NAME" => $BUYED_SUBKIND_R[1]["PRO_SUBKIND_NAME"],
			"face" => $BUY_FACE,
			"size" => $BUYED_SUBKIND_R[1]["FINISH_W"]." X ".$BUYED_SUBKIND_R[1]["FINISH_H"],
			"count" => $BUYED_DATA_R[1]["AMOUNT"] . " " . $BUYED_DATA_R[1]["UNIT_NM"],
			"price" => $BUYED_DATA_R[1]["PRICE"]
		);		
		$tans[$r] = $BUYED_DATA_R[1]["TRANS_LEV"];
		$BUY_SUB_TOTAL = $BUY_SUB_TOTAL + $BUYED_DATA_R[1]["PRICE"];
	}	
	//調出運費設定;
    $TRANS_R = SEL("TRANS_SET","*","TRANS_DATA","SEQ_NBR != 1 && SEQ_NBR != 2","","");
	$trans_data = array();
	$TRANS_PRICE = array();
	$TRANS_UP = array();
	$TRANS_NUM = array();
	if($TRANS_R[0] == 1){		
		$trans_data[] = $TRANS_R[1];
	} else if ($TRANS_R[0] > 1){
		$trans_data = $TRANS_R[1];
	}
	$t=0;
	foreach($trans_data as $KEY => $VALUE){		
		//echo "等級".$t."==".$VALUE[SEQ_NBR]."<br>";
		//比對運費比數;
		$t++;
		$g=0;
		foreach($tans as $KEY2 => $VALUE2){			
			if($VALUE2 == $VALUE["SEQ_NBR"]){
				//echo 'ok:'. $t.'<br>';
				$g++;
				$TRANS_NUM[$t] = $g;
			}else{
				//echo 'no:'.$t.'<br>';
				$TRANS_NUM[$t] = $TRANS_NUM[$t] + 0;
			}
		}
		$TRANS_PRICE[$t] = $VALUE["TRANS_PRICE"];
		$TRANS_UP[$t] = $VALUE["TRANS_UP_NUM"];		
	}
	$f=0;	
	foreach($TRANS_NUM as $KEY => $VALUE){
		$up_num=0;
		//echo "級數".$KEY."====有".$TRANS_NUM[$KEY]."筆,升級限制為:".$TRANS_UP[$KEY].",此級金額單價為".$TRANS_PRICE[$KEY]."<br>";
		if($TRANS_NUM[$KEY] >= $TRANS_UP[$KEY] && $TRANS_UP[$KEY] != "" && $TRANS_UP[$KEY] > 1){
		     $up_num = floor($TRANS_NUM[$KEY]/$TRANS_UP[$KEY]);
			 $TRANS_NUM[$KEY] = $TRANS_NUM[$KEY] - ($up_num * $TRANS_UP[$KEY]);
			 $total_money = $total_money + ($TRANS_NUM[$KEY] * $TRANS_PRICE[$KEY]);
			 //echo "修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$total_monery."<br>";
			 $TRANS_NUM[$KEY + 1] = $TRANS_NUM[$KEY + 1] + $up_num;
			 //echo "下一級為".$TRANS_NUM[$KEY + 1]."個<br>";
		}else{
		     $total_money = $total_money + ($TRANS_NUM[$KEY] * $TRANS_PRICE[$KEY]);
		   	 //echo "修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$total_money."<br>";
		}
	}	
	$hicolor-> assign('transPrice', $total_money . $transNote);
}
$hicolor-> assign('saleSN', $LOG_PRVL.sprintf("%04d", $CHECK_BUYED_R[1]["SEQ_NBR"]));
$hicolor-> assign('orderDate', date("Y/m/d",$CHECK_BUYED_R[1]["UPD_DT"]));
$hicolor-> assign('transName', $CHECK_BUYED_R[1]["trans_name"]);
$hicolor-> assign('trans_phone', $CHECK_BUYED_R[1]["trans_phone"]);
$hicolor-> assign('trans_MOBILE', $CHECK_BUYED_R[1]["trans_MOBILE"]);
$hicolor-> assign('trans_adress', $CHECK_BUYED_R[1]["trans_adress"]);
$hicolor-> assign('LOG_RECEIPT_COMPANY_NM', $LOGIN_OBJ["LOG_RECEIPT_COMPANY_NM"]);
$hicolor-> assign('receipt_title', $CHECK_BUYED_R[1]["receipt_title"]);
$hicolor-> assign('invoiceSN', $CHECK_BUYED_R[1]["SN"]);
$hicolor-> assign('receipt_ty', $receipt_ty);
$hicolor-> assign('LOG_PAY', $LOG_PAY);
$hicolor-> assign("BUY_LIST", $BUY_LIST);
$hicolor-> assign("total", $BUY_SUB_TOTAL + $total_money);
$hicolor-> assign('pageTitle', '下單完成');
$hicolor-> assign("contentPath", "../templates/finish_buy.tpl");
$hicolor-> display("standard_template.tpl");
?>
