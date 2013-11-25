<?php
	class Board extends Model{
		public $name = 'Board';
		public $useTable = 'boards';

		// var $validate = array(
	 //        'login' => array(
	 //        );
  //   	);

		public function db_connect($com){
			$this->save($com);
		}

		public function del($data){
			$this->delete($data["Board"]["id"]);
		}
	}
?>