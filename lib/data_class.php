<?php

//上支程式的變數值資料處理;
//-------------------------------------------------------------------------------------------------------------------------------------------
  
  
   //列印變數名稱及值;
   function foreach_data($DATA)
   {
       foreach($DATA as $KEY=>$VALUE){
          echo $KEY,"==".$VALUE."<br>";
       }
   }
   //非法字元檢查;
   function check($Msg)
   {  		
       $CHECK = 0;
       if($_POST){
	       foreach($_POST as $Key=>$Value){
		      $INF=$INF.("&".$Key."=".urlencode($Value)); 				    
		      if (eregi("[\"]",$Value)) {			    
			      $_POST[$Key]=str_replace("\"","",$Value);				 
				 // echo $_POST[$Key];
			      $CHECK=1;
			  }else if(eregi("[\']",$Value)){
			      $_POST[$Key]=str_replace("\'","",$Value);				 
				 // echo $_POST[$Key];
			      $CHECK=1;			  
			  }else if(eregi("[\$]",$Value)){
			      $_POST[$Key]=str_replace("\$","",$Value);				 
				 // echo $_POST[$Key];
			      $CHECK=1;	
			  }
	       }
		  // echo $INF;
	   }
       if($_GET){
	       foreach($_GET as $Key2=>$Value2){	       
		       $INF=$INF.("&".$Key2."=".urlencode($Value2)); 				    
		       if (eregi("[\"]",$Value2)) {			    
			      $_GET[$Key2]=str_replace("\"","",$Value2);				 
				 // echo $_GET[$Key2];
			      $CHECK=1;
			  }else if(eregi("[\']",$Value2)){
			      $_GET[$Key2]=str_replace("\'","",$Value2);				 
				 // echo $_GET[$Key2];
			      $CHECK=1;			  
			  }else if(eregi("[\$]",$Value2)){
			      $_GET[$Key2]=str_replace("\$","",$Value2);				 
				 // echo $_GET[$Key2];
			      $CHECK=1;	
			  }
	       }
	   }	 
	   if($CHECK==1){
	      ERRO_HEAD($Msg);	
	   }
	   return;	
   } 
   //字串、數字處理;
   function slashes()
   {
        foreach($_POST as $Key=>$Value){
			if($Value != ""){
				if(eregi("[^0-9]",$Value)){
					//echo $Key."==>".$Value."<br>";
				   $_POST[$Key]=addslashes($Value); 				
				}			
				else{
				   //echo $Key."==>".$Value."<br>";
				   if($Value[0] != "0"){
						settype($Value,"integer");
				   }				   
				   $_POST[$Key]=$Value;
				}
			}		    			
		}		
		return $_POST;
   }
   
   //日期檢查並回傳值;   
   function DATE_CHECK($DATE){
	    $DATE=str_replace("-","/",$DATE);
		$DATE_array=split("/",$DATE,3);
		$DATE_array[0]=sprintf("%04d",$DATE_array[0]);
	    $DATE_array[1]=sprintf("%02d",$DATE_array[1]);
	    $DATE_array[2]=sprintf("%02d",$DATE_array[2]);
		if($DATE_array[0]<1911 || eregi("[^0-9]",$DATE_array[0])){
		     $Msg=urlencode("請填寫正確的年份格式「年/月/日」！例如：2007/04/04");
			 ERRO_HEAD($Msg);
		}else if($DATE_array[1]<1 || $DATE_array[1]>12 || eregi("[^0-9]",$DATE_array[1])){
		     $Msg=urlencode("請填寫正確的月份！");
			 ERRO_HEAD($Msg);	
		}else if($DATE_array[2]<1 || $DATE_array[2]>date("t",mktime(0,0,0,$DATE_array[1],1,$DATE_array[0])) ||  eregi("[^0-9]",$DATE_array[2])){
		     $Msg=urlencode("請填寫正確的日期！");
			 ERRO_HEAD($Msg);
		}
		return mktime(0,0,0,$DATE_array[1],$DATE_array[2],$DATE_array[0]);
	}
	
	
//登入狀態及權限檢查;
//-------------------------------------------------------------------------------------------------------------------------------------------
    
	
	//判斷管理者是否登入;
	function ADMIN_LOGIN(){       
       $QUERY_NM="LOG_CHECK";
       $QUERY_SELECT_NM="*";
       $QUERY_TABLES_NM="ADMIN_COOKIE";
	   //echo $_COOKIE["ADMIN_COOKIE"];
       $QUERY_WHERE_ARG="COOKIE_VAL = \"".$_COOKIE["ADMIN_COOKIE"]."\" and LOG_OUT =\"\"";//
       $QUERY_ORDER_ARG="";//SEQ_NBR asc
       $QUERY_limit_ARG="";//"0,20"
       $LOG_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);	 
	  // echo   $LOG_CHECK_R[0];
	   define("LOG_TAB",$LOG_CHECK_R[0]);	
	   $LOGIN_ID=$LOG_CHECK_R[1][ADMIN_ID];
	   define("LOGIN_AD_ID",$LOGIN_ID);	
	   if(LOG_TAB!=1){
	       header("location:admin_logout_proof.htm");
		   exit();
	   }
	   return $LOGIN_ID;	   
   }
   
   //判斷使用者是否登入;
	function USER_LOGIN(){		
	   //查詢是否登入;
       $QUERY_NM="LOG_CHECK";
	   $QUERY_SELECT_NM="*";
	   $QUERY_TABLES_NM="USER_COOKIE";
	   $QUERY_WHERE_ARG="COOKIE_VAL = \"".$_COOKIE["USER_COOKIE"]."\" and LOG_OUT=\"\"";//
	   $QUERY_ORDER_ARG="";//SEQ_NBR asc
	   $QUERY_limit_ARG="";//"0,20"
	   $LOG_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
	   
	   define("LOG_TAB",$LOG_CHECK_R[0]);
	   //echo LOG_TAB;
	   $LOGIN_ID=$LOG_CHECK_R[1][USER_ID];
	   //查詢登入者身份;
	   $LOG_PRVL_R=SEL("LOG_PRVL","*","RIGIST_DATA","SEQ_NBR = ".$LOGIN_ID,"","");	
	   define("LOG_ACCOUNT",$LOG_PRVL_R[1][ACCOUNT]);	  
	   define("LOG_PRVL",$LOG_PRVL_R[1][PRVL]);
	   define("LOG_NAME",$LOG_PRVL_R[1][M_NAME]);
	   define("LOG_EMAIL",$LOG_PRVL_R[1][EMAIL]);
	   define("LOG_PHONE",$LOG_PRVL_R[1][PHONE]);
	   define("LOG_MOBILE",$LOG_PRVL_R[1][MOBILE]);
	   define("LOG_address",$LOG_PRVL_R[1][address]);
	   if($LOG_PRVL_R[1][RECEIPT_addressr]==0){
	       define("LOG_addressr",$LOG_PRVL_R[1][address]);
	   }else if($LOG_PRVL_R[1][RECEIPT_addressr]==1){
	       define("LOG_addressr",$LOG_PRVL_R[1][addressr]);
	   }
	   define("LOG_RECEIPT_TITLE",$LOG_PRVL_R[1][RECEIPT_TITLE]);
	   if($LOG_PRVL_R[1][RECEIPT_SN]==0){
	       $LOG_PRVL_R[1][RECEIPT_SN]="";
	   }
	   define("LOG_RECEIPT_SN",$LOG_PRVL_R[1][RECEIPT_SN]);
	   define("LOG_RECEIPT_TYPE",$LOG_PRVL_R[1][RECEIPT_TYPE]);	  
	   define("LOG_RECEIPT_COMPANY_NM",$LOG_PRVL_R[1][comany_nm]);
	    $logInObj= array(
			'LOGIN_ID' => $LOGIN_ID,
			'LOG_TAB' => LOG_TAB,
			'LOG_ACCOUNT' => LOG_ACCOUNT,
			'LOG_PRVL' => LOG_PRVL,
			'LOG_NAME' => LOG_NAME,
			'LOG_EMAIL' => LOG_EMAIL,
			'LOG_PHONE' => LOG_PHONE,
			'LOG_MOBILE' => LOG_MOBILE,
			'LOG_address' => LOG_address,
			'LOG_addressr' => LOG_addressr,
			'LOG_RECEIPT_TITLE' => LOG_RECEIPT_TITLE,
			'LOG_RECEIPT_SN' => LOG_RECEIPT_SN,
			'LOG_RECEIPT_TYPE' => LOG_RECEIPT_TYPE,
			'LOG_RECEIPT_COMPANY_NM' => LOG_RECEIPT_COMPANY_NM
		);
	   return $logInObj;
   }
   
  
   //登入檢查;
   
   //使用者登入檢查;
   function USER_LOG_CHECK()
   {   
      //比對帳號和密碼;	   
	  // foreach_data($_POST);	
       define("CRTE_TIME",time());   
	   //echo CRTE_TIME;
       $QUERY_NM="USER_LOGIN";
       $QUERY_SELECT_NM="*";
       $QUERY_TABLES_NM="RIGIST_DATA";
	   $QUERY_WHERE_ARG="ACCOUNT = \"".$_POST[user_name]."\" and PWD = \"".$_POST[user_pass]."\"";
	   
	   $QUERY_ORDER_ARG="";//SEQ_NBR asc
       $QUERY_limit_ARG="";//"0,20"
	   
       $USER_LOGIN_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);

	   if($USER_LOGIN_R[0]!=1){
          $Msg=urlencode("帳號密碼輸入錯誤！");
	      header("Location:".ERRO_HEAD_URL."?Msg=".$Msg);
       }else{	  
	       //設定cookies;
          $CookieTab = "USER_COOKIE";
          $time=date("Y-m-d-H-i-s");
          $COOKIE_VAL = md5($USER_LOGIN_R[1][M_NAME].$USER_LOGIN_R[1][PWD].$USER_LOGIN_R[1][PHONE].$time);		 
		  //echo "<br>".$COOKIE_VAL."<br>";
		  //查cookies資料庫欄位;		  
          $QUERY_NM="COOKIES_CHECK";
          $QUERY_SELECT_NM="*";
          $QUERY_TABLES_NM="USER_COOKIE";
          $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;
		  //echo $FIELD_NM."<br>";
          $TABLE="USER_COOKIE";
          $FIELD_Value="\"".$COOKIE_VAL."\",".$USER_LOGIN_R[1][SEQ_NBR].",".CRTE_TIME.",\"\"";
		 // echo "<br>".$FIELD_Value."<br>";
		  //寫入cookies;
          $Msg=urlencode("歡迎「".$USER_LOGIN_R[1][M_NAME]."」進入HiColor印刷購物網！"); 	
	  
	     /* setcookie("USER_COOKIE",$COOKIE_VAL,0,"/",".hicolor.tw");		
		  setcookie("USER_COOKIE",$COOKIE_VAL,0,"/",".hicolor.com.tw");	*/
		  setcookie("USER_COOKIE",$COOKIE_VAL,0);	
		  //setcookie("USER_COOKIE",$COOKIE_VAL);		
		  //setcookie("USER_COOKIE",$COOKIE_VAL);			  	  
          insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg, false);
      }
   }
   
   //管理者登入檢查;
   function ADMIN_LOG_CHECK()
   {   
       //比對帳號和密碼;
       define("CRTE_TIME",mktime(date()));       
       $QUERY_NM="ADMIN_LOGIN";
       $QUERY_SELECT_NM="*";
       $QUERY_TABLES_NM="adminper";
	   $QUERY_WHERE_ARG="ADMIN_CONT = \"".$_POST[admin_name]."\" and PASSWORD=\"".$_POST[admin_pass]."\"";//
	   $QUERY_ORDER_ARG="";//SEQ_NBR asc
       $QUERY_limit_ARG="";//"0,20"
       $ADMIN_LOGIN_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
	  if($ADMIN_LOGIN_R[0]!=1){
          $Msg=urlencode("帳號密碼輸入錯誤！");
	      header("Location:".ERRO_HEAD_URL."?Msg=".$Msg);
       }else{
	  
	      //設定cookies;
          $CookieTab = "ADMIN_COOKIE";
          $time=date("Y-m-d-H-i-s");
          $COOKIE_VAL = md5($ADMIN_LOGIN_R[1][ADMIN_NM].$ADMIN_LOGIN_R[1][PASSWORD].$ADMIN_LOGIN_R[1][PRVL_ID].$time);          
          //查cookies資料庫欄位;		  
          $QUERY_NM="COOKIES_CHECK";
          $QUERY_SELECT_NM="*";
          $QUERY_TABLES_NM="ADMIN_COOKIE";
          $FIELD_NM=TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM);//不用改;
          $TABLE="ADMIN_COOKIE";
          $FIELD_Value="\"".$COOKIE_VAL."\",".$ADMIN_LOGIN_R[1][SEQ_NBR].",".CRTE_TIME.",\"\"";
		  //寫入cookies;
          $Msg=urlencode("歡迎管理者「".$ADMIN_LOGIN_R[1][ADMIN_NM]."」使用HiColor印刷購物網管理系統！"); 
	      setcookie("ADMIN_COOKIE",$COOKIE_VAL,0,"/",".hicolor.tw"); 
		  setcookie("ADMIN_COOKIE",$COOKIE_VAL,0,"/",".hicolor.com.tw"); 
		   
		  //setcookie("ADMIN_COOKIE",$COOKIE_VAL); 
          insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg);
      }
   }
	
	
   
   //權限檢查並回傳權限;
   function LOGIN_PRVL(){   
       $QUERY_NM="PRVL_CHECK";
       $QUERY_SELECT_NM="SEQ_NBR,ADMIN_NM,PRVL_ID";
       $QUERY_TABLES_NM="adminper";
       $QUERY_WHERE_ARG="SEQ_NBR = ".ADMIN_LOGIN();//
       $QUERY_ORDER_ARG="";//SEQ_NBR asc
       $QUERY_limit_ARG="";//"0,20"
       $PRVL_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
       $CHECK_R=substr($PRVL_CHECK_R[1][PRVL_ID],PRVL_SN,1); 
       return $CHECK_R;
   }
   
   function USER_LOG_OUT(){
		//登出記錄寫入;
		$UPDATE_NM="USER_LOGOUT";
		$UPDATE_TABLES_NM="USER_COOKIE";
		$UPDATE_WHERE_ARG="COOKIE_VAL=\"".$_COOKIE["USER_COOKIE"]."\"";
		$UPDATE_DATA="LOG_OUT=".UPTIME_TIME;
		$$UPDATE_NM="update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
		if(!mysql_query($$UPDATE_NM, MyLink)){
			$Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
			ERRO_HEAD($Msg);
	    }else{
			$Msg=urlencode("登出成功！");
		    //清除cookies值;
		    /*setcookie("USER_COOKIE","",0,"/",".hicolor.tw");		
		    setcookie("USER_COOKIE","",0,"/",".hicolor.com.tw");	*/
			setcookie("USER_COOKIE","",0);	 
			OK_HEAD($Msg);
		}
   }
   //權限檢查不回傳權限;s
   function LOGIN_PRVL_RESULT($Msg)
   { 	   
	   if(LOGIN_PRVL()!=1){	   
			ERRO_HEAD($Msg);
	   }
   }


//資料庫處理;
//-------------------------------------------------------------------------------------------------------------------------------------------
   
   
    //A.寫入;
	
	  function insertdata ($aa,$bb,$TABLE,$Msg,$brea)
      {      
          $data_insert="insert into ".$TABLE." (".$aa.") values (".$bb.")";	   
		 // echo $data_insert;
         
		  if(!mysql_query($data_insert, MyLink)){		
		  //echo mysql_error();
			   if(!$brea){
			   //echo "NO";
		          $Msg=urlencode("存入資料庫失敗！可能資料有重覆！"); 
			      ERRO_HEAD($Msg);
		       }else{
			  // echo "NO";
		          $inset_re="";
		       }			  
	      }else{		 
	           if(!$Msg){
			   //echo "OK";
		          $Msg=urlencode("新增成功！");
		       }
		       if(!$brea){
			      //echo "OK";
		         OK_HEAD($Msg);
		       }else{
			   //echo "OK2";
		         $inset_re="OK";
		       }
	      }
		  //echo  $inset_re;
          return $inset_re;
      }


     //B.查詢;
	   
	   //查詢資料;
	   function SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG)
       {   
	       //定義查詢參數;
	       $QUERY_ACTION_NM=$QUERY_NM."_Q";
	       $QUERY_Q_COUNT_NM=$QUERY_NM."_N";
	       $QUERY_Q_ARRAY=$QUERY_NM."_A";
		   $Q_ARRAY="";
	       if($QUERY_WHERE_ARG=="" && $QUERY_ORDER_ARG=="" && $QUERY_limit_ARG==""){	       
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM;
	       }else if($QUERY_WHERE_ARG=="" && $QUERY_ORDER_ARG && $QUERY_limit_ARG==""){
		        $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." order by ".$QUERY_ORDER_ARG;
	       }else if($QUERY_WHERE_ARG=="" && $QUERY_ORDER_ARG && $QUERY_limit_ARG){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." order by ".$QUERY_ORDER_ARG." limit ".$QUERY_limit_ARG;
	       }else if($QUERY_WHERE_ARG=="" && $QUERY_ORDER_ARG=="" && $QUERY_limit_ARG){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." limit ".$QUERY_limit_ARG;
	       }else if($QUERY_WHERE_ARG && $QUERY_ORDER_ARG=="" && $QUERY_limit_ARG==""){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." where ".$QUERY_WHERE_ARG;
	       }else if($QUERY_WHERE_ARG && $QUERY_ORDER_ARG && $QUERY_limit_ARG==""){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." where ".$QUERY_WHERE_ARG." order by ".$QUERY_ORDER_ARG;
	       }else if($QUERY_WHERE_ARG && $QUERY_ORDER_ARG && $QUERY_limit_ARG){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." where ".$QUERY_WHERE_ARG." order by ".$QUERY_ORDER_ARG." limit ".$QUERY_limit_ARG;    
           }else if($QUERY_WHERE_ARG && $QUERY_ORDER_ARG=="" && $QUERY_limit_ARG){
	            $$QUERY_NM="select ".$QUERY_SELECT_NM." from ".$QUERY_TABLES_NM." where ".$QUERY_WHERE_ARG." limit ".$QUERY_limit_ARG;
	       }
		   //echo $$QUERY_NM."<br>";
		   //執行查詢;		   
	       $$QUERY_ACTION_NM=mysql_query($$QUERY_NM, MyLink);
		   if(!$$QUERY_ACTION_NM){
				$$QUERY_Q_COUNT_NM= 0;
				$Q_ARRAY= array();
		   }else{
				$$QUERY_Q_COUNT_NM=mysql_num_rows($$QUERY_ACTION_NM);
			}
		   //echo $$QUERY_Q_COUNT_NM;
	       if($$QUERY_Q_COUNT_NM==1){
	            $Q_ARRAY=mysql_fetch_array($$QUERY_ACTION_NM);
	       }else{
	            $i=0;
		        while($i<$$QUERY_Q_COUNT_NM){
		            $Q_ARRAY[$i]=mysql_fetch_array($$QUERY_ACTION_NM);
			        $i++;
		        }
	       }
		   //回傳查詢結果;  
	       $Q_TOTAL[0]=$$QUERY_Q_COUNT_NM;//查到筆數;
	       $Q_TOTAL[1]=$Q_ARRAY;//查詢資料陣列;
	       return $Q_TOTAL;
       }
	   
	   
	   //資料表欄位名稱處理;
	   function FIELD_NM($Q_TABLES){	   
	       foreach($Q_TABLES as $Key => $Value){
	            if($Key=="SEQ_NBR" || is_int($Key)){		      
		        }else{			 
			         $FIELD_NM=$FIELD_NM." ,".$Key;			  
		        }
	       }
		   $FIELD_NM=substr($FIELD_NM,2,strlen($FIELD_NM)-2);
		   return $FIELD_NM;
       }  
	   
	   
	   //查詢資料表欄位名稱回傳;   
	   function TABLE_Q($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM){
	        //echo $QUERY_TABLES_NM;	      
		    //執行資料表欄位查詢;
		    $TABLE_CHECK_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG="",$QUERY_ORDER_ARG="",$QUERY_limit_ARG="");		    
			//寫入欄位;
			if($TABLE_CHECK_R[0]==1){
		    	$Q_TABLES=$TABLE_CHECK_R[1];	
			}else{
			    $Q_TABLES=$TABLE_CHECK_R[1][0];
		    }		    	
		    $FIELD_NM=FIELD_NM($Q_TABLES);
		    return $FIELD_NM;
	   }
	   
	   
	   //C.刪除;
	   
	   
	   //刪除資料庫資料及檔案;
	   function DEL($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_ARG,$file_rout){
		   
		   if($file_rout){
		       //查詢將刪除的檔名;
		       $QUERY_NM="FILES_SEAR";
               $QUERY_SELECT_NM="*";
               $QUERY_TABLES_NM=$DEL_TABLES_NM;
               $QUERY_WHERE_ARG=$DEL_WHERE_ARG;//
               $QUERY_ORDER_ARG="";//SEQ_NBR asc
               $QUERY_limit_ARG="";//"0,20"
               $FILES_SEAR_R=SEL($QUERY_NM,$QUERY_SELECT_NM,$QUERY_TABLES_NM,$QUERY_WHERE_ARG,$QUERY_ORDER_ARG,$QUERY_limit_ARG);
			   // echo $FILES_SEAR_R[0];
		       $del_check=0;
			    if($FILES_SEAR_R[0]==0){
		            $Msg="刪除失敗！";
		       }
			     //echo $file=$file_rout."/".$FILES_SEAR_R[1][1];
			   if($FILES_SEAR_R[0]==1){
			     //echo $file_rout."/".$FILES_SEAR_R[1][1]."<br>";
		            if(!unlink($file_rout."/".$FILES_SEAR_R[1][1])){
				        $Msg="刪除失敗！";
			        }else{
			            $del_check=1;
			        }
		       }else if($FILES_SEAR_R[0]>1){
		            foreach($FILES_SEAR_R[1] as $KEY=>$VALUE){
					    // echo $file_rout."/".$VALUE[1]."<br>";
				        if(!unlink($file_rout."/".$VALUE[1])){
				             $Msg="刪除失敗！";
				        }
			        }
			        $del_check=1;
		       }
		   }else{
		      $del_check=1;
		   }
		   if($del_check==1){
		       $$DEL_NM="delete from ".$DEL_TABLES_NM." where ".$DEL_WHERE_ARG;
			   //echo $$DEL_NM."<br>";
		       if(!mysql_query($$DEL_NM, MyLink)){
	               $Msg="刪除失敗！";
	           }else{
	               $Msg="刪除成功！";
	           }
		   }
	       return $Msg;
      }
	  //刪除資料判斷檢查;
	  function DEL_ACTION($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_FIELD,$DEL_FILES_SEQ,$DEL_FILES_TAB_NM,$UPDATE_DATA,$pass_DEL,$file_rout)
      {    
		   if($_POST){
		  // echo $file_rout;
		   // foreach_data($_POST);
		       if($_REQUEST[del_sub]){
                     foreach($_REQUEST[del_sub] as $DEL_ARY_KEY=>$DEL_ARY_VALUE){
					      $DEL_WHERE_ARG="SEQ_NBR = ".$DEL_ARY_VALUE;
						  //echo $DEL_WHERE_ARG."<br>";
						  if(DEL($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_ARG,$file_rout)=="刪除失敗！"){
				              $DEL_RESO[$d]=$DEL_ARY_VALUE;
				          }
			              $d++;
					 }	 	  
			   }
			   else{
			       foreach($_POST as $Key=>$Value){ 					   	   
				       if($Value=="Array"){			
				          // echo $Key."==".$Value."<br>";	   
	                       $d=0;		                   
						   foreach($_REQUEST[$Key] as $DEL_ARY_KEY=>$DEL_ARY_VALUE){							   
					           if($pass_DEL){
						            if($DEL_ARY_VALUE!=ADMIN_LOGIN()){
			                             $DEL_WHERE_ARG="SEQ_NBR = ".$DEL_ARY_VALUE;				  		
				                         if(DEL($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_ARG)=="刪除失敗！"){
				                             $DEL_RESO[$d]=$DEL_ARY_VALUE;
				                         }
			                             $d++;
			                        }
						       }else{
						            $DEL_WHERE_ARG="SEQ_NBR = ".$DEL_ARY_VALUE;				  		
				                    if(DEL($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_ARG)=="刪除失敗！"){
				                         $DEL_RESO[$d]=$DEL_ARY_VALUE;
				                    }
			                        $d++;
						       }              
		                   }
                       }
                   }
			   }
		   }else{		   
		           $DEL_WHERE_ARG=$DEL_WHERE_FIELD."=".$DEL_FILES_SEQ;
				  // echo $DEL_WHERE_ARG."<br>";
				  if(DEL($DEL_NM,$DEL_TABLES_NM,$DEL_WHERE_ARG,$file_rout)=="刪除失敗！"){
				        $DEL_RESO[1]=$DEL_FILES_SEQ;
				   }else{
					   //更新資料庫檔案註記;
					   $UPDATE_NM="files_TAB";
					   $UPDATE_TABLES_NM=$DEL_FILES_TAB_NM;
					   $UPDATE_WHERE_ARG="SEQ_NBR=".$DEL_FILES_SEQ;
					   $$UPDATE_NM="update ".$UPDATE_TABLES_NM." set ".$UPDATE_DATA." where ".$UPDATE_WHERE_ARG;
					   if(!mysql_query($$UPDATE_NM, MyLink)){
	                       $Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
		                   ERRO_HEAD($Msg);
	                   }
				   }
		   }
		   
		  if($DEL_RESO){
              foreach($DEL_RESO as $DEL_RESO_KEY => $DEL_RESO_VALUE){   
                  $DEL_F=$DEL_F.$DEL_RESO_VALUE."-";
              }
              $Msg=substr($DEL_F,0,(strlen($DEL_F)-1));	   
          }else{
              $Msg="刪除成功！";
          }
	      return $Msg;
     }  
	  

//檔案上傳;
//-------------------------------------------------------------------------------------------------------------------------------------------
   
   
   //上傳資料檢查；
   function upload_date_check($uplod_Amount,$file_name,$upload_Name,$upload_mode)
   {   
       $upload_mode=explode(",",$upload_mode);          
	   $i=0;
	   $n=1;
	   while($i<$uplod_Amount){	 
	       $mode_check=0;      
	       //判斷資料填寫狀態;
	       $Name=$file_name.$n;
		   $up_Name=$upload_Name.$n;
		   //echo $Name;
		   //echo $up_Name;
		  // echo $up_Name."<br>";
		   if($_POST[$Name]=="0" || $_POST[$Name]==""){
		       $_POST[$Name]="";
	       }
		   if($_FILES[$up_Name]['name']==""){
		       $Msg=urlencode("請選擇檔案路徑！");
			  // echo "請選擇檔案路徑！";
			   ERRO_HEAD($Msg);
	       }else{
		       //判斷檔案格式;
               $File_Extension = explode(".", $_FILES[$up_Name]['name']);
			  // echo $File_Extension;
               $File_Extension = $File_Extension[count($File_Extension)-1];
               $File_Extension=strtolower($File_Extension);			   
               $File_mode[$n]=$File_Extension;			   
			   foreach($upload_mode as $MOD_KEY=>$MOD_VALUE){			         		
				    if($File_mode[$n]==$MOD_VALUE){
                         $mode_check=1;
                    }
					$ech_mod=$ech_mod."、「".$MOD_VALUE."」";
			   }			  
			   $ech_mod=substr($ech_mod,3,strlen($ech_mod)-3);			  
			  // echo $mode_check;
               if($mode_check!=1){
					$Msg=urlencode("請上傳".$ech_mod."的檔案格式！"); 
					//echo   "請上傳".$ech_mod."的檔案格式！";                
					ERRO_HEAD($Msg);
			   }
	       }		
           //判斷檔案可否上傳;
           if(!is_uploaded_file($_FILES[$up_Name]['tmp_name'])){
               $Msg=urlencode("檔案上傳錯誤！請確認上傳檔案小於100MB！");
			 //  echo "檔案上傳錯誤！請確認上傳檔案小於100MB！";
               ERRO_HEAD($Msg);
           }
	       $n++;
           $i++;
       }	   
	   return $File_mode;
   }
   
   
   //寫入上傳資料、複製檔案;
   function upload_action($file_name,$upload_Name,$upload_Amount,$SAVE_NAME,$uploae_mode,$FIELD_NM,$TABLE,$UPDATE_NM,$SAVE_KIND,$SAVE_ROUT,$name_pass,$buyer)
   {
	//echo $file_name.'<br/>'.$upload_Name.'<br/>'.$upload_Amount.'<br/>'.$SAVE_NAME.'<br/>'.$uploae_mode.'<br/>'.$FIELD_NM.'<br/>'.$TABLE.'<br/>'.$UPDATE_NM.'<br/>'.$SAVE_KIND.'<br/>'.$SAVE_ROUT.'<br/>'.$name_pass.'<br/>'.$buyer;
	   $j=0;
       $k=1;
	   if($name_pass=="pass"){
			while($j<$upload_Amount)
			{
				$FIELD_Value="\"".$_FILES[file_upload.$k][name]."\",".$_POST[SEQ].",\"".$_POST[files_nm.$k]."\",".$buyer.",".CRTE_TIME;
				//echo $FIELD_Value."<br>";
				//寫入資料庫;
				//echo $FIELD_Value;
				$brea="pass";
				$OK_NAME[$k]=insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="",$brea);
				//echo  $OK_NAME[$k]."<br>";
				// echo $_FILES[file_upload.$k]['tmp_name'].",".$SAVE_ROUT.$_FILES[file_upload.$k][name];
				//echo $OK_NAME[$k];
				//echo $_FILES[file_upload.$k]['tmp_name'].'<br>';
				//echo $SAVE_ROUT.$_FILES[file_upload.$k][name];
				if($OK_NAME[$k]=="OK"){
					if(!copy($_FILES[file_upload.$k]['tmp_name'], $SAVE_ROUT.$_FILES[file_upload.$k][name])){		
						$Msg=urlencode("複製檔案發生錯誤！");
						ERRO_HEAD($Msg);
					}
				}
				$j++;
				$k++;
			}
	   }else{
	  // echo "grqe";
	        while($j<$upload_Amount){
	           $SAVE_NM=$SAVE_NAME.$k;
	           $Name=$file_name.$k;
	           $up_Name=$upload_Name.$k;
               $FIELD_Value="\"".$SAVE_KIND."_".$_POST[Bgl_Num]."_".$SAVE_NM.".".$uploae_mode[$k]."\",".$_POST[Bgl_Num].",\"".$_POST[$Name]."\",".AD.",".CRTE_TIME;
		       //echo $FIELD_Value."<br>";
		       // echo $FIELD_NM."<br>";
		       //寫入資料庫;
			   $brea="pass";
		       $OK_NAME[$k]=insertdata($FIELD_NM,$FIELD_Value,$TABLE,$Msg="", $brea);  			   //echo "./news_img/news_".$_POST[Bgl_Num]."_".$SAVE_NAME.".".$uploae_mode[$k];
			   //echo $_FILES[$up_Name]['tmp_name']."==".$SAVE_ROUT."==".$SAVE_KIND."_".$_POST[Bgl_Num]."_".$SAVE_NM.".".$uploae_mode[$k]."<br><br>";
		       if($OK_NAME[$k]=="OK"){
		            if(!copy($_FILES[$up_Name]['tmp_name'],$SAVE_ROUT.$SAVE_KIND."_".$_POST[Bgl_Num]."_".$SAVE_NM.".".$uploae_mode[$k])){		
		                $Msg=urlencode("複製檔案發生錯誤！");
                        ERRO_HEAD($Msg);
		            }
	           }
               $j++;
               $k++;
            }
	   }
	   $m=0;
	   $e=0;
	 
	   foreach_data($OK_NAME);
	   foreach($OK_NAME as $KEY=>$value){     
           if($value==""){	     
	            $ERRO_SEQ=$ERRO_SEQ."及".($m+1);
		        $e++;
	       } 
	       $ERRO_SEQ=substr($ERRO_SEQ,3,strlen($ERRO_SEQ)-3);	 
	       $m++;
       }	  
		if($m==1){	  
			if($e==0){  
				if(!mysql_query($UPDATE_NM, MyLink)){
					$Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
					ERRO_HEAD($Msg);
				}
				$Msg=urlencode("檔案上傳成功！");
				//  echo "AAAA";
				OK_HEAD($Msg);
			}else{
				$Msg=urlencode("檔案上傳失敗！可能上傳的檔案已存在！請先刪除原本的檔案！");
				ERRO_HEAD($Msg);
			}
		}else{
			if($e==0){
				//echo $UPDATE_NM;		   
				if(!mysql_query($UPDATE_NM, MyLink)){
					$Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
					ERRO_HEAD($Msg);
				}			   
				$Msg=urlencode("檔案上傳成功！");
				//echo "BBBB";
				OK_HEAD($Msg);
			}else if($e==$m){
				$Msg=urlencode("檔案上傳失敗！可能上傳的檔案已存在！請先刪除原本的檔案！");
				ERRO_HEAD($Msg);
			}else{
				if(!mysql_query($UPDATE_NM, MyLink)){
					$Msg=urlencode("網頁發生錯誤！無法寫入資料！請與系統管理員連絡！");
					ERRO_HEAD($Msg);
				}
				$Msg=urlencode("第".$ERRO_SEQ."個檔案寫入資料庫失敗外！其餘的上傳成功！");
				ERRO_HEAD($Msg); 
			}
		}
   }
   

//執行結果處理;
//-------------------------------------------------------------------------------------------------------------------------------------------
   
   //執行正確;
	function OK_HEAD($Msg){	
		$PAGE=URL_PAGE();	   
		//echo $PAGE;	
		if($PAGE){
			$PAGE="PAGE=".$PAGE;		
		}
		if($_GET){
			foreach($_GET as $Key=>$Value){
				if($Key!="PAGE"){
					$INF=$INF.("&".$Key."=".urlencode($Value));			
				}
			}
		}				
		if($_POST[Amount]){
			foreach($_POST as $Key=>$Value){
				if($Key=="Amount"){
					$INF=$INF.("&".$Key."=".urlencode($Value));				
				}else if($Key=="SEQ"){
					$INF=$INF.("&".$Key."=".urlencode($Value));	
				}else if($Key=="SEQ_NUM"){
					$INF=$INF.("&".$Key."=".urlencode($Value));	
				}
			}
		}else if($_POST[SEQ] && $_POST[MODE]=="fix"){
			foreach($_POST as $Key=>$Value){
				if($Key=="SEQ"){
					$INF=$INF.("&".$Key."=".urlencode($Value));	
				}
			}
		}else if($_POST[SEQ_NUM]){
			foreach($_POST as $Key=>$Value){
				if($Key=="SEQ_NUM"){
					$INF=$INF.("&".$Key."=".urlencode($Value));	
				}
			}
		}else{
			foreach($_POST as $Key=>$Value){				
				if($Key != "user_name" && $Key != "user_pass" ) {
					$INF=$INF.("&".$Key."=".urlencode($Value));	
				}
		    }
		}
		if($Msg!=""){
			if($PAGE){
				header("location:".OK_HEAD_URL."?".$PAGE."&Msg=".$Msg.$INF);
			}else{
				echo "OK";
				header("location:".OK_HEAD_URL."?Msg=".$Msg.$INF);
			}	      
			exit();
		}else{
			if($PAGE){
				header("location:".OK_HEAD_URL."?".$PAGE.$INF);
			}else{ 		 
				header("location:".OK_HEAD_URL.$INF);
			}	       
			exit();
		}
	}
      
   
   //執行錯誤;
   function ERRO_HEAD($Msg)
   {   
       $PAGE=URL_PAGE();	   
	   if($PAGE){
	    $PAGE="PAGE=".$PAGE;
	   }	
	   if($Msg!=""){
		   if($_POST){
		       foreach($_POST as $Key=>$Value){
					//echo $Key."==".$Value."<br>";
		          if($Key!="PAGE"){
				     $INF=$INF.("&".$Key."=".urlencode($Value));							 
				  }
		       }
		   }
		   if($_GET){
		       foreach($_GET as $Key=>$Value){
		           if($Key!="PAGE"){
				      $INF=$INF.("&".$Key."=".urlencode($Value));	
				   }
		       }
		   }
		   if($PAGE){
		 //  echo "1";
		      header("location:".ERRO_HEAD_URL."?".$PAGE."&Msg=".$Msg.$INF);
		   }else{
		   //echo "2";
		  // echo ERRO_HEAD_URL.$Msg.$INF;
		      header("location:".ERRO_HEAD_URL."?Msg=".$Msg.$INF);			  
		   }
		   exit();
	   }else{
	      if($PAGE){
		  //echo "3";
		     header("location:".ERRO_HEAD_URL."?".$PAGE);
		  }else{
		  // echo "4";
		     header("location:".ERRO_HEAD_URL);
		  }    
		  exit();
	   }   
   }

//寄信;
//-------------------------------------------------------------------------------------------------------------------------------------------
   
      function SystemSendMail( $MailType, $MailTo, $Title, $Body, $MailFromTitle, $MailFrom, $MailPriority){
	  $Title = "=?UTF-8?B?".base64_encode($Title)."?=";
	  if($MailFromTitle){
	     $Name = "=?UTF-8?B?".base64_encode($MailFromTitle)."?=";
	  }else{
	     $Name = "=?UTF-8?B?".base64_encode("HiColor印刷購物網")."?=";
	  }
      $SystemHeaders  = "MIME-Version: 1.0\r\n";
      $SystemHeaders .= "From: ".$Name." <".$MailFrom.">\r\n";
      $SystemHeaders .= "Reply-To: ".$MailFrom." <".$MailFrom.">\r\n";
      if($MailPriority==1){
         $SystemHeaders .= "X-Priority: 1\n";
         $SystemHeaders .= "X-MSMail-Priority: High\r\n";
      } else {
         $SystemHeaders .= "X-Priority: 3\n";
         $SystemHeaders .= "X-MSMail-Priority: Normal\r\n";
      }
      $SystemHeaders .= "X-Mailer: =?UTF-8?B?".base64_encode($MailFromTitle)."?=\r\n";
      if($MailType=="text") $SystemHeaders .= "Content-Type: text/plain;\n\tcharset=\"utf-8\"\r\n";
      if($MailType=="html"){
         $SystemHeaders .= "Content-Type: text/html;\n\tcharset=\"utf-8\"\r\n";
         $SystemHeaders .= "Content-Transfer-Encoding: base64\r\n";
         $Body = chunk_split(base64_encode($Body));
      }
      if( ereg( "([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})", $MailTo) ){
	   mail( $MailTo, $Title, $Body, $SystemHeaders);
	  }
      return ;
   }
  // echo "OK";
?>