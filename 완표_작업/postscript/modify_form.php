<?
session_start();
include "../db_connect.php";

$sql = "select * from postscript where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
$item_subject     = $row[subject];
$item_content     = $row[content];
?>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<div id="wrap">
		<div id="header">
			<? // include "../lib/top_login2.php"; ?>
		</div>  <!-- end of header -->

		<div id="menu">
			<? // include "../lib/top_menu2.php"; ?>
		</div>  <!-- end of menu -->

		<div id="content">
			<div id="col1">
				<div id="left_menu">
					<?
		//	include "../lib/left_menu.php";
					?>
				</div>
			</div> <!-- end of col1 -->

			<div id="col2">
				<div id="title">
					<!--	<img src="../img/title_greet.gif"> -->
				</div>

				<div class="clear"></div>

				<div id="write_form_title">
					<!--	<img src="../img/write_form_title.gif"> -->
				</div>

				<div class="clear"></div>
				<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>">
					<div id="write_form">
						<div class="write_line"></div>
						<div id="write_row1">
							<div class="col1"> 이름 </div>
							<div class="col2"><?=$username?></div>
						</div>
						<div class="write_line"></div>
						<div id="write_row2"><div class="col1"> 제목   </div>
						<div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
					</div>
					<div class="write_line"></div>
					<div id="write_row3"><div class="col1"> 내용   </div>
					<div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
				</div>
				<div class="write_line"></div>
			</div>

			<input type="submit" value="완료">&nbsp;
		</form>
		<a href="list.php?page=<?=$page?>"><button>목록</button></a>

	</div> <!-- end of col2 -->
</div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>