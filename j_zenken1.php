<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang = "ja">
	<head>
		<title>住所録全件表示</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<p>
		<?php
			extract($_POST);
			echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
			$link = mysqli_connect('localhost', 'root', '', 'lesson');
			$today = date("y-m-d");
			$sqli  = "select * from jushoroku";
			if($result = mysqli_query($link, $sqli)){
				echo "<p>全件取得完了しました.</p>";
			} else {
				echo "<p>全件取得に失敗しました.</p>";
			}
			$rows = mysqli_num_rows($result);
			if($rows==0) {
				echo "<p>該当データがありません</p>";
			}
			else {
				while($row=mysqli_fetch_array($result)){
					echo "<p>";
					echo $row["renban"];
					echo " ";
					echo "<p>";
					echo $row["torokubi"];
					echo "<br />";
					echo "<p>";
					echo $row["name"];
					echo " ";
					echo $row["yubin1"];
					echo "-";
					echo $row["yubin2"];
					echo " ";
					echo $row["jusho1"];
					echo $row["jusho2"];
					echo "<br />TEL ";
					echo $row["denwa"];
					echo " FAX ";
					echo $row["fax"];
					echo " CELL ";
					echo $row["keitai"];
					echo " MAIL ";
					echo $row["meruado"];
					echo "<br />";
					echo $row["biko"];
					echo "</p><hr />";
				}
			}
			mysqli_close($link);
		?>
		</p>
	</body>
</html>
