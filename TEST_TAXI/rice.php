<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["name"] )) {
}else{
	$name = $_POST['name'];
	// $lat = $_POST['lat'];
	// $lng = $_POST['lng'];
	// データベースへ接続
	$dsn = "mysql:dbname=test;host=localhost;port=3306;charset=utf8";
	$user = "rootmasa";
	$password = "password";

	$dbh = new PDO ( $dsn, $user, $password );

	// SQL（更新）の実行
	$sql_s = "SELECT * FROM user WHERE name=" . $name;
  $stmt = $dbh->prepare ( $sql_s);
	$record = $stmt->fetch ( PDO::FETCH_ASSOC );

	// $name = $record ["name"];
	$lat = $record ["lat"];
	$lng = $record ["lng"];
	$state = $record["state"];
	// データベースの切断
	$dbInfo = null;
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>RICE</title>
  </head>
  <body>
		<form action="curry_rice.php" method="post">
			<tr>
				<?php
				echo "<input name='name' value='" . $name . "'>";
				?>
				<td><input type="text" name="lat" value="<?php echo $lat; ?>"></td>
				<td><input type="text" name="lng" value="<?php echo $lng; ?>"></td>
				<td><input type="text" name="state" value="<?php echo $state; ?>"></td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: right">
					<input type="submit" value="更新する">
				</td>
			</tr>
		</form>
	</body>
</html>
