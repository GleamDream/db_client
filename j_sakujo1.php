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
			/*if(mysqli_connect_errno()){
				echo "<p>Failure connect to lesson<p>";
				exit();
			} else {
				echo "Success connect to lesson";
			}*/
			$sqli  = "delete from jushoroku where renban = '$id'";
			if($result = mysqli_query($link, $sqli)){
				/*echo "<p>Success delete query</p>";*/
			} else {
				/*echo "<p>Failure delete query</p>";*/
			}
			mysqli_close($link);
		?>
		</p>
	</body>
</html>
