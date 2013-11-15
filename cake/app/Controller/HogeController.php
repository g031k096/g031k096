<?php
class HogeController extends AppController{
	public $name = "Hoge";//クラス名指定
	public $components = array('DebugKit.Toolbar');//Debugkitの適用

	public function index(){
	}

	public function input(){
	}

	public function show(){
		if($this->request->is('POST')){//ポスト送信されたら	
			$jikan = $this->request->data['Aisatsu']['jikan'];
			$mes = $this->Hoge->handan($jikan);
			$this->set('say',$mes);//ビューに値を受け渡す
		}else{//URLで直接アクセスしたら
			$this->flash(
				'inputアクションからきてください',
				array(
					'Controller' => 'hoge',
					'action' => 'input'
					)
				);
			//$this->redirect('input');
		}
	}
}
?>