<?
define("ERRO_HEAD_URL","about.php");
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
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//載入產品項目;
if(!$_GET[MODE]){
	$_GET[MODE]= $hicolor->FREE_MODE;
}
$hicolor-> assign('memberSN', $LOG_PRVL.sprintf("%05d",$buyer));
//查詢購物車;
$CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 0","","");
//查詢購物內容;
$BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
$butyedInfo= array();
$hicolor-> assign('saleTotal', $BUYED_DETAIL_R[0]);
if($CHECK_BUYED_R[0] == 0){
	$hicolor-> assign('hasBasket', false);
	$hicolor-> assign('subTotal', 0);
	$BUYED_DETAIL_R[0]=0;
}else{
	$hicolor-> assign('hasBasket', true);
	$hicolor-> assign('saleSN', $LOG_PRVL.sprintf("%04d", $CHECK_BUYED_R[1][SEQ_NBR]));
	$BUY_SUB_TOTAL= 0;
	$buyedDetail= array();	
	$tans= array();
	if($BUYED_DETAIL_R[0] == 1){
		array_push($buyedDetail, $BUYED_DETAIL_R[1]);		
	}else if($BUYED_DETAIL_R[0] > 1){
		$buyedDetail= $BUYED_DETAIL_R[1];
	}
	$r=0;
	foreach($buyedDetail as $KEY=>$VALUE){
		$r++;		
		$BUYED_DATA_R=SEL("BUY_DATA","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE[BUY_SEQ],"","");
		if($BUYED_DATA_R[1][FACE]==1){
			$BUY_FACE="單";
		}else if($BUYED_DATA_R[1][FACE]==2){
			$BUY_FACE="雙";
		}
		if($VALUE[UPLOAD_TAB]==0){
			$upload_type="upload_file";
			$upload_m="檔案上傳";
			$upLoadClass="upload";
		}else if($VALUE[UPLOAD_TAB]==1){
			$upload_type="upload_fix";
			$upload_m="檔案管理";
			$upLoadClass="upload_fix";
		}
		//查詢所購買的類別和規格;
		$BUYED_KIND_R=SEL("BUY_KIND","*","PRODUCT_KIND","SEQ_NBR = ".$BUYED_DATA_R[1][KIND],"","");
		$BUYED_SUBKIND_R=SEL("BUY_SUBKIND","*","PRODUCT_SUBKIND","SEQ_NBR = ".$BUYED_DATA_R[1][SUBKIND],"","");
		array_push($tans, $BUYED_DATA_R[1][TRANS_LEV]);
		$BUY_SUB_TOTAL=$BUY_SUB_TOTAL+$BUYED_DATA_R[1][PRICE];
		$newData= array(
			"itemSN"=> $VALUE[SEQ_NBR],
			"kindName"=> $BUYED_KIND_R[1][NAME],
			"proSubKindName"=> $BUYED_SUBKIND_R[1][PRO_SUBKIND_NAME],
			"face"=> $BUY_FACE,
			"finishX"=> $BUYED_SUBKIND_R[1][FINISH_W],
			"finishY"=> $BUYED_SUBKIND_R[1][FINISH_H],
			"count"=> $BUYED_DATA_R[1][AMOUNT].$BUYED_DATA_R[1][UNIT_NM],
			"price"=> $BUYED_DATA_R[1][PRICE],
			"uploadType"=> $upload_type,
			"upLoadClass"=> $upLoadClass,
			"uploadMsg"=> $upload_m
		);
		array_push($butyedInfo, $newData);
	}
	$hicolor-> assign('subTotal', $BUY_SUB_TOTAL);
	$hicolor-> assign('butyedInfo', $butyedInfo);
}
//調出運費設定;
$TRANS_R=SEL("TRANS_SET","*","TRANS_DATA","SEQ_NBR != 1 && SEQ_NBR != 2","","");
$TRANS_PRICE= array();
$TRANS_UP= array();
if($TRANS_R[0] == 0){	
}else{
	if($TRANS_R[0] == 1){
		$transData= $TRANS_R[1];
		$TRANS_R[1]= array($transData);
	}
	$t=0;
	foreach($TRANS_R[1] as $KEY => $VALUE){
		//比對運費比數;
		//echo $VALUE[SEQ_NBR]."<br>";
		$g=0;
		foreach($tans as $KEY2=>$VALUE2){
			//echo $VALUE2."<br>";
			if($VALUE2 == $VALUE[SEQ_NBR]){
				$g++;
				$TRANS_NUM[$t]=$g;
			}else{
				$TRANS_NUM[$t]=$TRANS_NUM[$t]+0;
			}
		}
		$TRANS_PRICE[$t][price]=$VALUE[TRANS_PRICE];
		$TRANS_UP[$t][up]=$VALUE[TRANS_UP_NUM];
		$t++;
	}
}
//echo "共級數有".count($TRANS_NUM)."個<br>";
$transTotal=0;
foreach($TRANS_NUM as $KEY=>$VALUE){
	$up_num=0;
	//echo "級數".$KEY."====有".$TRANS_NUM[$KEY]."筆,升級限制為:".$TRANS_UP[$KEY][up].",此級金額單價為".$TRANS_PRICE[$KEY][price]."<br>";
	if($TRANS_NUM[$KEY] >= $TRANS_UP[$KEY][up] && $TRANS_UP[$KEY][up] != "" && $TRANS_UP[$KEY][up] > 1){
		 //echo "-------共有".$TRANS_NUM[$KEY]."筆,升級限制:".$TRANS_UP[$KEY][up]."<br>";
		 $up_num=floor($TRANS_NUM[$KEY]/$TRANS_UP[$KEY][up]);
		 $TRANS_NUM[$KEY]=$TRANS_NUM[$KEY]-($up_num*$TRANS_UP[$KEY][up]);
		 $transTotal=$transTotal+($TRANS_NUM[$KEY]*$TRANS_PRICE[$KEY][price]);			 
		 //echo "-------修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$transTotal."<br>";
		 //echo "-------下一次原本有:".$TRANS_NUM[$KEY+1]."筆<br>";
		 $TRANS_NUM[$KEY+1]=$TRANS_NUM[$KEY+1]+$up_num;
		 //echo "-------下一級為".$TRANS_NUM[$KEY+1]."個<br>";
	}else{
		 $transTotal=$transTotal+($TRANS_NUM[$KEY]*$TRANS_PRICE[$KEY][price]);
		 //echo "-------修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$transTotal."<br>";
	}
}
//echo $transTotal;
$total= $transTotal + $BUY_SUB_TOTAL;
$hicolor-> assign('total', $total);
$hicolor-> assign('transTotal', $transTotal);
$hicolor-> assign('MODE', $_GET[MODE]);
$hicolor-> assign('SUBKIND', $_GET[SUBKIND]);
$hicolor-> assign('pageTitle', '購物車');
$hicolor-> assign("contentPath", "../templates/sales_car.tpl");
$hicolor-> display("standard_template.tpl");
?>