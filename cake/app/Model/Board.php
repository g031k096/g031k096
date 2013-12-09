<?php
	class Board extends Model{
		public $name = 'Board';
		public $useTable = 'boards';
        public $belongsTo = array(
        			'User' => array(
        				'classname' => 'User' ,
        				'foreignKey' => 'user_id'
        				),
        		);
	}
?>