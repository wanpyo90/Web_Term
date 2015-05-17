<?
    session_start();
?>
<html>
<head>
<meta charset="utf-8">

<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.passwd.value)
      {
          alert("비밀번호를 입력하세요");
          document.member_form.passwd.focus();
          return;
      }

      if (!document.member_form.passwd_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");
          document.member_form.passwd_confirm.focus();
          return;
      }

      if (!document.member_form.email.value)
      {
          alert("이메일을 입력하세요");
          document.member_form.email.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");
          document.member_form.hp2.focus();
          return;
      }

      if (!document.member_form.address.value)
      {
          alert("주소를 입력하세요");
          document.member_form.address.focus();
          return;
      }

      if (document.member_form.passwd.value != document.member_form.passwd_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
          document.member_form.passwd.focus();
          document.member_form.passwd.select();
          return;
      }
      alert("확인 완료");

   }

   function reset_form()
   {
      document.member_form.passwd.value = "";
      document.member_form.passwd_confirm.value = "";
      document.member_form.email.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.address.value = "";


      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    include "db_connect.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    mysql_close();
?>
<body>

    <!-- 버튼 -->
      <a href="login.php"><img src="img/login.JPG"></a>
      <a href="member_join.php"><img src="img/join.JPG"></a>
      <a href="member_modify.php"><img src="img/mypage.JPG"></a>

<div id="wrap">
  <div id="header">
    <? // include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
  <?// include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu -->

  <div id="content">
  <div id="col1">
    <div id="left_menu">
<?
      i//nclude "../lib/left_menu.php";
?>
    </div>
  </div> <!-- end of col1 -->

  <div id="col2">
        <form  name="member_form" method="post" action="modify.php">
    <div id="title">
      <!--<img src="../img/title_member_modify.gif">-->
    </div>

<h2>마이페이지</h2>
  <table border="1" width="640" cellspacing="1" cellpadding="4">
  <tr>
    <td align="right">이름 :</td>
    <td> <?= $row[name] ?> </td>
  </tr>
  <tr>
    <td align="right" >아이디 :</td>
    <td> <?= $row[id] ?> </td>
  </tr>
  <tr>
    <td align="right">비밀번호 :</td>
    <td><input type="password" size="15" maxlength="10" name="passwd" value="<?= $row[passwd] ?>"></td>
  </tr>
  <tr>
    <td align="right">비밀번호 확인 :</td>
    <td><input type="password" size="15" maxlength="12" name="passwd_confirm" value="<?= $row[passwd] ?>"> <input type="button" value="중복확인" onclick="check_input()"> </td>
  </tr>
  <tr>
    <td align="right">이메일 :</td>
    <td><input type="text" size="15" maxlength="12" name="email" value="<?= $row[email] ?>"></td>
  </tr>
  <tr>
    <td align="right">휴대전화 :</td>
    <td>
        <input type="text" size="4" name="hp1" maxlength="4" value="<?= $hp1 ?>"> -
        <input type="text" size="4" name="hp2" maxlength="4" value="<?= $hp2 ?>"> -
        <input type="text" size="4" name="hp3" maxlength="4" value="<?= $hp3 ?>"></td>
  </tr>
  <tr>
    <td align="right">주소 :</td>
    <td><textarea name="address" rows="5" cols="60" ><?= $row[address] ?></textarea></td>
  </tr>
  </table>
  <br>
  <table border="0"  width="640">
     <tr><td align="center">
         <input type="submit" value="수정하기">
         <input type="button" value="초기화" onclick="reset_form()"></td>
     </tr>
  </table>
</form>

  </div>
  </div>
</div>

</body>
</html>
