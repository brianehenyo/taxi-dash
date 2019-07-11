<?php
class  Curry{
	private $id;
	private $name;
	private $lat;
	private $lng;
	private $state;

	public function __construct($id, $name, $lat, $lng, $state) {
		$this->id = $id;
		$this->name = $name;
		$this->lat = $lat;
		$this->lng = $lng;
		$this->state = $state;
	}

//マッチングしたリストを表示させる関数
	public function printData() {
		echo $this->id.", ";
		echo $this->name. ", ";
		echo $this->lat. ", ";
		echo $this->lng. ", ";
		echo $this->state."\n";
	}
}
?>
