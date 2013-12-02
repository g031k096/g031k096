<?php
	class Board extends Model{
		public $name = 'Board';
		public $useTable = 'boards';
        public $belongsTo = array('User');

	    public function finduser(){
	        $belongsTo = array(
	            'User' => array(
	                'className' => 'User',
	                'foreignKey' => 'user_id'
	            ));
	        $this->bindModel(array("belongsTo" => $belongsTo));
	        $data = $this->find('all');
	        return $data;
	    }





		// public function db_connect($com){
		// 	$this->save($com);
		// }

		// public function del($data){
		// 	$this->delete($data["Board"]["id"]);
		// }
	}
?>