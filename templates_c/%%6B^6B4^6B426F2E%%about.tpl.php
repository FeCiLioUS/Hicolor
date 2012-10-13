<?php /* Smarty version 2.6.26, created on 2012-07-21 17:45:27
         compiled from ../templates/about.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', '../templates/about.tpl', 31, false),array('modifier', 'date_format', '../templates/about.tpl', 38, false),)), $this); ?>
<style>
<?php echo '
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
'; ?>

</style>
<script>
<?php echo '
$(".navigationMenu .about").addClass("selected");
'; ?>

</script>
<div class="title">
	<img src="../images/about_tile_news.jpg" width="153" height="27">
</div>
<div class="pagination">
<?php echo $this->_tpl_vars['pagination']; ?>

</div>
<ul class="newsContent">
<?php if ($this->_tpl_vars['newsData'] == 0): ?>
	<li class="NotFoundData">目前沒有任何最新消息！</li>
<?php else: ?>
	<?php $_from = $this->_tpl_vars['newsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newLists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newLists']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['newLists']['iteration']++;
?>
		<?php $this->assign('sn', ((is_array($_tmp=($this->_foreach['newLists']['iteration']-1)+1+$this->_tpl_vars['addCont'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02d") : smarty_modifier_string_format($_tmp, "%02d"))); ?>		
		<li class="<?php if (($this->_foreach['newLists']['iteration'] == $this->_foreach['newLists']['total'])): ?>last<?php endif; ?>">
			<span class="listIcon"></span><img src="../images/sub_number_<?php echo $this->_tpl_vars['sn'][0]; ?>
.jpg" class="listIconSN" /><img src="../images/sub_number_<?php echo $this->_tpl_vars['sn'][1]; ?>
.jpg" class="listIconSN" />
			<span class="newsTitle highLine<?php echo $this->_tpl_vars['list']['VINEWS']; ?>
"><?php echo $this->_tpl_vars['list']['Caption']; ?>
</span>
			<?php if ($this->_tpl_vars['list']['Bgl_time'] == 0): ?>
				<span class="newsExpire">消息永久有效</span>
			<?php else: ?>
				<span class="newsExpire">消息期限為<?php echo ((is_array($_tmp=$this->_tpl_vars['list']['Bgl_EndDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>
			<?php endif; ?>
			<div class="newsContentDetail">
			<?php echo $this->_tpl_vars['list']['Bgl_Contents']; ?>
			
			<?php if ($this->_tpl_vars['list']['UPLOAD_TAB'] == 1): ?>				
			<div class="newsUpload">附加檔：
			<?php $_from = $this->_tpl_vars['list']['UPLOAD_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['uploadList']):
?>
				<a href="javascript:file_open('../news_file/<?php echo $this->_tpl_vars['uploadList']['FILE_NM']; ?>
)"><?php echo $this->_tpl_vars['uploadList']['FILE_NICK']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
			<div>			
			<?php endif; ?>
			<?php if ($this->_tpl_vars['list']['PHOTO_TAB'] == 1): ?>				
			<div class="newsPhoto">附加檔：
			<?php $_from = $this->_tpl_vars['list']['PHOTO_DATA']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photoList']):
?>				
				<div><?php echo $this->_tpl_vars['photoList']['PHOTO_NICK']; ?>
:<p><img src="../news_img/<?php echo $this->_tpl_vars['photoList']['PHOTO_NM']; ?>
" /></div>
			<?php endforeach; endif; unset($_from); ?>
			<div>			
			<?php endif; ?>
			
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</ul>