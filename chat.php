<?php
if(!isset($_COOKIE['username'])){
header("Location: main.html");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHAT</title>
  <link rel="stylesheet" href="css/chat.css">
</head>
<body>
  <header id="header">
    <h1>CHAT</h1>
  </header>
  <div id="container">
    <div id="talkField">
      <div id="result"></div>
      <br class="clear_balloon" />
      <div id="end"></div>
    </div>
    <div id="inputField">
      <p>
        ニックネーム: <input type="text" name="user" id="user" value="<?php echo $_COOKIE['username'];?>"><br>
        メッセージ: <input type="text" name="message" id="message" required><br>
        <input type="button" id="greet" value="送信">
      </p>
    </div>
  </div>

  <!--履歴削除ボタン-->
  <form action="chat.php" method="post" id ="form">
    <!--タクシーの電話番号-->
    <a href="tel:0138-46-1100">道南ハイヤー</a>
    <p><button type="submit" name="delete" id="delete">削除</button> ※集合し終わったら押してください。</p>
  </form>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/chat.js"></script>
</body>
</html>
