<?php
	class User extends Model{
		public $name = 'User';
        public $validate = array(
			'name' => array(
				'isuni' =>  array(
					'rule' => 'isUnique',
					'required' => true,
					'alloEmpty' => false,
					'message' => 'そのユーザ名はすでに使われています'
					),
				'hankaku' => array(//半角英字のみ
					'rule' => array('custom', '/^[a-zA-Z]+$/'),
					'message' => '半角英字で入力してください'
					)

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