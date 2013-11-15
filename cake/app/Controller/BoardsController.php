<?php
class BoardsController extends AppController {
	public $name = 'Boards';
	public $uses = array('Board');
//	public $components = array('Debugkit.Toolbar');

	public function index(){
//		debug($this->Board->find("all"));
		$this->set('data', $this->Board->find('all'));
	}

	public function edit(){
	}

	public function create(){
	}

}

?>