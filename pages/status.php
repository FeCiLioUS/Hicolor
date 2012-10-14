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
	$LOG_PAY="月結會員";
}else{
	$LOG_PAY="一般會員";
}
$buyer= $LOGIN_OBJ['LOGIN_ID'];
//調閱歷史;
$CHECK_HISTORY_BUYED_R=SEL("CHECK_HISTORY_BUYED","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
echo $CHECK_HISTORY_BUYED_R[0];
$history = array();
$SN_LIST_P = array();
$SN_LIST = array();
if($CHECK_HISTORY_BUYED_R[0]==1){
	array_push($history, $CHECK_HISTORY_BUYED_R[1]);
} else {
	$history = $CHECK_HISTORY_BUYED_R[1];
}
foreach ($history as $key => $value) {	
	array_push($SN_LIST_P, array("value" => $value["SEQ_NBR"], "name" => $value["SALES_LA"].sprintf("%04d",$value["SEQ_NBR"])));
	array_push($SN_LIST, array("value" => $value["SEQ_NBR"], "name" => $VALUE["SALES_LA"].sprintf("%04d",$VALUE["SEQ_NBR"])));
}
	   /*if($CHECK_HISTORY_BUYED_R[0]==1){
	       $SN_LIST_P="<option value=\"".$CHECK_HISTORY_BUYED_R[1][SEQ_NBR]."\">".$CHECK_HISTORY_BUYED_R[1][SALES_LA].sprintf("%04d",$CHECK_HISTORY_BUYED_R[1][SEQ_NBR])."</option>";
	       $SN_LIST="a[2]=new Option(\"".$CHECK_HISTORY_BUYED_R[1][SALES_LA].sprintf("%04d",$CHECK_HISTORY_BUYED_R[1][SEQ_NBR])."\",\"".$CHECK_HISTORY_BUYED_R[1][SEQ_NBR]."\");";
	   }else{
	       $t=1;
		   foreach($CHECK_HISTORY_BUYED_R[1] as $KEY=>$VALUE){
		       $t++;
			   $SN_LIST_P .="<option value=\"".$VALUE[SEQ_NBR]."\">".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."</option>";
		       $SN_LIST=$SN_LIST."a[".$t."]=new Option(\"".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."\",\"".$VALUE[SEQ_NBR]."\");";
		   }
	   }*/
//查詢購物車;
//foreach_data($_GET);
   if($_POST[MODE]){
	  /* $S_MO=$_POST[MODE];
	   $S_CAP=$_POST[Caption];
		//foreach_data($_POST);
       switch($_POST[MODE]){
	       case"DATE_SEARCH";
		   $DAT=explode("/",$_POST[Caption],3);
		   $SD=mktime(0,0,0,$DAT[1],$DAT[2],$DAT[0]);
		 //  echo $SD."<br>";
		   $ED=mktime(23,59,59,$DAT[1],$DAT[2],$DAT[0]);
		  // echo $ED."<br>";
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		//   echo $CHECK_BUYED_R[0];
		   $seach_total=$CHECK_BUYED_R[0];
		  // echo $seach_total;
		   if($seach_total==1){
		        $seach_sn_list="<option value=\"".$CHECK_BUYED_R[1][SEQ_NBR]."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf($CHECK_BUYED_R[1][SEQ_NBR])."</option>";
		   }else{
		        foreach($CHECK_BUYED_R[1] as $KEY=>$VALUE){
		            $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE[SEQ_NBR]."\">".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."</option>";
				}
		   }
		   $DISPLAY=0;
	       $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=0;
		   break;
	       case"MONTH_SEARCH";
		   $DAT=explode("/",$_POST[Caption],2);
		   $SD=mktime(0,0,0,$DAT[1],1,$DAT[0]);
		 //  echo $SD."<br>";
		   $ED=mktime(23,59,59,$DAT[1],date("t",mktime(0,0,0,$DAT[1],1,$DAT[0])),$DAT[0]);
		  // echo $ED."<br>";
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		//   echo $CHECK_BUYED_R[0];
		   $seach_total=$CHECK_BUYED_R[0];
		  // echo $seach_total;
		   if($seach_total==1){
		        $seach_sn_list="<option value=\"".$CHECK_BUYED_R[1][SEQ_NBR]."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf($CHECK_BUYED_R[1][SEQ_NBR])."</option>";
		   }else{
		        foreach($CHECK_BUYED_R[1] as $KEY=>$VALUE){
		            $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE[SEQ_NBR]."\">".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."</option>";
				}
		   }
		   $DISPLAY=0;
	       $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=0;
		   break;
		   case"FILES_SEARCH";
           $BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		 // echo $BUYED_R[0]."<br>";
		   if($BUYED_R[0]==0){
		       $CHECK_BUYED_R[0]=0;
		   }else if($BUYED_R[0]==1){
               $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
			   //echo $CHECK_DETAIL_BUYED_R[0]."<br>";
			   if($CHECK_DETAIL_BUYED_R[0]==1){
                    $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$CHECK_DETAIL_BUYED_R[1][SEQ_NBR]." && (FILE_NM like \"%".$_POST[Caption]."%\" || FILE_NICK like \"%".$_POST[Caption]."%\")","SEQ_NBR asc","");
					if($upload_R[0]!=0){
					//    echo "0 ==".$BUYED_R[1][SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
					    $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}
			   }else if($CHECK_DETAIL_BUYED_R[0]>1){
			   //echo "rqg";
			        foreach($CHECK_DETAIL_BUYED_R[1] as $KEY=>$VALUE){
                        $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE[SEQ_NBR]." && (FILE_NM like \"%".$_POST[Caption]."%\" || FILE_NICK like \"%".$_POST[Caption]."%\")","SEQ_NBR asc","");
					    if($upload_R[0]!=0){
					    //    echo "0 ==".$BUYED_R[1][SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
					        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
						}
					}
			   }
		   }else if($BUYED_R[0]>1){
		       $b=0;
		       foreach($BUYED_R[1] as $KEY=>$VALUE){
			        $b++;
                    $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$VALUE[SEQ_NBR],"SEQ_NBR asc","");
					if($CHECK_DETAIL_BUYED_R[0]==1){
					//echo "A".$KEY."<br>";
                        $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$CHECK_DETAIL_BUYED_R[1][SEQ_NBR]." && (FILE_NM like \"%".$_POST[Caption]."%\" || FILE_NICK like \"%".$_POST[Caption]."%\")","SEQ_NBR asc","");
					    if($upload_R[0]!=0){
						  //   echo $KEY."==".$VALUE[SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
							 $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}
					}else if($CHECK_DETAIL_BUYED_R[0]>1){
					//echo "B".$KEY."<br>";
					    foreach($CHECK_DETAIL_BUYED_R[1] as $KEY2=>$VALUE2){
						//echo $VALUE2[SEQ_NBR]."<br>";
                             $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE2[SEQ_NBR]." && (FILE_NM like \"%".$_POST[Caption]."%\" || FILE_NICK like \"%".$_POST[Caption]."%\")","SEQ_NBR asc","");
						     if($upload_R[0]!=0){
					        //     echo $KEY."==".$VALUE[SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
							     $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
							 }
						}
					}
			   }
		   }
		   $seach_total=count($BINGO_SEQ);
           if($seach_total>0){
		       $z=0;
		       foreach($BINGO_SEQ as $KEY=>$VALUE){
			      $z++;
			     // echo $VALUE."<br>";
                  $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$VALUE." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		         // echo $CHECK_BUYED_R[0]."<br>";
				  $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$VALUE)."</option>";
		       }
		   }   
		   $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=0;
		   break;
		   case"PRICE_SEARCH";
		   $price_a=explode("~",$_POST[Caption],2);
           $BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		   //echo $BUYED_R[0]."<br>";
		   if($BUYED_R[0]==0){
		       $CHECK_BUYED_R[0]=0;
		   }else if($BUYED_R[0]==1){
               $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
			  // echo $CHECK_DETAIL_BUYED_R[0]."<br>";
			   if($CHECK_DETAIL_BUYED_R[0]==1){
                    $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ],"SEQ_NBR asc","");
					$price_total=$PRICE_R[1][PRICE]+$BUYED_R[1][TRANS_PRICE];
					if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					   // echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
				        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}else{
					  //  echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
				    }
			   }else if($CHECK_DETAIL_BUYED_R[0]>1){
			        foreach($CHECK_DETAIL_BUYED_R[1] as $KEY=>$VALUE){
                        $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE[BUY_SEQ],"SEQ_NBR asc","");
						$price_total=$price_total+$PRICE_R[1][PRICE];
					}
					$price_total=$price_total+$BUYED_R[1][TRANS_PRICE];
				    if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					  //  echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE[BUY_SEQ]."，總金額為".$price_total."<br>";
				        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}else{
					 //   echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE[BUY_SEQ]."，總金額為".$price_total."<br>";
				    }
			   }
		   }else if($BUYED_R[0]>1){
		       $b=0;
		       foreach($BUYED_R[1] as $KEY=>$VALUE){
			        $b++;
                    $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$VALUE[SEQ_NBR],"SEQ_NBR asc","");
					if($CHECK_DETAIL_BUYED_R[0]==1){
					    $price_total=0;
                        $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ],"SEQ_NBR asc","");
					    $price_total=$PRICE_R[1][PRICE]+$VALUE[TRANS_PRICE];
						if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					       // echo "第".$KEY."個".$VALUE[SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
						    $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}else{
					      //  echo "第".$KEY."個".$VALUE[SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
						}
					}else if($CHECK_DETAIL_BUYED_R[0]>1){
					    $price_total=0;
					    foreach($CHECK_DETAIL_BUYED_R[1] as $KEY2=>$VALUE2){
                            $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE2[BUY_SEQ],"SEQ_NBR asc","");
						    $price_total=$price_total+$PRICE_R[1][PRICE];
						}
						$price_total=$price_total+$VALUE[TRANS_PRICE];
						if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					       // echo "第".$KEY."個".$VALUE[SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE2[BUY_SEQ]."，總金額為".$price_total."<br>";
						    $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}else{
					      //  echo "第".$KEY."個".$VALUE[SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE2[BUY_SEQ]."，總金額為".$price_total."<br>";
						}

					}
					
			   }
		   }
		   
		   $seach_total=count($BINGO_SEQ);
		  // echo $seach_total;
           if($seach_total>0){
		       $z=0;
		       foreach($BINGO_SEQ as $KEY=>$VALUE){
			      $z++;
			      //echo $VALUE."<br>";
                  $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$VALUE." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		         // echo $CHECK_BUYED_R[0]."<br>";
				  $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$VALUE)."</option>";
		       }
		   }   
		   $DISPLAY_RESULT=1;
		   break;
	   }
   */}else if($_GET[MODE]){/*
 //  foreach_data($_GET);
       switch($_GET[MODE]){
	       case"SN";
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_GET[Keyword]." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		   $DISPLAY=1;
	       $DISPLAY_RESULT=0;
		   $DISPLAY_BUY_LIST=1;
		   break;
		   case"DATE_SEARCH";
   		  // foreach_data($_GET);
		   $DAT=explode("/",$_GET[Caption],3);
		   $SD=mktime(0,0,0,$DAT[1],$DAT[2],$DAT[0]);
		  // echo $SD."<br>";
		   $ED=mktime(23,59,59,$DAT[1],$DAT[2],$DAT[0]);
		  // echo $ED."<br>";
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		  // echo $CHECK_BUYED_R[0];
		   $seach_total=$CHECK_BUYED_R[0];
		   if($seach_total==1){
		        $seach_sn_list="<option value=\"".$CHECK_BUYED_R[1][SEQ_NBR]."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf($CHECK_BUYED_R[1][SEQ_NBR])."</option>";
		   }else{
		        foreach($CHECK_BUYED_R[1] as $KEY=>$VALUE){
		            $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE[SEQ_NBR]."\">".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."</option>";
				}
		   }
		   $S_MO=$_GET[MODE];
		   $S_CAP=$_GET[Caption];
		   $DISPLAY=$_GET[DISPLAY];
	       $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=1;
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_GET[SN]." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
		   break;
		   case"MONTH_SEARCH";
   		  // foreach_data($_GET);
		   $DAT=explode("/",$_GET[Caption],2);
		   $SD=mktime(0,0,0,$DAT[1],1,$DAT[0]);
		  // echo $SD."<br>";
		   $ED=mktime(23,59,59,$DAT[1],date("t",mktime(0,0,0,$DAT[1],1,$DAT[0])),$DAT[0]);
		  // echo $ED."<br>";
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && ( UPD_DT >= ".$SD." && UPD_DT <= ".$ED." ) && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		  // echo $CHECK_BUYED_R[0];
		   $seach_total=$CHECK_BUYED_R[0];
		   if($seach_total==1){
		        $seach_sn_list="<option value=\"".$CHECK_BUYED_R[1][SEQ_NBR]."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf($CHECK_BUYED_R[1][SEQ_NBR])."</option>";
		   }else{
		        foreach($CHECK_BUYED_R[1] as $KEY=>$VALUE){
		            $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE[SEQ_NBR]."\">".$VALUE[SALES_LA].sprintf("%04d",$VALUE[SEQ_NBR])."</option>";
				}
		   }
		   $S_MO=$_GET[MODE];
		   $S_CAP=$_GET[Caption];
		   $DISPLAY=$_GET[DISPLAY];
	       $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=1;
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_GET[SN]." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
		   break;
		   case"FILES_SEARCH";
		  // foreach_data($_GET);
		   $BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		  // echo $BUYED_R[0]."<br>";
		   if($BUYED_R[0]==0){
		       $CHECK_BUYED_R[0]=0;
		   }else if($BUYED_R[0]==1){
               $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
			   //echo $CHECK_DETAIL_BUYED_R[0]."<br>";
			   if($CHECK_DETAIL_BUYED_R[0]==1){
                    $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$CHECK_DETAIL_BUYED_R[1][SEQ_NBR]." && (FILE_NM like \"%".$_GET[Caption]."%\" || FILE_NICK like \"%".$_GET[Caption]."%\")","SEQ_NBR asc","");
					if($upload_R[0]!=0){
					   // echo "0 ==".$BUYED_R[1][SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
					    $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}
			   }else if($CHECK_DETAIL_BUYED_R[0]>1){
			        foreach($CHECK_DETAIL_BUYED_R[1] as $KEY=>$VALUE){
                        $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE[SEQ_NBR]." && (FILE_NM like \"%".$_GET[Caption]."%\" || FILE_NICK like \"%".$_GET[Caption]."%\")","SEQ_NBR asc","");
					    if($upload_R[0]!=0){
					      //  echo "0 ==".$BUYED_R[1][SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
					        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
						}
					}
			   }
		   }else if($BUYED_R[0]>1){
		       $b=0;
		       foreach($BUYED_R[1] as $KEY=>$VALUE){
			        $b++;
                    $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$VALUE[SEQ_NBR],"SEQ_NBR asc","");
					if($CHECK_DETAIL_BUYED_R[0]==1){
					//echo "A".$KEY."<br>";
                        $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$CHECK_DETAIL_BUYED_R[1][SEQ_NBR]." && (FILE_NM like \"%".$_GET[Caption]."%\" || FILE_NICK like \"%".$_GET[Caption]."%\")","SEQ_NBR asc","");
					    if($upload_R[0]!=0){
						     //echo $KEY."==".$VALUE[SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
							 $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}
					}else if($CHECK_DETAIL_BUYED_R[0]>1){
					//echo "B".$KEY."<br>";
					    foreach($CHECK_DETAIL_BUYED_R[1] as $KEY2=>$VALUE2){
						//echo $VALUE2[SEQ_NBR]."<br>";
                             $upload_R=SEL("BUY_CHECK","*","SALES_CAR_UPLOAD","SALES_DETAIL_SEQ = ".$VALUE2[SEQ_NBR]." && (FILE_NM like \"%".$_GET[Caption]."%\" || FILE_NICK like \"%".$_GET[Caption]."%\")","SEQ_NBR asc","");
						     if($upload_R[0]!=0){
					            // echo $KEY."==".$VALUE[SEQ_NBR]."==".$CHECK_DETAIL_BUYED_R[0]."，有".$upload_R[0]."個上傳檔案符合標準<br>";
							     $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
							 }
						}
					}
			   }
		   }
		   $seach_total=count($BINGO_SEQ);
		   if($seach_total>0){
		       $z=0;
		       foreach($BINGO_SEQ as $KEY=>$VALUE){
			      $z++;
			     // echo $VALUE."<br>";
                  $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$VALUE." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		          //echo $CHECK_BUYED_R[0]."<br>";
				  $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$VALUE)."</option>";
		       }
		   }   
		   $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=1;
		   $S_MO=$_GET[MODE];
		   $S_CAP=$_GET[Caption];
		   $DISPLAY=$_GET[DISPLAY];
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_GET[SN]." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
		   break;
		   case"PRICE_SEARCH";
		 //  foreach_data($_GET);
		   $price_a=explode("~",$_GET[Caption],2);
           $BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		  // echo $BUYED_R[0]."<br>";
		   if($BUYED_R[0]==0){
		       $CHECK_BUYED_R[0]=0;
		   }else if($BUYED_R[0]==1){
               $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
			  // echo $CHECK_DETAIL_BUYED_R[0]."<br>";
			   if($CHECK_DETAIL_BUYED_R[0]==1){
                    $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ],"SEQ_NBR asc","");
					$price_total=$PRICE_R[1][PRICE]+$BUYED_R[1][TRANS_PRICE];
					if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					   // echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
				        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}else{
					 //   echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
				    }
			   }else if($CHECK_DETAIL_BUYED_R[0]>1){
			        foreach($CHECK_DETAIL_BUYED_R[1] as $KEY=>$VALUE){
                        $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE[BUY_SEQ],"SEQ_NBR asc","");
						$price_total=$price_total+$PRICE_R[1][PRICE];
					}
					$price_total=$price_total+$BUYED_R[1][TRANS_PRICE];
				    if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					 //   echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE[BUY_SEQ]."，總金額為".$price_total."<br>";
				        $BINGO_SEQ[1]=$BUYED_R[1][SEQ_NBR];
					}else{
					  //  echo "第".$KEY."個".$BUYED_R[1][SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE[BUY_SEQ]."，總金額為".$price_total."<br>";
				    }
			   }
		   }else if($BUYED_R[0]>1){
		       $b=0;
		       foreach($BUYED_R[1] as $KEY=>$VALUE){
			        $b++;
                    $CHECK_DETAIL_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR_DETAIL","SALES_SEQ = ".$VALUE[SEQ_NBR],"SEQ_NBR asc","");
					if($CHECK_DETAIL_BUYED_R[0]==1){
					    $price_total=0;
                        $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ],"SEQ_NBR asc","");
					    $price_total=$PRICE_R[1][PRICE]+$VALUE[TRANS_PRICE];
						if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					      //  echo "第".$KEY."個".$VALUE[SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
						    $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}else{
					       // echo "第".$KEY."個".$VALUE[SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$CHECK_DETAIL_BUYED_R[1][BUY_SEQ]."，總金額為".$price_total."<br>";
						}
					}else if($CHECK_DETAIL_BUYED_R[0]>1){
					    $price_total=0;
					    foreach($CHECK_DETAIL_BUYED_R[1] as $KEY2=>$VALUE2){
                            $PRICE_R=SEL("PRICE_CHECK","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE2[BUY_SEQ],"SEQ_NBR asc","");
						    $price_total=$price_total+$PRICE_R[1][PRICE];
						}
						$price_total=$price_total+$VALUE[TRANS_PRICE];
						if($price_a[0]<=$price_total && $price_total<=$price_a[1]){
					     //   echo "第".$KEY."個".$VALUE[SEQ_NBR]."符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE2[BUY_SEQ]."，總金額為".$price_total."<br>";
						    $BINGO_SEQ[$b]=$VALUE[SEQ_NBR];
						}else{
					     //   echo "第".$KEY."個".$VALUE[SEQ_NBR]."不符合===有".$CHECK_DETAIL_BUYED_R[0]."筆，交易編號為：".$VALUE2[BUY_SEQ]."，總金額為".$price_total."<br>";
						}

					}
					
			   }
		   }
		   $seach_total=count($BINGO_SEQ);
		  // echo $seach_total;
           if($seach_total>0){
		       $z=0;
		       foreach($BINGO_SEQ as $KEY=>$VALUE){
			      $z++;
			     // echo $VALUE."<br>";
                  $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$VALUE." && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
		         // echo $CHECK_BUYED_R[0]."<br>";
				  $seach_sn_list=$seach_sn_list."<option value=\"".$VALUE."\">".$CHECK_BUYED_R[1][SALES_LA].sprintf("%04d",$VALUE)."</option>";
		       }
		   }   
		   $DISPLAY_RESULT=1;
		   $DISPLAY_BUY_LIST=1;
		   $S_MO=$_GET[MODE];
		   $S_CAP=$_GET[Caption];
		   $DISPLAY=$_GET[DISPLAY];
           $CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR = ".$_GET[SN]." && SEQ_NBR != 1 && SEQ_NBR != 0","","");
		   break;
	   }
   */}else{
		$buyInfo = end($history);
       //$CHECK_BUYED_R=SEL("BUY_CHECK","*","SALES_CAR","BUYER = ".$buyer." && FINISH_TAB = 1 && SEQ_NBR != 1 && SEQ_NBR != 0","SEQ_NBR asc","");
	   //echo $CHECK_BUYED_R[1][CLOSE];	   
	   /*if($CHECK_HISTORY_BUYED_R[0] == 0){
	       //$BUY_LIST="<tr valign=\"bottom\" class=\"PS\"><td height=\"35\" colspan=\"8\"><div align=\"center\" class=\"style48\">查無任何交易記錄！</div></td></tr>";
	   }else if($CHECK_BUYED_R[0]==1){
	   }else{
	       $CHECK_BUYED_R[1]=end($CHECK_BUYED_R[1]);
	   }*/	   
	   $DISPLAY=1;
	   $DISPLAY_RESULT=0;
	   $DISPLAY_BUY_LIST=1;
	   $List_mode="最後交易訂單";
   }   
   if(count($buyInfo) != 0) {		
       if($buyInfo["CLOSE"]==1){	       
		   $STAUS="已結案";
		   $CLOSE_STATUS = true;
	   }else {
	       $STAUS="進行中";
		   $CLOSE_STATUS = false;
       }
       if($buyInfo["PAY_CHECK"]==1){
			$PAY_STATUS = true;
          // $PAY_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
       }else{
			$PAY_STATUS = false;
           //$PAY_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
       }
       if($buyInfo["FILES_CHECK"]==1){
			$FILES_STATUS = true;
           //$FILES_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
       }else{
			$FILES_STATUS = false;
          // $FILES_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
       }
       if($buyInfo["PRINT_CHECK"]==1){
			$PRINT_STATUS = true;
           //$PRINT_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
       }else{
			$PRINT_STATUS = false;
          // $PRINT_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
       }
       if($buyInfo["TRANS_CHECK"]==1){
			$TRANS_STATUS = true;
          //$TRANS_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
       }else{
			$TRANS_STATUS = false;
           //$TRANS_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
       }
       //if($buyInfo["CLOSE"]==1){
           //$CLOSE_PHOTO="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
      // }else{
           //$CLOSE_PHOTO="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
       //}
   }
   //echo date("Y/m/d",$CHECK_BUYED_R[1][UPD_DT]);
  /* $trans_ti=split("~",$CHECK_BUYED_R[1][trans_time],2);
   if(substr($trans_ti[0],0,2)>12){
       $SH=sprintf("%02d",(substr($trans_ti[0],0,2)-12));
       $start_hour="PM-".$SH."：".substr($trans_ti[0],2,2);
   }else{
       $start_hour="AM-".substr($trans_ti[0],0,2)."：".substr($trans_ti[0],2,2);
   }
   if(substr($trans_ti[1],0,2)>12){
       $EH=sprintf("%02d",(substr($trans_ti[1],0,2)-12));
       $end_hour="PM".$EH."：".substr($trans_ti[1],2,2);
   }else{
       $end_hour="AM".substr($trans_ti[1],0,2)."：".substr($trans_ti[1],2,2);
   }
 //  echo $CHECK_BUYED_R[1][receipt_type];
   
   switch($CHECK_BUYED_R[1][receipt_type]){
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
   //查詢購物內容;
   $BUYED_DETAIL_R=SEL("BUY_DETAIL","*","SALES_CAR_DETAIL","SALES_SEQ = ".$CHECK_BUYED_R[1][SEQ_NBR],"SEQ_NBR asc","");
 //  echo $BUYED_DETAIL_R[0];
   if($BUYED_DETAIL_R[0]==1){
          $BUYED_DATA_R=SEL("BUY_DATA","*","PRODUCT_DATA","SEQ_NBR = ".$BUYED_DETAIL_R[1][BUY_SEQ],"","");
		  //echo $BUYED_DATA_R[1][KIND]."===".$BUYED_DATA_R[1][SUBKIND]."<br>";
		  //echo $BUYED_DETAIL_R[1][UPLOAD_TAB];
          if($BUYED_DATA_R[1][FACE]==1){
		      $BUY_FACE="單";
		  }else if($BUYED_DATA_R[1][FACE]==2){
		      $BUY_FACE="雙";
		  }
		 
		  if($CHECK_BUYED_R[1][FILES_CHECK]==1){
		      if($BUYED_DETAIL_R[1][UPLOAD_TAB]==1){
			      $upload_ps="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
			  }else{
			      $upload_ps="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
			  }
		  }else if($CHECK_BUYED_R[1][FILES_CHECK]==0){
		      if($BUYED_DETAIL_R[1][UPLOAD_TAB]==1){
			      $upload_ps="<a href=\"javascript:upload_fix(".$BUYED_DETAIL_R[1][SEQ_NBR].",1);\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('upload1','','upload_fix_in.jpg',1)\"><img src=\"upload_fix.jpg\" name=\"upload1\" alt=\"檔案管理\" width=\"16\" height=\"18\" border=\"0\"></a>";
			  }else{
			      $upload_ps="<a href=\"javascript:upload_file(".$BUYED_DETAIL_R[1][SEQ_NBR].",1);\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('upload1','','upload_in.JPG',1)\"><img src=\"upload.jpg\" name=\"upload1\" alt=\"檔案上傳\" width=\"16\" height=\"18\" border=\"0\"></a>";
			  }
		  }
		  $r=1;
		  //查詢所購買的類別和規格;
          $BUYED_KIND_R=SEL("BUY_KIND","*","PRODUCT_KIND","SEQ_NBR = ".$BUYED_DATA_R[1][KIND],"","");
		  $BUYED_SUBKIND_R=SEL("BUY_SUBKIND","*","PRODUCT_SUBKIND","SEQ_NBR = ".$BUYED_DATA_R[1][SUBKIND],"","");
		  $BUY_LIST=$BUY_LIST."<tr valign=\"middle\" bgcolor=\"#D9D9D9\" class=\"contents\"><td height=\"30\"><div align=\"center\">1</div></td><td height=\"30\"><div align=\"center\">".$BUYED_KIND_R[1][NAME]."</div></td><td height=\"30\"><div align=\"center\">".$BUYED_SUBKIND_R[1][PRO_SUBKIND_NAME]."</div></td><td height=\"30\"><div align=\"center\">".$BUY_FACE."面</div></td><td height=\"30\"><div align=\"center\">".$BUYED_SUBKIND_R[1][FINISH_W]."X".$BUYED_SUBKIND_R[1][FINISH_H]."</div></td><td height=\"30\"><div align=\"center\">".$BUYED_DATA_R[1][AMOUNT].$BUYED_DATA_R[1][UNIT_NM]."</div></td><td height=\"30\"><div align=\"center\">".$upload_ps."</div></td><td height=\"30\"><div align=\"center\"></div><div align=\"center\">".$BUYED_DATA_R[1][PRICE]."</div></td></tr>";
		  $tans[1]=$BUYED_DATA_R[1][TRANS_LEV];
		  $BUY_SUB_TOTAL=$BUYED_DATA_R[1][PRICE];
   }else if($BUYED_DETAIL_R[0]>1){
       $r=0;
       foreach($BUYED_DETAIL_R[1] as $KEY=>$VALUE){
	      $r++;
          $BUYED_DATA_R=SEL("BUY_DATA","*","PRODUCT_DATA","SEQ_NBR = ".$VALUE[BUY_SEQ],"","");
		  //  echo $BUYED_DATA_R[1][KIND]."===".$BUYED_DATA_R[1][SUBKIND]."<br>";
		  //查詢所購買的類別和規格;
          $BUYED_KIND_R=SEL("BUY_KIND","*","PRODUCT_KIND","SEQ_NBR = ".$BUYED_DATA_R[1][KIND],"","");
		  $BUYED_SUBKIND_R=SEL("BUY_SUBKIND","*","PRODUCT_SUBKIND","SEQ_NBR = ".$BUYED_DATA_R[1][SUBKIND],"","");
		  if($BUYED_DATA_R[1][FACE]==1){
		      $BUY_FACE="單";
		  }else if($BUYED_DATA_R[1][FACE]==2){
		      $BUY_FACE="雙";
		  }
		  if($CHECK_BUYED_R[1][FILES_CHECK]==1){
		      if($VALUE[UPLOAD_TAB]==1){
			      $upload_ps="<img src=\"ok_gray.jpg\" width=\"13\" height=\"13\">";
			  }else{
			      $upload_ps="<img src=\"no_gray.jpg\" width=\"13\" height=\"13\">";
			  }
		  }else if($CHECK_BUYED_R[1][FILES_CHECK]==0){
		      if($VALUE[UPLOAD_TAB]==1){
			      $upload_ps="<a href=\"javascript:upload_fix(".$VALUE[SEQ_NBR].",".$r.");\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('upload_fix".$r."','','upload_fix_in.jpg',1)\"><img src=\"upload_fix.jpg\" name=\"upload_fix".$r."\" alt=\"檔案管理\" width=\"16\" height=\"18\" border=\"0\"></a>";
			  }else{
			      $upload_ps="<a href=\"javascript:upload_file(".$VALUE[SEQ_NBR].",".$r.");\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('upload".$r."','','upload_in.JPG',1)\"><img src=\"upload.jpg\" name=\"upload".$r."\" alt=\"檔案上傳\" width=\"16\" height=\"18\" border=\"0\"></a>";
			  }
		  }
		  $BUY_LIST=$BUY_LIST."<tr valign=\"middle\" bgcolor=\"#D9D9D9\" class=\"contents\"><td height=\"30\"><div align=\"center\">".$r."</div></td><td height=\"30\"><div align=\"center\">".$BUYED_KIND_R[1][NAME]."</div></td><td height=\"30\"><div align=\"center\">".$BUYED_SUBKIND_R[1][PRO_SUBKIND_NAME]."</div></td><td height=\"30\"><div align=\"center\">".$BUY_FACE."面</div></td><td height=\"30\"><div align=\"center\">".$BUYED_SUBKIND_R[1][FINISH_W]."X".$BUYED_SUBKIND_R[1][FINISH_H]."</div></td><td height=\"30\"><div align=\"center\">".$BUYED_DATA_R[1][AMOUNT].$BUYED_DATA_R[1][UNIT_NM]."</div></td><td height=\"30\"><div align=\"center\">".$upload_ps."</div></td><td height=\"30\"><div align=\"center\"></div><div align=\"center\">".$BUYED_DATA_R[1][PRICE]."</div></td></tr>";
		  $tans[$r]=$BUYED_DATA_R[1][TRANS_LEV];
		  $BUY_SUB_TOTAL=$BUY_SUB_TOTAL+$BUYED_DATA_R[1][PRICE];
	   }
   }
      //調出運費設定;
    $TRANS_R=SEL("TRANS_SET","*","TRANS_DATA","SEQ_NBR != 1 && SEQ_NBR != 2","","");
	if($TRANS_R[0]==1){
		$TA_L[1]=$TRANS_R[1][SEQ_NBR];
		$TRANS_PRICE[1][price]=$TRANS_R[1][TRANS_PRICE];
		$TRANS_UP[1][up]=$TRANS_R[1][TRANS_UP_NUM];
	}else if($TRANS_R[0]>1){
	    $t=0;
	    foreach($TRANS_R[1] as $KEY=>$VALUE){
		    $t++;
			//echo "等級".$t."==".$VALUE[SEQ_NBR]."<br>";
			//比對運費比數;
			$g=0;
			foreach($tans as $KEY2=>$VALUE2){		
			    if($VALUE2==$VALUE[SEQ_NBR]){
				    $g++;
					$TRANS_NUM[$t]=$g;
				}else{
				    $TRANS_NUM[$t]=$TRANS_NUM[$t]+0;
				}
			}
		    $TRANS_PRICE[$t][price]=$VALUE[TRANS_PRICE];
		    $TRANS_UP[$t][up]=$VALUE[TRANS_UP_NUM];
		}
	}
	//echo "共級數有".count($TRANS_NUM)."個<br>";
	$f=0;
	$total_monery=0;
	foreach($TRANS_NUM as $KEY=>$VALUE){
		$up_num=0;
	 //  echo "級數".$KEY."====有".$TRANS_NUM[$KEY]."筆<br>";
		if($TRANS_NUM[$KEY]>=$TRANS_UP[$KEY][up] && $TRANS_UP[$KEY][up]!="" && $TRANS_UP[$KEY][up]>1){
		     $up_num=floor($TRANS_NUM[$KEY]/$TRANS_UP[$KEY][up]);
			 $TRANS_NUM[$KEY]=$TRANS_NUM[$KEY]-($up_num*$TRANS_UP[$KEY][up]);
			 $total_monery=$total_monery+($TRANS_NUM[$KEY]*$TRANS_PRICE[$KEY][price]);			 
			// echo "修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$total_monery."<br>";
			 $TRANS_NUM[$KEY+1]=$TRANS_NUM[$KEY+1]+$up_num;
			// echo "下一級為".$TRANS_NUM[$KEY+1]."個<br>";
		}else{
		     $total_monery=$total_monery+($TRANS_NUM[$KEY]*$TRANS_PRICE[$KEY][price]);
		  // 	echo "修改後級數".$KEY."====有".$TRANS_NUM[$KEY]."筆，金額為".$total_monery."<br>";
		}
	}
	if($CHECK_BUYED_R[1][SALES_LA]=="A"){
        $pay_ta="月結會員";
	}else{
	    $pay_ta="繳費";
	}
$seach_display_con="<td height=\"35\"><div align=\"center\" class=\"style26\"><div align=\"center\"><img src=\"arrowhead_small_bred.jpg\" width=\"9\" height=\"9\"></div></div></td><td height=\"35\" class=\"topic\">查詢結果：</td><td height=\"35\" class=\"info\">&nbsp;</td></tr><tr><td height=\"10\" colspan=\"4\"><div align=\"center\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"3%\">&nbsp;</td><td width=\"97%\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td><div align=\"left\"><span class=\"info\">你一共查詢到 <span class=\"style48\">".$seach_total."</span> 筆資料 </span><select name=\"search_result\" style=\"font-size:9pt;width:100px;height:20px;\" onChange=\"SELE_RESULT(this.options[this.selectedIndex].value);\"><option value=\"0\">--選擇編號--</option>".$seach_sn_list."</select></div></td></tr></table></td></tr></table><span class=\"style46\"></span></div></td></tr>";
*/
$hicolor-> assign('pageTitle', '交易記錄');
$hicolor-> assign('memberSN', $LOG_PRVL.sprintf("%05d",$buyer));
$hicolor-> assign('List_mode', $List_mode);
$hicolor-> assign("contentPath", "../templates/status.tpl");
$hicolor-> display("standard_template.tpl");
?>