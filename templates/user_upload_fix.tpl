<link rel="stylesheet" type="text/css" href="../css/hicolor.css" />
<style>
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
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
.colorBorder {
	border-color: #CCCCCC;
}
.style31 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #FFFFFF; font-variant: normal; }
.style34 {color: #FFFFFF}
.style35 {color: #990000}
td{
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
{/literal}
</style>
</head>
<body>
<table width="600"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<div align="center"><img src="../images/Aarrowhand_b3.JPG" width="400" height="23"></div>
		</td>
	</tr>
	<tr>
		<td>
			<form name="UPLOAD_FIX" action="user_fix_upload_fix_action.php?seq={$seq}&mbr={$mbr}" method="post" >
				<table width="600" class="colorBorder uploadedTable"  border="1" align="center" cellpadding="0" cellspacing="3">
					<tr bgcolor="#999999">
						<td height="30" colspan="4" class="style31">
							<div align="center">已上傳檔案資料</div>
							<div align="center" class="style31"></div>
						</td>
					</tr>
					<tr bgcolor="#CCCCCC" class="contents">
						<td width="39" height="35"><div align="center">件數</div></td>
						<td width="212"><div align="center">檔案對應名稱</div></td>
						<td width="271"><div align="center">檔案名稱</div></td>
						<td width="53"><div align="center">刪除</div></td>
					</tr>
					{if count($rowData) > 0}
					{foreach from=$rowData item="data" name="uploadedFiles"}									
						{if $data.FILE_NICK == "0"}
							{assign var=FILE_NICK value=''}
						{else}
							{assign var=FILE_NICK value=$data.FILE_NICK}
						{/if}
						<tr bgcolor="#F2F2F2" class="contents">
							<td height="35"><div align="center" class="style35">{$smarty.foreach.uploadedFiles.index+1}</div></td>
							<td>
								<div align="center">
									<input name="files_nm{$smarty.foreach.uploadedFiles.index+1}" class="fileNickName" type="text" id="files_nm{$smarty.foreach.uploadedFiles.index+1}" style="font-size:9pt;width:200;height:16px;" value="{$FILE_NICK}">
								</div>
							</td>
							<td>
								<div align="center">{$data.FILE_NM}</div>
							</td>
							<td>
								<div align="center">
									<input type="checkbox" name="del_sub[{$smarty.foreach.uploadedFiles.index+1}]" value="{$data.SEQ_NBR}">
									<input type="hidden" name="SEQ_NBR[{$smarty.foreach.uploadedFiles.index+1}]" value="{$data.SEQ_NBR}">
								</div>
							</td>
						</tr>									
					{/foreach}
					{else}
						<tr bgcolor="#F6F6F6" class="contents"><td height="35" colspan="4"><div align="center" class="style35">尚無任何檔案可供修改！</div></td></tr>
					{/if}
					<tr bgcolor="#CCCCCC" class="contents">
						<td height="35" colspan="4">
							<div align="center">
								<span class="info">
									<input type="button" name="Submit" value="修改" style="font-size:9pt;width:40px;height:24px;" onClick="upload_fix();">
									<input type="button" name="Submit" value="刪除" style="font-size:9pt;width:40px;height:24px;" onClick="upload_del();">
									<input type="hidden" name="MODE">
									<input type="hidden" name="SEQ" value="{$seq}">
								</span>
							</div>
						</td>
					</tr>
				</table>
			</form>	
			<form action="" method="post" name="buy_upload">
				<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="3" class="colorBorder">				
					<tr bgcolor="#999999" class="contents">
						<td width="575" height="35">
							<div align="center" class="style34">還要上傳資料</div>
						</td>
					</tr>
					<tr bgcolor="#FFFFFF">
						<td height="35">
							<div align="center">
								<span class="info">我還要上傳</span>
								<input name="Amount" type="text" style="font-size:9pt;width:40px;height:14px;" value="1">
								<span class="info">件檔案
									<input type="button" name="Submit" value="確定" style="font-size:9pt;width:40px;height:24px;" onClick="javascript:upload();">
									<input type="button" name="Submit" value="關閉視窗" style="font-size:9pt;width:60px;height:24px;" onClick="javascript:window.close();">
								</span>
							</div>
						</td>
					</tr>
					<tr bgcolor="#999999">
						<td height="35"></td>
					</tr>				
				</table>
			</form>
		</td>
	</tr>
	<tr>
		<td><div align="center"><img src="../images/Aarrowhand_b4.JPG" width="400" height="23"></div></td>
	</tr>
</table>
<script>
{if count($rowData) > 0}
	var rowCount= {$smarty.foreach.uploadedFiles.total};
{else}
	var rowCount= 0;
{/if}
var SEQ= '{$seq}';
var mbr={$mbr};
{literal}
var uploadedTable = $('.uploadedTable');
function ErrMsgUpload(Msg){
	if(Msg.length != 0){
		if(Msg=="尚無任何上傳的檔案可供修改！" || Msg=="全部附件刪除完畢！"){
			if(window.opener.document.title=="購物車"){
				alert(Msg);
				window.opener.location.href="sales_car.php";					
			}
			window.close();
		}else if(Msg=="您尚未登入，請先登入會員！"){
			window.opener.location.href="about.php";
			window.close();
		}else{
			if(window.opener.document.title=="購物車"){				
				window.opener.location.href="sales_car.php";
			}			
		}
	}
}
function upload(){
   var num=document.buy_upload.Amount.value;
   if(num<1 || isNaN(num)){
      alert("最少要設定一件上傳檔案！");
	  document.buy_upload.Amount.value=1;
	  return;
   }
   document.location.href= "../pages/user_fix_upload_files.php?seq="+SEQ+"&Amount="+num+"&FIX=Y&mbr=" + mbr;
   //window.open("user_fix_upload_files.php?SEQ="+SEQ+"&Amount="+num+"&FIX=Y","CONTI_Upload","toolbar=no,location=no,directory=yes,status=no,scrollbars=yes,resizable=no,width=418,height=165");
}
function upload_fix(){
	var flag= true;
	var inputs= $('.fileNickName');
	$(inputs).each(
		function(index, item) {
			if($(item).val() == "") {
				flag= false;
				item.focus();
				alert('請輸入檔案對應名稱！');				
				return;
			}
		}
	);
	if(flag){
		document.UPLOAD_FIX.MODE.value="FIX";
		document.UPLOAD_FIX.submit();
	}
}
function upload_del(){
   var total= rowCount;
   var i=0;
   var ch=0;
   while(i<total){
	  var up_del=document.UPLOAD_FIX.elements[(i*3)+1].checked;
	  if(up_del==true){
	     ch++;
	  }
	  i++;
   }
   if(ch==0){
      alert("尚未勾選想刪除的檔案！");
	  return;
   }else{
      document.UPLOAD_FIX.MODE.value="DEL";
      document.UPLOAD_FIX.submit();
   }
}
(function($){
	$(document).ready(
		function(){
			if($.browser.msie){
				window.resizeTo(uploadedTable.width()+ 16,362+(rowCount*37));
			}else {
				window.resizeTo(uploadedTable.width()+ 18,352+(rowCount*37));
			}
		}
	);
})(jQuery);
{/literal}
{if $Msg != ""}	
	ErrMsgUpload('{$Msg}');
{/if}
</script>