<?php
class SignUpsController extends AppController{
	public $name = "SignUp";//クラス名指定
	public $components = array('DebugKit.Toolbar');//Debugkitの適用

	public function sign_up(){
	}

	public function conf(){
		if(isset($this->request->data))//ポスト送信されたら
			$info=$this->SignUp->judge($this->request->data);
		$this->set('info', $info);//ビューに値を受け渡す
	}
}
?>
