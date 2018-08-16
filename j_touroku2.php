<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang = "ja">
	<head>
		<title>住所録登録</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<p>
		<?php
			extract($_POST);
			$link = mysqli_connect('localhost', 'root', '', 'lesson');
			$today = date("y-m-d");
			$sqli  = "insert into jushoroku(name, yubin1, yubin2, jusho1, jusho2, denwa, fax, keitai, meruado, biko, torokubi) values('$nam', '$yu1', '$yu2', '$ju1', '$ju2', '$tel', '$fax', '$kei', '$mal', '$bik', '$today')";
			if(mysqli_query($link, $sqli)){
				echo "<p>'$nam'様の住所録登録完了しました.</p>";
			} else {
				echo "<p>住所録登録失敗しました.</p>";
			}
			echo "<p><a href=\"j_touroku1.html\">新規登録</a>	<a href=\"j_specification.html\">HPへ戻る</a></p>";
			mysqli_close($link);
		?>
		</p>
	</body>
</html>
