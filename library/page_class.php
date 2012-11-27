<?php
   function URL_PAGE()
   {   	  	  
      $PAGE="";
	  if($_POST){
          foreach($_POST as $Key=>$Value){
		     if(eregi("PAGE",$Key)){
	             if(eregi("PAGE",$Value)){
				     $PAGE=split("=",$Value,2);		  
		             $PAGE=$PAGE[1];
				 }else{
				     $PAGE=$Value;
				 }             
	         }
          }
	  }
	  if($_GET){
	      foreach($_GET as $Key=>$Value){		
             if(eregi("PAGE",$Key)){
	             if(eregi("PAGE",$Value)){
				     $PAGE=split("=",$Value,2); 
		             $PAGE=$PAGE[1];
				 }else{
				     $PAGE=$Value;
				 }
	         }
          }
	  }	  
      return $PAGE;
   }
   
   
   function page_total($DATA_NUM,$MAX_NUM)
   {
      $PAGE_NUM=ceil($DATA_NUM/$MAX_NUM);  
	  return $PAGE_NUM;
   }
   //筆數起點;

    function START_NR($PAGE,$DATA_NUM,$MAX_NUM)
   {     
	  if($PAGE>page_total($DATA_NUM,$MAX_NUM)){
          $PAGE=1;
	  }
	  if(!$PAGE){
          $START_NUM=0;
      }else{
          $START_NUM=($PAGE-1)*$MAX_NUM;
      }   
	  return $START_NUM;
   } 
   function PAGE_NM($START_NUM,$MAX_NUM)
   {
      if($START_NUM==0){
          $PAGE=1;
      }else{
          $PAGE=ceil(($START_NUM+1)/$MAX_NUM);
      }
	  return $PAGE;
   } 
   function PAGE_OPTIONS($DATA_SUM,$MAX_NUM,$PAGE_NOW,$URL,$URL_AUG)
   { 
       $select1="<select name=\"PAGE\" style=\"font-size:12px;width:70;height:20px;\" onChange=\"location.href=this.options[this.selectedIndex].value\">";
	   $n=0;	   
	   while($n<page_total($DATA_SUM,$MAX_NUM)){
	       $option_nm1="<option value=\"".$URL."?PAGE=".($n+1).$URL_AUG."\"";
		       if(($n+1)==$PAGE_NOW){
			      $option_nm2="selected";
			   }else{
			      $option_nm2="";
			   }
		   $option_nm3=">第".($n+1)."頁</option>";  
		   $option_SY[$n]=$option_nm1.$option_nm2.$option_nm3; 
	   $n++;
       }
       foreach($option_SY as $Opt_KEY => $Opt_Value){
           $OPTION_NM=$OPTION_NM.$Opt_Value."\n";
       }
       $select2="</select>";
       return $select1.$OPTION_NM.$select2;
   }
   function P_SYS($DATA_SUM,$MAX_NUM,$PAGE_NOW,$URL,$URL_AUG)
   {
       return "<span>共搜尋資料</span><span class=\"mark\">".$DATA_SUM."</span><span>筆 / 分</span><span class=\"mark\">".page_total($DATA_SUM,$MAX_NUM)."</span><span>頁 / 每頁</span><span class=\"mark\">".$MAX_NUM."</span><span>筆　顯示 </span>".PAGE_OPTIONS($DATA_SUM,$MAX_NUM,$PAGE_NOW,$URL,$URL_AUG);
   
   }
?>