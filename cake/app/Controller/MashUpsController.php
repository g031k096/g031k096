<?php
class MashUpsController extends AppController{
	public $name = "MashUps";//クラス名指定
	public $uses = array('MashUp');
	public $components = array('DebugKit.Toolbar');//Debugkitの適用

	public function mash_up(){
		$result = $this->MashUp->api();
		$this->set("result",$result);
	}
}
?>