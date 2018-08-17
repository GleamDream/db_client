<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang = "ja">
	<head>
		<title>住所録検索</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<p>
		<?php
			extract($_POST);
			$name="";
			if (isset($_POST['nam'])) {
				$name=$nam;
			}
			echo "
				<p>検索する氏名の一部を入力する.</p>
				<form action\"j_kensaku1.php\" method=\"post\">
					<p>検索氏名:<input type=\"text\" name=\"nam\"value=\"$name\" size=\"40\"></p>
					<p><input type=\"submit\" value=\"登録\">
					<input type=\"reset\" value=\"リセット\"></p>
				</form>
			";
			if ($name<>'') {
				$link = mysqli_connect('localhost', 'root', '', 'lesson');
				$sqli  = "select * from jushoroku where name like '%$nam%'";
				$result = mysqli_query($link, $sqli);
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
			}
		?>
		</p>
	</body>
</html>
