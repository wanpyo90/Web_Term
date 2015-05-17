<?
   include "../db_connect.php";

   $sql = "delete from question where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'question.php';
	   </script>
	";
?>

