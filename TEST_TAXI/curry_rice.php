<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["name"] )) {
	header ( "Location: curry.php" );
}else{
	// 送信データの取得
	$name = $_POST['name'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$state = $_POST['state'];

	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "rootmasa";
	$password = "password";
	$dbh = new PDO ( $dsn, $user, $password );

	// SQL（更新）の実行
	// $sql_u = "UPDATE user SET name=:name, lat=:lat, lng=:lng, state = :state WHERE id=:id";
	$sql_u = "UPDATE user SET lat=:lat, lng=:lng, state = :state WHERE name=:name";
  $stmt = $dbh->prepare ( $sql_u );
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
  $stmt->bindValue(':lng', $lng, PDO::PARAM_STR);
  $stmt->bindParam(':state', $state, PDO::PARAM_INT);
  $stmt->execute ();

	$result = $stmt->rowCount ();
	// データベースの切断
	$dbInfo = null;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>CURRY RICE</title>
</head>
<body>
		<strong>更新結果</strong>
		<strong>
			<?php
			if ($result > 0) {
				echo "<div style='color:#ff0000'>データを更新しました</div>";
			} else {
				echo "<div style='color:#ff0000'>データを更新できませんでした</div>";
			}
			?>
		</strong>
</body>
</html>
