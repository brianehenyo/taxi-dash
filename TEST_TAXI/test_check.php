<?php
class  Curry{
	private $id;
	private $name;
	private $lat;
	private $lng;
	private $state;

	// コンストラクタ
	public function __construct($id, $name, $lat, $lng, $state) {
		$this->id = $id;
		$this->name = $name;
		$this->lat = $lat;
		$this->lng = $lng;
		$this->state = $state;
	}

	// プロパティのデータを表示するメソッド
	public function printData() {
		echo "<tr>";
		echo "<td>". $this->id. "</td>";
		echo "<td>". $this->name. "</td>";
		echo "<td>". $this->lat. "</td>";
		echo "<td>". $this->lng. "</td>";
		echo "<td>". $this->state. "</td>";
		echo "</tr>";
	}
}
?>
