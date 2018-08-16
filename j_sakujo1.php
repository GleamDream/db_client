<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang = "ja">
	<head>
		<title>住所録削除</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<p>
		<?php
			extract($_GET);
			$link = mysqli_connect('localhost', 'root', '', 'lesson');
			$sqli  = "delete from jushoroku where renban = '$id'";
			if(mysqli_query($link, $sqli)){
				echo "<p>削除が完了しました</p>";
			} else {
				echo "<p>削除に失敗しました</p>";
			}
			echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
			mysqli_close($link);
		?>
		</p>
	</body>
</html>
