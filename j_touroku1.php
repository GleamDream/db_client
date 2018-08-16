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
			extract($_GET);

			$jusho1 = "";
			$jusho2 = "";
			$redirect = "";
			
			if (isset($_POST['reflect'])) {
				$option = array(
					'http' => array(
						'proxy' => 'tcp://cproxy.okinawa-ct.ac.jp:8080',
						'request_fulluri' => true
					),
				);
				$proxy = stream_context_create($option);
				$response = file_get_contents(
					"http://zipcloud.ibsnet.co.jp/api/search?zipcode=".$_POST['yu1'].$_POST['yu2'],
					false,
					$proxy
				);
				$result = json_decode($response, true);
				$address = $result["results"][0];
				$jusho1 = $address["address1"].$address["address2"];
				$jusho2 = $address["address3"];
				echo "<p>郵便番号を反映しました</p>";
			} else if (isset($_POST['submit'])){
				$link = mysqli_connect('localhost', 'root', '', 'lesson');
				$today = date("y-m-d");
				$sqli = "insert into jushoroku(name, yubin1, yubin2, jusho1, jusho2, denwa, fax, keitai, meruado, biko, torokubi)
							values('$nam', '$yu1', '$yu2', '$ju1', '$ju2', '$tel', '$fax', '$kei', '$mal', '$bik', '$today')";
				if (mysqli_query($link, $sqli)) {
					echo "<p>'$nam'様の住所登録が完了しました</p>";
				} else {
					echo "<p>住所登録に失敗しました</p>";
				}
				echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
				exit();
			}

			echo "<p>データを入力してください.</p>";
			echo "<form action = \"j_touroku1.php\" method=\"post\">";

			echo "<p>氏名:<input type=\"text\" name=\"nam\" value=\"";
			if (isset($_POST['nam'])) {
				echo $_POST["nam"];
			}
			echo "\" size=\"40\"></p>";

			echo "<p>郵便番号:<input type=\"text\" name=\"yu1\" value=\"";
			if (isset($_POST['yu1'])) {
				echo $_POST["yu1"];
			}
			echo "\" size=\"5\">-<input type=\"text\" name=\"yu2\" value=\"";
			if (isset($_POST['yu2'])) {
				echo $_POST["yu2"];
			}
			echo "\" size=\"8\"> <input type=\"submit\" name=\"reflect\" value=\"郵便番号を反映する\"> </p>";

			echo "<p>住所1:<input type=\"text\" name=\"ju1\" value=\"";
			if (isset($_POST['reflect'])) {
				echo $jusho1;
			}
			echo "\" size=\"50\"></p>";

			echo "<p>住所2:<input type=\"text\" name=\"ju2\" value=\"";
			if (isset($_POST['reflect'])) {
				echo $jusho2;
			}
			echo "\" size=\"50\"></p>";

			echo "<p>TEL:<input type=\"text\" name=\"tel\" value=\"";
			if (isset($_POST['tel'])) {
				echo $_POST["tel"];
			}
			echo "\" size=\"20\"></p>";

			echo "<p>FAX:<input type=\"text\" name=\"fax\" value=\"";
			if (isset($_POST['fax'])) {
				echo $_POST["fax"];
			}
			echo "\" size=\"20\"></p>";

			echo "<p>ケータイ:<input type=\"text\" name=\"kei\" value=\"";
			if (isset($_POST['kei'])) {
				echo $_POST['kei'];
			}
			echo "\" size=\"25\"></p>";

			echo "<p>MAIL:<input type=\"text\" name=\"mal\" value=\"";
			if (isset($_POST['mal'])) {
				echo $_POST['mal'];
			}
			echo "\" size=\"25\"></p>";

			echo "<p>備考:<textarea name=\"bik\" rows=\"10\" cols=\"50\">";
			if (isset($_POST['bik'])) {
				echo $_POST["bik"];
			}
			echo "</textarea></p>";

			echo "<input type=\"hidden\" name=\"tou\" value=\"";
			echo $row["torokubi"];
			echo "\">";
			echo "<input type=\"hidden\" name=\"ren\" value=\"";
			echo $row["renban"];
			echo "\">";

			echo "<p><input type=\"submit\" name=\"submit\" value=\"登録\">";
			echo "<input type=\"reset\" value=\"リセット\"></p>";
			echo "</form>";

			echo "<p><a href=\"j_specification.html\">ホームページへ戻る</a></p>";
		?>
		</p>
	</body>
</html>
