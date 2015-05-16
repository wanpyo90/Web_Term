<?

$connect = mysql_connect("localhost", "root", "apmsetup");
if($connect)  {
  echo "MySQL 연결 성공 <br>";
} else {
  echo "MySQL 연결 실패 <br>";
}

$sql = "create database web_term;";  // 필요?

$result = mysql_query($sql);
if($result) {
  echo "DB 생성 성공 <br>";
} else {
  echo "DB 생성 실패 <br>";
}

$result = mysql_select_db("web_term", $connect);
if($result) {
  echo "DB 접속 성공 <br>";
} else {
  echo "DB 접속 실패 <br>";
}

?>