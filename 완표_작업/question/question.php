<?
session_start();

	$scale=5;			// 한 화면에 표시되는 글 수
	include "../db_connect.php"; 	// db 접속

	$sql = "select * from question order by num desc";
	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산
	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;

	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화

	// 표시할 페이지($page)에 따라 $start 계산
		$start = ($page - 1) * $scale;

		$number = $total_record - $start;
		?>

		<html>
		<head>
			<meta charset="utf-8">
		</head>

		<body>
			<div id="wrap">
				<div id="header">
					<?// include "../lib/top_login2.php"; ?>
				</div>  <!-- end of header -->

				<div id="menu">
					<?// include "../lib/top_menu2.php"; ?>
				</div>  <!-- end of menu -->

				<div id="content">
					<div id="col1">
						<div id="left_menu">
							<?
	//		include "../lib/left_menu.php";
							?>
						</div>
					</div>
					<div id="col2">
						<div id="title">
							<!--	<img src="../img/title_memo.gif"> -->
						</div>

						<div id="memo_row1">
							<form  name="memo_form" method="post" action="insert.php">
								<div id="memo_writer"><span >▷ <?= $username ?></span></div>
								<div id="memo1"><textarea rows="6" cols="95" name="content"></textarea>	<button>메모하기</button></div>
							</form>
						</div> <!-- end of memo_row1 -->
						<?
						for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
						{
							mysql_data_seek($result, $i);
							$row = mysql_fetch_array($result);

							$memo_id      = $row[id];
							$memo_num     = $row[num];
							$memo_date    = $row[regist_day];
							$memo_name    = $row[name];

							$memo_content = str_replace("\n", "<br>", $row[content]);
							$memo_content = str_replace(" ", "&nbsp;", $memo_content);
							?>

							<table border="1">
								<tr>
									<td><?= $number ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $memo_name ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $memo_date ?></td>
								</tr>
								<td><?= $memo_content ?></td>
							</table>

							<?
							if($userid=="admin" || $userid==$memo_id)
								echo "<a href='delete.php?num=$memo_num'>[삭제]</a>";
							?>

							<div id="ripple">
								<div id="ripple1"><br>덧글</div>
								<div id="ripple2">
									<?
									$sql = "select * from question_ripple where parent='$memo_num'";
									$ripple_result = mysql_query($sql);

									while ($row_ripple = mysql_fetch_array($ripple_result))
									{
										$ripple_num     = $row_ripple[num];
										$ripple_id      = $row_ripple[id];
										$ripple_name    = $row_ripple[name];
										$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
										$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
										$ripple_date    = $row_ripple[regist_day];
										?>

										<table border="1">
											<tr>
												<td><?= $ripple_name ?> &nbsp;&nbsp;&nbsp; <?= $ripple_date ?></td>
												<?
												if($userid=="admin" || $userid==$ripple_id)
													echo "<a href='delete_ripple.php?num=$ripple_num'>삭제</a>";
												?>
												<td><?= $ripple_content ?></td>
										</table>
												<?
											}
											?>
											<form  name="ripple_form" method="post" action="insert_ripple.php">
												<input type="hidden" name="num" value="<?= $memo_num ?>">
												<div id="ripple_insert">
													<div id="ripple_textarea">
														<textarea rows="3" cols="80" name="ripple_content"></textarea>
														<button>덧글입력</button>
													</div>
												</div>
											</form>

										</div> <!-- end of ripple2 -->
										<div class="clear"></div>
										<div class="linespace_10"></div>
										<?
										$number--;
									}
									mysql_close();
									?>
									<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
										<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
										for ($i=1; $i<=$total_page; $i++)
										{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{
			echo "<a href='memo.php?page=$i'> $i </a>";
		}
	}
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶</div>
</div> <!-- end of ripple -->
</div> <!-- end of col2 -->
</div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
