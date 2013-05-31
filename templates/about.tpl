<style>
{literal}
.newsContent { bordder: 1px #999 solid; padding: 10px;}
.newsContent .NotFoundData { color: #bd0000; font-size: 14px; text-align: center; font-weight: bold; line-height: 50px; letter-spacing: 2px;}
.newsContent li { border-bottom: 1px #666 solid; width: 100%; display: inline-block; margin-top:20px; padding-bottom: 20px;}
.newsContent li:first-child { margin-top:0px;}
.newsContent li.last{border-bottom: none;}
.newsContent li .newsTitle { color: #666666; text-decoration: underline; font-size: 12px; line-height:54px; margin-left:15px; letter-spacing: 3px;}
.newsContent li .newsTitle.highLine1{ color: #BD0000;}
.newsContent li .newsExpire { color: #666666; font-size: 12px; line-height:54px; margin-left:15px;}
.newsContent li .newsContentDetail { margin-left: 52px; color: #666666; font-family: Times New Roman,Times,serif; font-size: 12px; letter-spacing: 3px; line-height: 17px;}
.newsContent li .newsUpload, .newsContent li .newsPhoto { margin-top:10px;}
{/literal}
</style>
<script>
{literal}
$(".navigationMenu .about").addClass("selected");
function file_open(file){
	var mode=file.split(".")
	var mode=mode.reverse();
	$('.newsFile').remove();
    switch(mode[0]){
	    case"mp3":case"doc":case"pdf":
		window.open(file,'Upload',"toolbar=no,location=no,directory=no,status=yes,scrollbars=no,resizable=no");
		break;
		default:	
		var linkItem = $('<a class="newsFile"></a>').attr({'href': file, 'target': '_blank'}).appendTo($('body'));
		linkItem.get(0).click();		
	    break;
	}
}
{/literal}
</script>
<div class="title">
	<img src="../images/about_tile_news.jpg" width="153" height="27">
</div>
<div class="pagination">
{$pagination}
</div>
<ul class="newsContent">
{if $newsData == 0}
	<li class="NotFoundData">目前沒有任何最新消息！</li>
{else}
	{foreach from= $newsList item= list name= "newLists"}
		{assign var="sn" value= $smarty.foreach.newLists.index+1+$addCont|string_format:"%02d"}		
		<li class="{if $smarty.foreach.newLists.last}last{/if}">
			<span class="listIcon"></span><img src="../images/sub_number_{$sn[0]}.jpg" class="listIconSN" /><img src="../images/sub_number_{$sn[1]}.jpg" class="listIconSN" />
			<span class="newsTitle highLine{$list.VINEWS}">{$list.Caption}</span>
			{if $list.Bgl_time == 0}
				<span class="newsExpire">消息永久有效</span>
			{else}
				<span class="newsExpire">消息期限為{$list.Bgl_EndDate|date_format:"%Y-%m-%d"}</span>
			{/if}
			<div class="newsContentDetail">
			{$list.Bgl_Contents}			
			{if $list.UPLOAD_TAB == 1}				
			<div class="newsUpload">附加檔：
			{foreach from= $list.UPLOAD_DATA item= uploadList}
				<a href="javascript:file_open('../news_file/{$uploadList.FILE_NM}');">{$uploadList.FILE_NICK}</a>
			{/foreach}
			<div>			
			{/if}
			{if $list.PHOTO_TAB == 1}				
			<div class="newsPhoto">附加檔：
			{foreach from= $list.PHOTO_DATA item= photoList}				
				<div>{$photoList.PHOTO_NICK}:<p><img src="../news_img/{$photoList.PHOTO_NM}" /></div>
			{/foreach}
			<div>			
			{/if}
			
			</div>
		</li>
	{/foreach}
{/if}
</ul>