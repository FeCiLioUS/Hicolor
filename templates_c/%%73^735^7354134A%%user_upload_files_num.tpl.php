<?php /* Smarty version 2.6.26, created on 2012-10-10 16:48:17
         compiled from ../templates/user_upload_files_num.tpl */ ?>
<script>
<?php echo '
function upload(){
   var num=document.buy_upload.Amount.value;
   if(num<1 || isNaN(num)){
      alert("最少要設定一件上傳檔案！");
	  document.buy_upload.Amount.value=1;
	  return;
   }
   document.buy_upload.submit();
}
'; ?>

</script>
<style>
<?php echo '
.form {
	display: inline-block;
}
#uploadTable td{
	vertical-align:top;	
    font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    font-variant: normal;
    letter-spacing: 4px;
}
#uploadTable td.title {
	color: #FFFFFF;
	line-height:30px;
}
#uploadTable td.content {
	height:30px;
	vertical-align: middle;
}
.upload,
.cancel{
	font-size:9pt;width:40px;height:20px;
}
'; ?>

</style>
<form class="form" action="user_upload_files.php?SEQ=<?php echo $this->_tpl_vars['seq']; ?>
" method="post" name="buy_upload">
<table id="uploadTable" width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../images/Aarrowhand_b3.JPG" width="400" height="23"></td>
  </tr>
  <tr>
    <td><table width="400"  border="1" align="center" cellpadding="0" cellspacing="3" bordercolor="#CCCCCC">
      <tr bgcolor="#999999">
        <td height="30" class="title"><div align="center">設定上傳檔案數量</div>
		<div align="center" class="style31"></div></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td height="35" class="content"><div align="center">
              <span class="info">針對第<?php echo $this->_tpl_vars['mbr']; ?>
個編號，我要上傳</span>              
              <input name="Amount" type="text" style="font-size:9pt;width:40px;height:14px;" value="1"> 
              <span class="info">件檔案
              <input type="button" name="Submit" class="upload" value="確定" onclick="upload();">
              <input type="button" name="Submit" class="cancel" value="取消" onclick="javascript:window.close();">
</span></div></td>
      </tr>
      <tr bgcolor="#999999">
        <td height="35"><div align="center">
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
<?php echo '
var form = $(\'.form\'), uploadTable = $("#uploadTable");
if($.browser.msie){
	window.resizeTo(uploadTable.width()+ 16, form.height() + 67);
}else{
	window.resizeTo($("#uploadTable").width()+18, form.height() + 72);
}
'; ?>

</script>