<style>
{literal}
.noLogin {
	height: 300px;
	text-align: center;
	line-height: 300px;
	color: #990000;
	font-weight: bold;
}
{/literal}
</style>
<div class="noLogin">管理者尚未登入或沒有消息管理的管理權限！</div>
<script>
var login = '{$loginStatus}';
{literal}
if (login == 'true' && msg != '管理者尚未登入或沒有消息管理的管理權限！') {
	document.location.href = '../pages/admin_news.php';
}
{/literal}
</script>