<?php
	class User extends Model{
		public $name = 'User';
        public $validate = array(
			'name' => array(
				'rule' =>  array('custom', '/^[a-zA-Z]{1,10}+$/'),//半角英字のみ
				'rule' => 'isUnique',
				'required' => true,
				'alloEmpty' => false,
				'message' => '半角英字１０字以内で入力してください.そのユーザ名はすでに使われています'
			),
			'email' => array(
				'rule' => 'email',
				'required' => true,
				'alloEmpty' => false,
				'message' => 'メールアドレスの形式で必ず入力して下さい'
			),
			'password' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'alloEmpty' => false,
				'message' => '必ず入力して下さい'
			)
		);
    }
?>