<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang = "ja">
	<head>
		<title>住所録修正</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<p>
		<?php
			extract($_POST);
			extract($_GET);

			$link = mysqli_connect('localhost', 'root', '', 'lesson');
			if(isset($_POST['nam'])) {
				$sqli = "update jushoroku set
					torokubi = '$tou',
					name = '$nam',
					yubin1 = '$yu1',
					yubin2 = '$yu2',
					jusho1 = '$ju1',
					jusho2 = '$ju2',
					keitai = '$kei',
					denwa = '$tel',
					fax = '$fax',
					meruado = '$mal',
					biko = '$bik'
					where renban = '$ren'";
				if (mysqli_query($link, $sqli)) {
					echo "レコードの修正が完了しました.";
				} else {
					echo "レコードの修正に失敗しました.";
				}
				echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
				mysqli_close($link);
				exit;
			}
			$sqli  = "select * from jushoroku where renban = '$id'";
			$result = mysqli_query($link, $sqli)){
			$rows = mysqli_num_rows($result);
			if($rows==0) {
				echo "<p>該当データがありません</p>";
			} else {
				while($row=mysqli_fetch_array($result)){
					echo "<p>データを修正してください.</p>";
					echo "<form action = \"j_shusei1.php\" method=\"post\">";
					echo "<p>連番:";
					echo $row["renban"];
					echo "</p>";

					echo "<p>登録日:";
					echo $row["torokubi"];
					echo "</p>";

					echo "<p>氏名:<input type=\"text\" name=\"nam\" value=\"";
					echo $row["name"];
					echo "\" size=\"40\"></p>";

					echo "<p>郵便番号:<input type=\"text\" name=\"yu1\" value=\"";
					echo $row["yubin1"];
					echo "\" size=\"5\">-<input type=\"text\" name=\"yu2\" value=\"";
					echo $row["yubin2"];
					echo "\" size=\"8\"></p>";

					echo "<p>住所1:<input type=\"text\" name=\"ju1\" value=\"";
					echo $row["jusho1"];
					echo "\" size=\"50\"></p>";

					echo "<p>住所2:<input type=\"text\" name=\"ju2\" value=\"";
					echo $row["jusho2"];
					echo "\" size=\"50\"></p>";

					echo "<p>TEL:<input type=\"text\" name=\"tel\" value=\"";
					echo $row["denwa"];
					echo "\" size=\"20\"></p>";

					echo "<p>FAX:<input type=\"text\" name=\"fax\" value=\"";
					echo $row["fax"];
					echo "\" size=\"20\"></p>";

					echo "<p>ケータイ:<input type=\"text\" name=\"kei\" value=\"";
					echo $row["keitai"];
					echo "\" size=\"25\"></p>";

					echo "<p>MAIL:<input type=\"text\" name=\"mal\" value=\"";
					echo $row["meruado"];
					echo "\" size=\"25\"></p>";

					echo "<p>備考:<textarea name=\"bik\" rows=\"10\" cols=\"50\">";
					echo $row["biko"];
					echo "</textarea></p>";

					echo "<input type=\"hidden\" name=\"tou\" value=\"";
					echo $row["torokubi"];
					echo "\">";
					echo "<input type=\"hidden\" name=\"ren\" value=\"";
					echo $row["renban"];
					echo "\">";

					echo "<p><input type=\"submit\" value=\"修正\">";
					echo "<input type=\"reset\" value=\"リセット\"></p>";
					echo "</form>";

					echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
				}
			}
		?>
		</p>
	</body>
</html>
