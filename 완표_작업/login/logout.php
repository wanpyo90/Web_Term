<?
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);

  echo("
       <script>
          location.href = 'main.php';
         </script>
       ");
?>
