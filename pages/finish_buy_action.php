<? 
//定義URL常數;
define("ERRO_HEAD_URL","confirm_buy.php");
define("OK_HEAD_URL","finish_buy.php");
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
//查詢是否登入;
$LOGIN_OBJ=USER_LOGIN();
$hicolor-> assign('LOGIN_OBJ', $LOGIN_OBJ);
if($LOGIN_OBJ["LOG_TAB"]!=1){    
    $Msg=urlencode("您尚未登入，請先登入會員！");
    ERRO_HEAD($Msg);
}
//購物者身份;
if($LOGIN_OBJ['LOG_PRVL']==2){
    $LOG_PRVL="A";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//資料整理核對;
if($_POST["trans_time"]=="0"){
	$Msg=urlencode("為了讓您順利收到貨品，請務必填寫收件時間！");
	ERRO_HEAD($Msg);
}
//查詢購物車;
$CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");
if($CHECK_BUYED_R[0]==0){
	$Msg=urlencode("尚無購物車內容，請確認您交易的商品已加入購物車！");
	ERRO_HEAD($Msg);
} else {
	$_POST["sq"] = $CHECK_BUYED_R[1]["SEQ_NBR"];
	//查詢購物內容;
	$BUYED_DETAIL_R= SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1]["SEQ_NBR"],"SEQ_NBR asc","");
	$buyedDetail= array();
	$tans= array();
	if ( $BUYED_DETAIL_R[0] == 0) { 
		$Msg = urlencode("您必須要有一筆以上的購物才能完成交易喔！");
		header("location:sales_car.php?Msg=".$Msg);
	}else if ($BUYED_DETAIL_R[0] == 1){
		array_push($buyedDetail, $BUYED_DETAIL_R[1]);		
	}else if ($BUYED_DETAIL_R[0] > 1){
		$buyedDetail= $BUYED_DETAIL_R[1];
	}
	$r=0;
	foreach($buyedDetail as $KEY=>$VALUE){
		$r++;
		$BUYED_DATA_R=SEL("BUY_DATA","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE["BUY_SEQ"],"","");
		//echo $BUYED_DATA_R[1][TRANS_LEV]."<br>";
		array_push($tans, $BUYED_DATA_R[1]["TRANS_LEV"]);
		$BUY_SUB_TOTAL = $BUY_SUB_TOTAL + $BUYED_DATA_R[1]["PRICE"];
	}
	//調出運費設定;	
    $TRANS_R = SEL("TRANS_SET","*","TRANS_DATA","SEQ_NBR != 1 && SEQ_NBR != 2","","");
	$trans_data = array();
	$TRANS_PRICE = array();
	$TRANS_UP = array();
	$TRANS_NUM = array();
	if($TRANS_R[0] == 1){
		/*$TA_L[1]=$TRANS_R[1][SEQ_NBR];
		$TRANS_PRICE[1][price]=$TRANS_R[1][TRANS_PRICE];
		$TRANS_UP[1][up]=$TRANS_R[1][TRANS_UP_NUM];*/
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
	//foreach_data($tans);
	//echo $BUY_SUB_TOTAL;
	//echo "共級數有".count($TRANS_NUM)."個<br>";
	$f=0;
	$total_money=0;
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
	if($_POST["trans_tt"] != 0){
		if($total_money != $_POST["trans_tt"]){
			$Msg=urlencode("運費錯誤！");
			ERRO_HEAD($Msg);
		}
	}
	if(substr($_POST["trans_phone"], 0, 1) == 9){
		$_POST["trans_phone"] = "0".$_POST["trans_phone"];
	}
	if(substr($_POST["trans_MOBILE"], 0, 1) == 9){
	   $_POST["trans_MOBILE"] = "0".$_POST["trans_MOBILE"];
	}
	if(LOG_PRVL == 2){
	    $PAY_TAB = 1;
	}else{
	    $PAY_TAB = 0;
	}
	$UPDATE_NM = "update SALES_CAR set FINISH_PAY = " . $BUY_SUB_TOTAL . ", TRANS_PRICE = " . $_POST["trans_tt"] . ", FINISH_TAB = 1, trans_name = \"" . $_POST["trans_name"] . "\", trans_phone = \"" . $_POST["trans_phone"] . "\", trans_MOBILE = \"" . $_POST["trans_MOBILE"] . "\", trans_adress = \"" . $_POST["trans_adress"] . "\", trans_time = \"" . $_POST["trans_time"] . "\", receipt_title = \"" . $_POST["receipt_title"] . "\", SN = " . $_POST["SN"] . ", receipt_adress = \"" . $_POST["receipt_adress"] . "\", receipt_type = " . $_POST["receipt_type"] . ", PAY_CHECK = " . $PAY_TAB . ", UPD_DT = " . $CRTE_TIME . " where SEQ_NBR = " . $CHECK_BUYED_R[1]["SEQ_NBR"];
	//echo $UPDATE_NM;
	if(!mysql_query($UPDATE_NM, MyLink)){
	    $Msg=urlencode("交易失敗！請向HICOLOR印刷購物網連絡！幫助您完成交易！");
		ERRO_HEAD($Msg);
        //$result_errro=$result."和".sprintf("$04d".$VALUE);
    }else{
		header("location:regist_mailto.php?sq=" . $CHECK_BUYED_R[1]["SEQ_NBR"]);
	    $Msg=urlencode("交易完成！我們會將本次的購物出貨單明細，寄到您的電子信箱裡！提供您確認！如有疑問請來電詢問！");
        OK_HEAD($Msg);
    }
}
?>