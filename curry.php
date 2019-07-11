<?php
require_once ("test_check.php");
if(!isset($_POST["lat"]) && ($_POST["lng"])){

}else{
  $name_D = $_COOKIE['username'];
  $name = $name_D;
  $lat = (float)$_POST['lat'];
  $lng = (float)$_POST['lng'];
  //４点間の平均からの±経緯度
  $lat_1 = $lat - 0.000343;
  $lat_2 = $lat + 0.000343;
  $lng_1 = $lng - 0.0003098;
  $lng_2 = $lng + 0.0003098;
  $count = 0;
  $dsn = 'mysql:dbname=test;host=localhost;charset=utf8';
  $user= 'rootmasa';
  $password = 'password';

  try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_u = "UPDATE users SET lat=:lat, lng=:lng WHERE name=:name";
    $stmt = $dbh->prepare ( $sql_u );
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
    $stmt->bindValue(':lng', $lng, PDO::PARAM_STR);
    $stmt->execute ();

    //ユーザーの位置情報 ± ◯◯ 間にデータベースにあるならば
    // $sql_sb = "SELECT * FROM users WHERE lat BETWEEN $lat_1 and $lat_2 and lng BETWEEN $lng_1 and $lng_2";
    $list = new ArrayObject ();
    foreach ( $dbh->query ( $sql_sb ) as $record ) {
      $id = $record ["id"];
      $name = $record ["name"];
      $lat = $record["lat"];
      $lng = $record["lng"];
      $state = $record["state"];
      $value = new Curry ($id, $name, $lat, $lng, $state);
      $list->append ( $value );
      //countidにid足していく
      $countid = $countid.$id;
      echo $countid." id合計です。\n";
      $state = $countid;
      // 配列に追加

    }
    foreach ( $list as $select) {
      $select->printData ();
      $count++;
    }
    //countが4以上なら
    if($count>=4){
      echo "マッチング\n";
      $sql_us = "UPDATE users SET state = :state WHERE name = :name";
      $stmt = $dbh->prepare ( $sql_us );
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':state', $state, PDO::PARAM_STR);
      $stmt->execute ();
      echo "マッチング終了\n";

    }else{
      echo "マッチング準備中\n";
      $state = 0;
      $sql_us = "UPDATE users SET state = :state WHERE name=:name";
      $stmt = $dbh->prepare ( $sql_us );
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':state', $state, PDO::PARAM_STR);
      $stmt->execute ();
    }
  }catch (PDOException$e){
    print($e->getMessage());
    die();
  }
}
?>
