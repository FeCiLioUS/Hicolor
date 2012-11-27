<? 
if(eregi("MSIE 6.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 5.0",$_SERVER["HTTP_USER_AGENT"]) || eregi("MSIE 4.0",$_SERVER["HTTP_USER_AGENT"])){
}else{
  header("location:NO_IE.htm");
}
//引入no-catch程式;
include("./lib/no-cache.php");
//引入資料庫連結程式，並回傳狀態;
include("./lib/link.php");
//載入functin;
include ("./lib/data_class.php");
include ("./lib/page_class.php");
//載入變數定義檔;
include ("./lib/variable.php");
//檢查變數合法;
check(urlencode("您輸入的字元有含非法的字元！"));
$_POST=slashes();
?>
