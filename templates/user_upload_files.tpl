<style>
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
table{
	table-layout: fixed;
}
table td,
input{
	margin: 0;
	padding: 0;
}
#fileUpload {
	margin: 0 auto;
}
#fileUpload td{
	text-align: center;
	font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    font-variant: normal;
    letter-spacing: 4px;
    vertical-align: top;
}
#fileUpload td.title {
	font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    font-variant: normal;
    letter-spacing: 4px;
    vertical-align: top;
	color: #FFFFFF;
    line-height: 18px;
}
#fileUpload td.content, 
#fileUpload td.footer {
	line-height: 30px;
	vertical-align: middle;
}
#fileUpload td.footer div {
	position: relative;
}
#fileUpload td.footer div.progress {
    background: url("../images/loading_small2.gif") no-repeat scroll 0 0 transparent;
    height: 16px;
    position: absolute;
    top: 7px;
	right:150px;
    width: 16px;
	display: none;
}
{/literal}
</style>
<script>
 var total={$amount};
 var seq= {$seq};
{literal}
function ErrMsg(Msg){
    if(Msg.length != 0){
	  if(Msg=="檔案上傳成功！"){
        if(window.opener.document.title=="購物車"){
	      alert(Msg);
		  window.opener.location.href="sales_car.php";
		  window.close();
	    }else{
	      alert(Msg);
		  window.close();
	    }
		 return;
	  }else if(Msg=="您尚未登入，請先登入會員！"){
         alert(Msg);
		 window.close();
	  }else{
         alert(Msg);
		 return;
	  }	  
	}
}
{/literal}
</script>
<form action="user_upload_action.php?upload=true" method="post" enctype="multipart/form-data" id="buy_upload" name="buy_upload">
<table id="fileUpload" width="600"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../images/Aarrowhand_b3.JPG" width="400" height="23"></td>
  </tr>
  <tr>
    <td><table width="600"  border="1" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
		<tr bgcolor="#999999">
			<td width="50%" height="30" class="title"><div align="center">案件名稱<br>
				<span>(填寫供查詢使用)</span></div></td>
			<td width="50%" height="30" class="title"><div align="center">上傳檔案<br>
				<span>(檔名不可重覆</span>)</div>
				<div align="center"></div>
			</td>
		</tr>
      {section name="filesNumber" loop=$amount}
		<tr><td class="content" height="30"><div align="center"><input name="files_nm{$smarty.section.filesNumber.iteration}" type="text" id="files_nm{$smarty.section.filesNumber.iteration}" style="font-size:9pt;width:230px;height:16px;"></div></td><td height="30" class="content"><div align="center"><input type="file" name="file_upload{$smarty.section.filesNumber.iteration}" style="font-size:9pt;height:22px;" size="30"></div><div align="center"></div></td></tr>
	  {/section}
      <tr>
        <td height="35" colspan="2" class="footer"><div align="center">
            <input style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" onclick="window.close();" type="button" value="關閉視窗" name="Button">　
            <input style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" type="reset" value="重新設定" name="reset">
            <input style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" type="button" value="確定上傳" name="開始上傳" onClick="upload_file();">
            <input type="hidden" name="SEQ" id="SEQ" />
            <input type="hidden" name="Amount" id="Amount"/>
			<div class="progress"></div>
        </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="../images/Aarrowhand_b4.JPG" width="400" height="23"></td>
  </tr>
</table>
</form>
<script>
{literal}
var fileUpload = $("#fileUpload");
var progress = $('.progress');
function upload_file(){
    var h=0;
	var check=1;
	var MOD="jpg,jpeg,psd,eps,cdr,ufo,doc,docx,xls,xlsx,ppt,pptx,pps,pdf,rar,zip,ai,indd,qxd,p65,bmp,gif,tif,txt";
    while(h<total){
       var files_nm=document.buy_upload.elements[h*2].value;       
       var file=document.buy_upload.elements[(h*2)+1].value;
	   file=file.toLowerCase();	  
	   IMG_MODE=file.split(".");
	   IMG=IMG_MODE.pop();
	   if(files_nm && files_nm.match(/[\" | \' | \$]/)){
          alert('檔案名稱不得有「\" 、 \' 和 \$」符號 ！');
          document.buy_upload.elements[h*2].focus();
		  check=0;
          return;
	   }else if(file.length == 0){
          alert('請上傳檔案！');
          document.buy_upload.elements[(h*2)+1].focus();
		  check=0;
          return;
       }else if(!MOD.match(IMG)){
	      alert('請上傳檔案格式為「jpg,jpeg,psd,eps,cdr,ufo,doc,docx,xls,xlsx,ppt,pptx,pps,pdf,rar,zip,ai,indd,qxd,p65,bmp,gif,tif,txt」！');
          document.buy_upload.elements[(h*2)+1].focus();
	      return;
	   }else{	  	    
	       var i=0;
		   var t=0;
		   while(i<(file.length-1)){      
			  if((file.substr(i,1)).match(/[\.]/)){
			      t++;
			  }	
		      i++;
		   }
		   if(t==0){
		       alert('沒有附檔名！');
			   check=0;  
			   return;
		   }
       }
	    h++;
    }
	if(check==1){
		progress.show();
	   document.buy_upload.submit();
	}
}
function resize_window(){	
	if($.browser.msie){
		window.resizeTo(fileUpload.width()+ 16, total * 35 + 199);
	}else{
		window.resizeTo(fileUpload.width() + 16, total * 35 + 202);
	}
}
if($(document).getUrlParam('upload')){	
	window.opener.location.href="sales_car.php";
	window.close();
}
$("#SEQ").val(seq);
$("#Amount").val(total);
resize_window();
{/literal}
</script>