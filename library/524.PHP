<?php
require_once ('config.php');
require_once ('DB.php');
require_once ('class/Template.php');

//===============================================
// 清除登入資訊
//===============================================
session_start();
unset($_SESSION['LOGIN']);

//===============================================
// 去除 Magic Quotes 的影響
//===============================================
if (get_magic_quotes_gpc())
{
  $_GET = array_map('stripslashes', $_GET);
  $_POST = array_map('stripslashes', $_POST);
  $_COOKIE = array_map('stripslashes', $_COOKIE);
  $_REQUEST = array_map('stripslashes', $_REQUEST);
}

//===============================================
// 轉換輸入字串的編碼
//===============================================
if (MYSQL41)
{
  $_GET = array_map('toUTF8', $_GET);
  $_POST = array_map('toUTF8', $_POST);
  $_COOKIE = array_map('toUTF8', $_COOKIE);
  $_REQUEST = array_map('toUTF8', $_REQUEST);
}

//===============================================
// 處理輸入字串函式
//===============================================
function toUTF8($value)
{
    return iconv('BIG5', 'UTF-8', $value);
}

//===============================================
// 取得資料庫連結
//===============================================
function getDB($dsn)
{
  // 建立資料庫連結
  $db = &DB::connect($dsn);

  if (DB::isError($db))
  {
    header("Content-Type: text/plain; charset=big5");
    die ($db->getMessage());
  }

  return $db;
}
?>