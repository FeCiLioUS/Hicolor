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
table,
input{
	margin: 0;
	padding: 0;
}
#fileUpload {
	margin: auto;
}
#fileUpload td{
	text-align: center;
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
.info {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	letter-spacing: 2px;
	color: #333333;
}
.menu {
	font-family: "Times New Roman", Times, serif;
	font-size: 11px;
	letter-spacing: 4px;
	color: #999999;
	font-variant: normal;	
}
.line {
	clear: left;
	height: 2px;
	width: 100px;
	word-spacing: 10em;
	display: block;
	margin: 40px;
	padding: 40px;
}
.contents {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	letter-spacing: 3px;
	color: #666666;
	line-height: 17px;
}
.topic {
	font-family: "Times New Roman", Times, serif;
	font-size: 15px;
	letter-spacing: 2px;
}
.link_num {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	color: #666666;
	text-decoration: none;
	letter-spacing: 3px;
}
.PS {
	font-family: "Times New Roman", Times, serif;
	font-size: 12px;
	position: static;
	width: 260px;
	clip: rect(auto,auto,auto,auto);
}
.sub_name {
	font-family: "華康中黑體(P)";
	font-size: 18px;
}
.style31 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #FFFFFF; font-variant: normal; }
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; letter-spacing: 2px; color: #FFFFFF; }
.style33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; letter-spacing: 2px; color: #FFFFFF; }
.style34 {font-size: 9.5px}
{/literal}
</style>
<script>
var total={$amount};
var seq= {$seq};
</script>
<form action="user_fix_upload_action.php?seq={$seq}&upload=true&mbr={$mbr}" method="post" enctype="multipart/form-data" name="buy_upload">
<table id="fileUpload" width="600"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../images/Aarrowhand_b3.JPG" width="400" height="23"></td>
  </tr>
  <tr>
    <td><table width="600"  border="1" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
      <tr bgcolor="#999999">
        <td width="50%" height="30" class="title">
			<div align="center">
				案件名稱<br>
				<span>(填寫供查詢使用)</span>
			</div>
		</td>
        <td width="50%" height="30" class="title">
			<div align="center">
				上傳檔案<br>
				<span>(檔名不可重覆</span>)
			</div>
		</td>
      </tr>
      {section name="filesNumber" loop=$amount}
		<tr><td height="30"><div align="center"><input name="files_nm{$smarty.section.filesNumber.iteration}" type="text" id="files_nm{$smarty.section.filesNumber.iteration}" style="font-size:9pt;width:230px;height:16px;"></div></td><td height="30"><div align="center"><input type="file" name="file_upload{$smarty.section.filesNumber.iteration}" style="font-size:9pt;height:22px;" size="30"></div><div align="center"></div></td></tr>
	  {/section}
      <tr>
        <td height="35" colspan="2" class="footer">
			<div align="center">
				<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" onclick="window.close();" type="button" value="關閉視窗" name="Button">　
				<INPUT style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" type="reset" value="重新設定" name="reset">
				　
				<input style="FONT-SIZE: 9pt; WIDTH: 70px; HEIGHT: 24px" type="button" value="確定上傳" name="開始上傳" onClick="upload_file();">
				<input type="hidden" name="SEQ" value="{$seq}">
				<input type="hidden" name="Amount" value="{$amount}">
				<div class="progress"></div>
			</div>
		</td>
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
	   /*if(files_nm.length==0){
	      check=0;
	      document.buy_upload.elements[h*2].focus();
	      alert('請輸入檔案名稱！');
          return;
	   }else */if(files_nm && files_nm.match(/[\" | \' | \$]/)){
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
		window.resizeTo(fileUpload.width() + 16	, total * 35 + 199);
	}else{
		window.resizeTo(fileUpload.width() + 16, total * 33 + 202);
	}
}
resize_window();
{/literal}
</script>