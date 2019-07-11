<?php
//もしtestFileが名前がないなら

$testFile = "chat.log";

/*mode0の時*/
if($_GET['mode'] == "0"){
$user = htmlspecialchars($_GET['user'], ENT_QUOTES, "utf-8");
$message = htmlspecialchars($_GET['message'], ENT_QUOTES, "utf-8");
$inputValue = "<div class='user'>".$user."</div><div class='left_balloon'>".$message."</div>";
// ファイルにデータを書き込み
if($inputValue){
	// ファイルをオープンできたか
	if(!$fp = fopen($testFile, "a")){
		echo "could not open";
		exit;
	}
	// 書き込みできたか
	if(fwrite($fp, $inputValue) === false) {
		echo "could not write";
		exit;
	}
	// 終了処理
	fclose($fp);
} else {
	echo "not writable";
	exit;
}
$outputValue = file_get_contents($testFile);
echo $outputValue;
}else if($_GET['mode'] =="3"){
	$delete = "";
		if(!$fp = fopen($testFile, "w")){
			exit;
		}
		// 書き込みできたか
		if(fwrite($fp, $delete) === false) {
			exit;
		}
		// 終了処理
		fclose($fp);
}else{
	$outputValue = file_get_contents($testFile);
	echo $outputValue;
}
