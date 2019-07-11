<?php
require_once ("test_check.php");
$name = $_COOKIE["username"];
if($name ==""){
  header("Location: main.html");
}

$dsn = 'mysql:dbname=test;host=localhost;charset=utf8';
$user= 'rootmasa';
$password = 'password';

$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM users";
$stmt = $dbh->query($sql);
foreach ($stmt as $row) {
  if(($row['state'] != 0)&&($row['name'] == $name)){
    header("Location: chat.php");
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>SEARCH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60" >
    <link rel="stylesheet" href="css/leaflet.css" />
    <link rel="stylesheet" href="css/search.css">
    <script src="js/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <header id="header">
      <h1>SEARCH</h1>
    </header>
    <?php
    echo $name."さんこんにちは";
?>
<!--Map表示-->
<h2>MAP</h2>
<div id="map"></div>
<script src="js/map.js"></script>
<!-- <footer>TAXIDASHBUTTON DEMO</footer> -->
</body>
</html>
