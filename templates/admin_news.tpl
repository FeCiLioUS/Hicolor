<script>
var pageNow = {$pageNow};
{literal}
function ShowImg(img){
    window.open("../news_img/" + img, "SHOW", "leftmargin=0,topmargin=0,marginwidth=0,marginheight=0,toolbar=no,location=no,directory=no,status=no,scrollbar=no,resizable=yes,width=250,height=250")
}
function photo_upload(seq) {
   window.open("NEWS_Photo_Upload.php?Bgl_Num=" + seq, "Upload", "toolbar=no,location=no,directory=no,status=yes,scrollbars=no,resizable=no,width=400,height=163");
 //   window.open("NEWS_Photo_Upload.php?Bgl_Num="+seq,"Upload","toolbar=no,location=no,directory=no,status=no,scrollbars=yes,resizable=yes,width=1000,height=800");
}
function Del_img(name, seq) {
    if (confirm("確定刪除消息圖檔「" + name + "」?")){
        location.href="news_photo_del_action.php?FILES_SEQ=" + seq + "&PAGE=" + pageNow + "&FILES_NM=" + name;
    }
}
function fix_news(num){
    window.location.href="news_fix.php?PAGE=" + pageNow + "&SEQ_NUM=" + num;
}
function search_news() {
    var year=document.search_news_form.year.value;
	var month=document.search_news_form.month.value;
	var KEYWORD=document.search_news_form.KEYWORD.value;
	if(!year && !month && !KEYWORD){
	    alert("至少要輸入年份或關鍵字！")
		document.search_news_form.year.value=""
		return;
	}
	if(year && !month){
	    if(isNaN(year) ||year<1911){
	        alert("請輸入正確的查詢年份！")
		    document.search_news_form.year.value=""
		    document.search_news_form.year.focus();
		    return;
	    }
	}else if(year && month){
	    if(isNaN(year) || year<1911){
	        alert("請輸入正確的查詢年份！")
		    document.search_news_form.year.value=""
		    document.search_news_form.year.focus();
		    return;
	    }else if(isNaN(month) || month<1 ||month>12){
	        alert("請輸入正確的查詢月份！");
		    document.search_news_form.month.value=""
		    document.search_news_form.month.focus();
		    return;
	    }
	}else if(month && !year){
	     alert("請輸入年份！")
		 document.search_news_form.year.value=""
		 document.search_news_form.year.focus();
		 return;
	}
	if(KEYWORD && KEYWORD.match(/[\" | \$ | \']/g)){
	    alert("請誤輸入「 \"、\'、\$」符號！");
		document.search_news_form.KEYWORD.value=""
		document.search_news_form.KEYWORD.focus();
		return;
	}
	document.search_news_form.submit();
}
{/literal}
</script>
<style type="text/css">
{literal}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
a {
	text-decoration: none;
}
.headerLogo {
	margin-top: 10px;
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
	line-height: 20px;
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
	line-height: 20px;
}
.sub_name {
	font-family: "華康中黑體(P)";
	font-size: 18px;
}
.detail_search {
	display: none;
}
.style26 {color: #666666}
.style32 {color: #FFFFFF}
.style50 {font-family: "Times New Roman", Times, serif; font-size: 11px; letter-spacing: 4px; color: #990000; font-variant: normal; line-height: 20px; }
.style58 {color: #990000}
{/literal}
</style>
<div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">	
	<tr>
		<td valign="bottom">
			<div align="center" class="headerLogo">
				<img src="../images/news_tile_newadmin.jpg" width="153" height="27">
			</div>			
		</td>
	</tr>
	<tr>
		<td height="13" valign="top">
			<hr size="1" noshade>
		</td>
	</tr>
	<tr>
		<td>			
			<div align="left">
				<table width="493" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="120">
							<div align="center">
								<img src="../images/arrowhead_small_blue.jpg" width="9" height="9">
								<a href="news_add.php?PAGE={$pageNow}{$urlAug}" class="style50"  STYLE="text-decoration: none" >
									<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'"> 新增消息</font>
								</a>
							</div>
						</td>
						<td width="138" class="info">
							<div align="center">
								<img src="../images/arrowhead_small_blue.jpg" width="9" height="9">
								{if $smarty.get.MODE == 'OVER'}
									<a href="admin_news.php" class="style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">有效消息</font>
									</a>
								{else}
									<a href="admin_news.php?MODE=OVER" class="style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">己過期消息</font>
									</a>
								{/if}
							</div>
						</td>
						<td width="117">
							<div align="center" class="style58">
								<span class="info">
									<img src="../images/arrowhead_small_blue.jpg" width="9" height="9">
								</span>
								<a href="javascript:;" class="newsSearch style50"  STYLE="text-decoration: none" >
									<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">消息搜尋</font>
								</a>
							</div>
						</td>
						<td width="118">
							<div align="center">
								<span class="info">
									<img src="../images/arrowhead_small_blue.jpg" width="9" height="9">
								</span>
								<span class="style58">
									<a href="admin_news.php" class="style50"  STYLE="text-decoration: none" >
										<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">重新載入</font>
									</a>
								</span>
							</div>
						</td>
					</tr>
				</table>				
			</div>
		</td>
	</tr>
	<tr class="detail_search">
		<td>
			<form name="search_news_form" method="post" action="admin_news.php" onSubmit="search_news();">
				<div align="center" class="menu style26">
					消息日期查詢：西元 <INPUT style="FONT-SIZE: 9pt; WIDTH: 60px; HEIGHT: 16px" maxLength=4 size=8 name="year"> 年 <INPUT style="FONT-SIZE: 9pt; WIDTH: 30px; HEIGHT: 16px" maxLength=2 size=4 name="month"> 月 佈告標題： <INPUT style="FONT-SIZE: 9pt; WIDTH: 100px; HEIGHT: 16px" name="KEYWORD"><input name="search" type="button" id="送出" value="查詢" style="font-size:9pt;width:40;height:22px;" onclick="javascript:search_news()">
					<input type="hidden" name="Q_TAB" value="1">
				</div>
			</form>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<form action="news_del_action.php" method="post" name="news_del_form">
<table width="100%" height="83" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="#FFFFFF">
	<tr>
		<td height="81">
			<table width="100%" border="0" cellpadding="0" cellspacing="3">
				<tr valign="middle" bgcolor="#C7DADC" class="PS">
					<td height="35" colspan="5" bgcolor="#C6D6DD">
						<div align="center" class="style32">
							<span class="menu">
								<span class="contents">{$pagination}</span>
								<input type="hidden" name="del_num">
								<input type="hidden" name="del_seq">
							</span>
						</div>
					</td>
					<td height="35">
						<div align="center">
							<span class="style32">
								<span class="menu">
									<FONT size=2>
										<span class="menu style26">
											<input name="news_del" type="button" id="送出" value="刪除" style="font-size:9pt;width:40;height:22px;" onclick="javascript:del_news()">
										</span>
									</FONT>
								</span>
							</span>
						</div>
					</td>
				</tr>
				<tr valign="middle" bgcolor="#999999" class="PS">
					<td width="41" height="35">
						<div align="center" class="style32">編號</div>
					</td>
					<td width="268" height="35">
						<div align="center" class="style32">公　佈　標　題</div>
					</td>
					<td width="50" height="35">
						<div align="center"><span class="style32">圖　檔</span></div>
					</td>
					<td width="54" height="35">
						<div align="center" class="style32">附加檔</div>
					</td>
					<td width="152" height="35">
						<div align="center" class="style32">消　息　期　限</div>
					</td>
					<td width="60" height="35">
						<div align="center" class="style32"></div>
						<div align="center" class="style32">刪　除</div>
					</td>
				</tr>
				{if $newsList|@count == 0}
					<tr valign="middle" class="PS"><td height="35" colspan="6"><div align="center" class="style32 style58">查無任何消息！</div></td></tr>
				{else}
				{foreach name='newsData' from=$newsList item=itemData}
				<tr valign="middle" bgcolor="#D9D9D9" class="style26">
					<td height="30">
						<div align="center" class="style54">							
							<a href="javascript:fix_news('{$itemData.SEQ_NBR}{$urlAug}');" class="style50" STYLE="text-decoration: none">
								<font onmouseout="this.style.color = '#990000'" onMouseOver="this.style.color = '#333333'">{$smarty.foreach.newsData.index+1}</font>
							</a>
						</div>
					</td>
					<td height="30">
						<div align="center">
							<div align="center" class="PS" style="width:180px;overflow:hidden;" nowrap>{$itemData.Caption}</div>
						</div>
					</td>
					<td height="30">
						{if $itemData.PHOTO_TAB == 0}
							<div align="center" class="style54">
								<a href="javascript:photo_upload('{$itemData.SEQ_NBR}')">
									<img src="../images/add_photo.jpg" width="15" height="15" border="0">
								</a>
							</div>
						{else}
							<div align="center" class="style54">
								<a href="javascript:ShowImg('{$itemData.newsPhotoData.PHOTO_NM}');">
									<img src="../images/view_file.jpg" width="15" height="15" border="0">
								</a>
								<a href="javascript:Del_img('{$itemData.newsPhotoData.PHOTO_NM}', {$itemData.SEQ_NBR});">
									<img src="../images/del_photo.jpg" width="15" height="15" border="0">
								</a>
							</div>
						{/if}						
					</td>
					<td height="30">
						<div align="center" class="style54">
							{if $itemData.UPLOAD_TAB == 1}
								<img src="../images/ok_gray.jpg" width="13" height="13">
							{else}
								<img src="../images/no_gray.jpg" width="13" height="13">
							{/if}
						</div>
					</td>
					<td height="30">
						<div align="center">
							<span class="style52">
								<span class="PS">{$itemData.NEWS_DATE}</span>
							</span>
						</div>
					</td>
					<td height="30">
						<div align="center" class="style54">
							<div align=center>
								<INPUT type="checkbox" class="deleteBox" value="{$itemData.SEQ_NBR}" name="del_news[{$smarty.foreach.newsData.index+1}]">
							</div>
						</div>
					</td>
				</tr>
			    {/foreach}
				{/if}
			</table>
		</td>
	</tr>
</table>
</form>
</div>
<script>
{literal}
	var detail_search = $('.detail_search'),
		del_num = $('input[name="del_num"]'),
		del_seq = $('input[name="del_seq"]'),
		news_del_form = $('form[name="news_del_form"]'),
		del_news = function (){
			var deleteBox = $('.deleteBox:checked'),
				deleteArray = [];
			if (deleteBox.length == 0) {
				alert("沒有勾選刪除的消息！");
				return;
			} else {
				del_num.val(deleteBox.length);
				$(deleteBox).each(function(index, item){
					deleteArray.push($(item).val());
				});
				del_seq.val(deleteArray.join(','));				
				news_del_form.trigger('submit');
			}			
		};
	$('.newsSearch').toggle(
		function() {
			detail_search.show();
		},
		function() {
			detail_search.hide();
		}
	);	
{/literal}
</script>