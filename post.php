<?php
if(!isset($_POST['myTEXT'])){
  header("Location: main.html");
}else{
  setcookie('username', $_POST['myTEXT'], time() + 3600);
  $name_c = $_COOKIE['username'];
  $name = $_POST['myTEXT'];
  $lat = 0;
  $lng = 0;
  $state = 0;

  $dsn = 'mysql:dbname=test;host=localhost;charset=utf8';
  $user= 'rootmasa';
  $password = 'password';
  
  try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_i = "INSERT INTO users (name, lat, lng, state) VALUES (:name, :lat , :lng, :state)";
    $stmt = $dbh->PREPARE($sql_i);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
    $stmt->bindValue(':lng', $lng, PDO::PARAM_STR);
    $stmt->bindValue(':state', $state, PDO::PARAM_STR);
    $stmt->execute();

}catch (PDOException$e){
  print($e->getMessage());
  die();
}
header("Location: search.php");
}
?>
