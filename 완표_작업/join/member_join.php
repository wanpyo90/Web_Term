

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <!-- 버튼 -->
      <a href="login.php"><img src="img/login.JPG"></a>
      <a href="member_join.php"><img src="img/join.JPG"></a>
      <a href="member_modify.php"><img src="img/mypage.JPG"></a>

<h2>회원가입</h2>
<form action = "member_join.php?mode=member_insert" method='post'>
  <input type="hidden" name="title" value="회원가입 양식">
  <table border="1" width="640" cellspacing="1" cellpadding="4">
  <tr>
    <td align="right">이름 :</td>
    <td><input type="text" size="15" maxlength="12" name="name"></td>
  </tr>
  <tr>
    <td align="right" >아이디 :</td>
    <td><input type="text" size="15" maxlength="12" name="id"></td>
  </tr>
  <tr>
    <td align="right">비밀번호 :</td>
    <td><input type="password" size="15" maxlength="10" name="passwd"></td>
  </tr>
  <tr>
    <td align="right">비밀번호 확인 :</td>
    <td><input type="password" size="15" maxlength="12" name="passwd_confirm"></td>
  </tr>
  <tr>
    <td align="right">이메일 :</td>
    <td><input type="text" size="15" maxlength="12" name="email"></td>
  </tr>
  <tr>
    <td align="right">생년월일 :</td>
    <td><select name="birth_1">
           <option>----</option>
           <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option>
           <option value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option>
           <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option>
           <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option>
           <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option>
           <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option>
           <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option>
           <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option>
           <option value="1991">1991</option> <option value="1990">1990</option> <option value="1989">1989</option>
           <option value="1988">1988</option> <option value="1987">1987</option> <option value="1986">1986</option>
           <option value="1985">1985</option> <option value="1984">1984</option> <option value="1983">1983</option>
           <option value="1982">1982</option> <option value="1981">1981</option> <option value="1980">1980</option>
        </select> 년 <select name="birth_2">
           <option>--</option>
           <option value="12">12</option> <option value="11">11</option> <option value="2013">10</option>
           <option value="09">09</option> <option value="08">08</option> <option value="07">07</option>
           <option value="06">06</option> <option value="05">05</option> <option value="04">04</option>
           <option value="03">03</option> <option value="02">02</option> <option value="01">01</option>
        </select> 월 <select name="birth_3">
           <option>--</option>
           <option value="31">31</option> <option value="30">30</option> <option value="29">29</option>
           <option value="28">28</option> <option value="27">27</option> <option value="26">26</option>
           <option value="25">25</option> <option value="24">24</option> <option value="23">23</option>
           <option value="22">22</option> <option value="21">21</option> <option value="20">20</option>
           <option value="19">19</option> <option value="18">18</option> <option value="17">17</option>
           <option value="16">16</option> <option value="15">15</option> <option value="14">14</option>
           <option value="13">13</option> <option value="12">12</option> <option value="11">11</option>
           <option value="10">10</option> <option value="09">09</option> <option value="08">08</option>
           <option value="07">07</option> <option value="06">06</option> <option value="05">05</option>
           <option value="04">04</option> <option value="03">03</option> <option value="02">02</option>
           <option value="01">01</option>
        </select> 일
    </td>
  </tr>
  <tr>
    <td align="right">성별 :</td>
    <td><input type="radio" name="gender" value="M" checked>남
        <input type="radio" name="gender" value="F">여</td>
  </tr>
  <tr>
    <td align="right">휴대전화 :</td>
    <td><select name="phone_1">
           <option>선택</option>
           <option value="010">010</option>
           <option value="011">011</option>
           <option value="017">017</option>
        </select> -
        <input type="text" size="4" name="phone_2" maxlength="4"> -
        <input type="text" size="4" name="phone_3" maxlength="4"></td>
  </tr>
  <tr>
    <td align="right">주소 :</td>
    <td><textarea name="address" rows="5" cols="60"></textarea></td>
  </tr>
  </table>
  <br>
  <table border="0"  width="640">
     <tr><td align="center">
         <input type="submit" value="회원가입">
         <input type="button" value="취소"></td>
     </tr>
  </table>
</form>

<!-- 입력내용 DB 전송 및 저장 -->
<?

include "db_connect.php";

// 테이블 개인적으로 추가할 것. - member_create.sql
if( $mode == "member_insert" )  {
  if($passwd != $passwd_confirm)  {
    echo "비밀번호 다시 입력하세요<br>";
  } else if( $name==NULL || $id==NULL || $passwd==NULL || $passwd_confirm==NULL || $email==NULL || $birth_3==NULL || $birth_2==NULL || $birth_1==NULL || $gender==NULL || $phone_1==NULL || $phone_2==NULL || $phone_3==NULL || $address==NULL )  {
    echo "빈칸을 체우세요.";
  } else {
    $birth_sum = "$birth_1/$birth_2/$birth_3";
    $phone_sum = "$phone_1-$phone_2-$phone_3";
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $sql = "insert into member values('$name', '$id', '$passwd', '$email', '$birth_sum', '$gender', '$phone_sum', '$address', '$regist_day');";

    $result = mysql_query($sql);
    if($result) {
      echo "레코드 삽입 성공 <br>";
    } else {
      echo "레코드 삽입 실패 <br>";
    } // if
  } // if
} // if

?>

<p>
<a href="login.php">로그인 이동</a>
</p>

</body>
</html>