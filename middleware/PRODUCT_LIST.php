<? 
//查詢產品項目;
   $PRODUCT_DATA_R = SEL("PRODUCT_DATA","*","PRODUCT_KIND","SEQ_NBR != 1 && SEQ_NBR != 2","PR_KIND_LEV asc","");
   //echo $PRODUCT_DATA_R[0];
   $productArray = array();
   if($PRODUCT_DATA_R[0] == 0){
      $product_list = "";
   }else if($PRODUCT_DATA_R[0] == 1){
      if(eregi("[、]", $PRODUCT_DATA_R[1]["NAME"])){
	      $product_va = explode("、",$PRODUCT_DATA_R[1]["NAME"]);
		  foreach($product_va as $p_key => $p_va){
					    $pva .= "<br>".$p_va;
		  }
		  $pva = substr($pva,4,(strlen($pva)-4));
	  }else{
	      $pva = $PRODUCT_DATA_R[1]["NAME"];
	  }
	  $newObj = array($PRODUCT_DATA_R[1], $pva);
	  array_push($productArray, $newObj);	  
      $FREE_MODE = $PRODUCT_DATA_R[1]["SEQ_NBR"];
   }else if($PRODUCT_DATA_R[0] > 1){
      $g=0;
	  foreach($PRODUCT_DATA_R[1] as $KEY => $VALUE){
	       $g++;
		   $pva = "";
		   if($g == 1){
		      $FREE_MODE = $VALUE["SEQ_NBR"];
		   }
		   if(eregi("[、]",$VALUE["NAME"])){
	          $product_va = explode("、",$VALUE["NAME"]);
		      foreach($product_va as $p_key => $p_va){
				 $pva .= "<br>".$p_va;
		      }
		      $pva = substr($pva,4,(strlen($pva)-4));
	      }else{
	          $pva = $VALUE["NAME"];
	      }           
		  $newObj = array($VALUE, $pva);		  
		  array_push($productArray, $newObj);
	  }
   }
?>
