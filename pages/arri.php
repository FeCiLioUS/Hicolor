<? 
$__DIR__= dirname(__FILE__);
require_once($__DIR__."/../middleware/hicolor.php");
$hicolor= new Hicolor();
$hicolor-> assign("pageTitle", "最新消息");
$hicolor-> assign("mode", $_GET[MODE]);
$hicolor-> assign("subKind", $_GET[SUBKIND]);

//選擇的產品類別;
$KIND_SELECT_R=SEL("KIND_SELECT","NAME ","PRODUCT_KIND","SEQ_NBR = ".$_GET[MODE],"","");
$hicolor-> assign("cateNameNoSwap", $KIND_SELECT_R[1][NAME]);

if(eregi("[、]",$KIND_SELECT_R[1][NAME])){
	$kind_val=explode("、",$KIND_SELECT_R[1][NAME]);
	foreach($kind_val as $key=>$va){
		$kva .= "<br>".$va;
	}
	$kva=substr($kva,4,(strlen($kva)-4));
	$hicolor-> assign("cateName", $kva);
}else{
	$hicolor-> assign("cateName", $KIND_SELECT_R[1][NAME]);
}

//載入產品規格;
$SUBKIND_LIST_R=SEL("SUBKIND_LIST","SEQ_NBR,PRO_SUBKIND_NAME","PRODUCT_SUBKIND","PRO_KIND=".$_GET[MODE]." && SEQ_NBR != 1 && SEQ_NBR != 2","PRO_SUBKIND_NAME asc , SEARC_SUBKIND_LEV asc","");
$subKindList= array();   
$subKindList["A"]= "--選擇其它 '".$KIND_SELECT_R[1][NAME]."' 樣式--";

if($SUBKIND_LIST_R[0]==0){	
}else if($SUBKIND_LIST_R[0]==1){
	$SUBKIND_FIRST=$SUBKIND_LIST_R[1][SEQ_NBR];	   	  
	$subKindList[$SUBKIND_LIST_R[1][SEQ_NBR]]= $SUBKIND_LIST_R[1][PRO_SUBKIND_NAME];	   
}else if($SUBKIND_LIST_R[0]>1){
	$r=0;
	foreach($SUBKIND_LIST_R[1] as $KEY=>$VALUE){
		$r++;
		if($r==1){
			$SUBKIND_FIRST=$VALUE[SEQ_NBR];
		}
		$subKindList[$VALUE[SEQ_NBR]]= $VALUE[PRO_SUBKIND_NAME];		     
	}
}
if(isset($_GET[SUBKIND]) && $_GET[SUBKIND] != ""){
	$hicolor-> assign("subKindSelected", $_GET[SUBKIND]);	 
}else{
	$hicolor-> assign("subKindSelected", $SUBKIND_FIRST);	
}
$hicolor-> assign("subKindList", $subKindList);

//依查詢顯示;
if($_GET[SUBKIND]){
   $SUBKIND_DATA_R=SEL("SUBKIND_DATA","*","PRODUCT_SUBKIND","SEQ_NBR = ".$_GET[SUBKIND],"","");
   //查詢規格下的產品;
   $PRODUCT_DATA_R=SEL("PRODUCT_DATA","*","PRODUCT_DATA","SEQ_NBR != 1 && SEQ_NBR != 2 && SUBKIND = ".$_GET[SUBKIND]." && UNIT_NM not like \"DEL%\"","FACE asc,AMOUNT asc","");
}else{
   $SUBKIND_DATA_R=SEL("SUBKIND_DATA","*","PRODUCT_SUBKIND","SEQ_NBR = ".$SUBKIND_FIRST,"","");
   //查詢規格下的產品;
   $PRODUCT_DATA_R=SEL("PRODUCT_DATA","*","PRODUCT_DATA","SEQ_NBR != 1 && SEQ_NBR != 2 && SUBKIND = ".$SUBKIND_FIRST." && UNIT_NM not like \"DEL%\"","FACE asc,AMOUNT asc","");
}

$productDataArr= array();
if($PRODUCT_DATA_R[0]==0){
	
}else if($PRODUCT_DATA_R[0]==1){
	array_push($productDataArr, $PRODUCT_DATA_R[1]);
	$UNIT= $PRODUCT_DATA_R[1][UNIT_NM];
	$hicolor-> assign("unitName", $UNIT);	
}else if($PRODUCT_DATA_R[0]>1){
	$i=0; 
	foreach($PRODUCT_DATA_R[1] as $KEY=>$VALUE){
		if($i == 0){
			$UNIT=$VALUE[UNIT_NM];
			$hicolor-> assign("unitName", $UNIT);
		}
		$i++;
		array_push($productDataArr, $VALUE);		
	}	
}
$hicolor-> assign("productDataArr", $productDataArr);

if($SUBKIND_DATA_R[1][FILES_TAB]==1){
	$hicolor-> assign("photoAttachStatus", true);
    $PHOTO_SELECT_R=SEL("PHOTO_SELECT","*","PRO_SUBKIND_PHOTO","SUBKIND_SEQ = ".$SUBKIND_DATA_R[1][SEQ_NBR],"","");
	$photoArr= array();	
    if($PHOTO_SELECT_R[0]==1){			
		array_push($photoArr, array($PHOTO_SELECT_R[1][PHOTO_NICK], $PHOTO_SELECT_R[1][PHOTO_NM]));
    }else if($PHOTO_SELECT_R[0]>1){
		foreach($PHOTO_SELECT_R[1] as $KEY=>$VAL){
			array_push($photoArr, array($VAL[PHOTO_NICK], $VAL[PHOTO_NM]));
		}
    }
	$hicolor-> assign("photoAttachs", $photoArr);
}else{
	$hicolor-> assign("photoAttachStatus", false);
}

if($SUBKIND_DATA_R[1][CLIP_TAB]==1){
	$hicolor-> assign("cutModleStatus", true);	
    $CLIP_SELECT_R=SEL("CLIP_SELECT","*","PRO_SUBKIND_CLIP","SUBKIND_SEQ = ".$SUBKIND_DATA_R[1][SEQ_NBR],"","");
	$cutModelArr= array();
   if($CLIP_SELECT_R[0]==1){
       if($CLIP_SELECT_R[1][CLIP_NICK]){
	      $CLIP_NM=$CLIP_SELECT_R[1][CLIP_NICK];
	   }else{
	      $CLIP_NM=$SUBKIND_DATA_R[1][PRO_SUBKIND_NAME];
	   }	   
	   array_push($cutModelArr, array($CLIP_NM, $CLIP_SELECT_R[1][CLIP_NM]));       
   }else if($CLIP_SELECT_R[0]>1){
        $O=0;		
		foreach($CLIP_SELECT_R[1] as $KEY=>$VAL){
		    $O++;
			if($VAL[CLIP_NICK]){
			   $CLIP_NM=$VAL[CLIP_NICK];
			}else{
		       $CLIP_NM=$SUBKIND_DATA_R[1][PRO_SUBKIND_NAME]."(".$O.")";
	        }
			array_push($cutModelArr, array($CLIP_NM, $VAL[CLIP_NM]));
		}
   }
   $hicolor-> assign("cutModleAttachs", $cutModelArr);
}else{
	$hicolor-> assign("cutModleStatus", false);
}

$hicolor-> assign("subCate", $SUBKIND_DATA_R[1][PRO_SUBKIND_NAME]);
$hicolor-> assign("productDetail", $SUBKIND_DATA_R[1]);
$hicolor-> assign("contentPath", "../templates/arri.tpl"); 
$hicolor-> display("standard_template.tpl");
?>