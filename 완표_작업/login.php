<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="wrap">
  <div id="header">
 <!--   <a><img src="http://placehold.it/90x160" /></a> -->
  </div>  <!-- end of header -->

  <div id="menu">
<!--	<a><img src="http://placehold.it/90x160" /></a> -->
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<!--		-- >
		</div>
	</div> <!-- end of col1 -->

	<div id="col2">
        <form  name="member_form" method="post" action="login_confirm.php"> 
		<div id="title">
			<h3>로그인<h3>
		</div>
       
		<div id="login_form">
			<p>회원님의 아이디와 비밀번호를 입력해 주세요</p>

			 <div class="clear"></div>

			 <div id="login1">
				<a><img src="http://placehold.it/100x100" /></a>
			 </div>
			 <div id="login2">
				<div id="id_input_button">
					<div id="id_pw_title">
						<ul>
						<li>아이디&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="id" class="login_input"></li>
						<li>비밀번호 <input type="password" name="passwd" class="login_input"></li>
						</ul>
					</div>
					<div id="login_button">
						<input type="image" img src="http://placehold.it/80x50" />
					</div>
				</div>
				<div class="clear"></div>

				<div id="login_line"></div>
				<div id="join_button"><a href="member_join.php">회원가입</a></div>
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>