<?
$SQLAccessID="root";
$SQLpwd="jiwtcgrtreice";
$SQLHost="localhost";
$Mydatabase="hicolor";
define("MyLink",mysql_connect($SQLHost,$SQLAccessID,$SQLpwd));
//echo mysql_connect($SQLHost,$SQLAccessID,$SQLpwd);
mysql_select_db($Mydatabase,MyLink);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=utf8");
?>