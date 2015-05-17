<?
session_start();
?>

<html>
<head>
	<meta charset="utf-8">

</head>
<?
include "../db_connect.php";

	$scale=10;			// 한 화면에 표시되는 글 수

	if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				window.alert('검색할 단어를 입력해 주세요!');
				history.go(-1);
				</script>
				");
			exit;
		}

		$sql = "select * from postscript where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from postscript order by num desc";
	}

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
		<body>
			<div id="wrap">
				<div id="header">
					<? //include "../lib/top_login2.php"; ?>
				</div>  <!-- end of header -->

				<div id="menu">
					<?// include "../lib/top_menu2.php"; ?>
				</div>  <!-- end of menu -->

				<div id="content">
					<div id="col1">
						<div id="left_menu">
							<?
		//	include "../lib/left_menu.php";
							?>
						</div>
					</div>
					<div id="col2">
<!--
		<div id="title">
			<<img src="../img/title_greet.gif">
		</div>
	-->
	<form  name="board_form" method="post" action="list.php?mode=search">
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<p>Select
				<select name="find">
					<option value='subject'>제목</option>
					<option value='content'>내용</option>
					<option value='name'>이름</option>
				</select>
				<input type="text" name="search">
				<input type="submit" value="검색">
			</p></div>
		</form>

		<div class="clear"></div>

		<table border=1>	<!-- Table Start -->
			<tr align="center">
				<td>번호</td>
				<td>제목</td>
				<td>글쓴이</td>
				<td>등록일</td>
				<td>조회</td>
			</tr>

			<div id="list_content">
				<?
				for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
				{
				mysql_data_seek($result, $i);       // 가져올 레코드로 위치(포인터) 이동
				$row = mysql_fetch_array($result);	      // 하나의 레코드 가져오기

				$item_num     = $row[num];
				$item_id      = $row[id];
				$item_name    = $row[name];
				$item_hit     = $row[hit];

				$item_date    = $row[regist_day];
				$item_date = substr($item_date, 0, 10);

				$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

				?>
				<div id="list_item">
					<tr align="center">
						<td><div id="list_item1"><?= $number ?></div></td>
						<td><div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div></td>
						<td><div id="list_item3"><?= $item_name ?></div></td>
						<td><div id="list_item4"><?= $item_date ?></div></td>
						<td><div id="list_item5"><?= $item_hit ?></div></td>
					</tr>
				</div>
				<?
				$number--;
			}
			?>
		</table>	<!-- Table end -->

			<div id="page_button">
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
			echo "<a href='list.php?page=$i'> $i </a>";
		}
	}
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
</div>
<div id="button">
	<a href="list.php?page=<?=$page?>"><button>목록</button></a>&nbsp;
	<?
	if($userid)
	{
		?>
		<a href="write_form.php"><button>글쓰기</button></a>
		<?
	}
	?>
</div>
</div> <!-- end of page_button -->

</div> <!-- end of list content -->

<div class="clear"></div>

</div> <!-- end of col2 -->
</div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
