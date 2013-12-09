<?php
	class TwLoginsController extends AppController {
		public $name = 'TwLogins';
		//public $layout = "bootstrap"; //board.ctp レイアウトを利用
		public $uses = array('NewUser'); //Userモデルを追加
		/****認証周り*****/
		public $components = array(
			'DebugKit.Toolbar', //デバッグキット
			'TwitterKit.Twitter', //twitter
			'Auth' => array( //ログイン機能を利用する
				'authenticate' => array(
					'Form' => array(
						'userModel' => 'User'
					)
				),
				//ログイン後の移動先
				'loginRedirect' => array('controller' => 'boards', 'action' => 'index'),
				//ログアウト後の移動先
				'logoutRedirect' => array('controller' => 'boards', 'action' => 'logout'),
				//ログインページのパス
				'loginAction' => array('controller' => 'tw_logins', 'action' => 'login'),
				//未ログイン時のメッセージ
				'authError' => 'あなたのお名前とパスワードを入力して下さい。',
			)
		);

		public function beforeFilter(){//login処理の設定
		 	$this->Auth->allow('twitter_login', 'login', 'oauth_callback');
		 	$this->set('user',$this->Auth->user('NewUser')); // ctpで$userを使えるようにする 。
		}

		public function twitter_login(){//twitterのOAuth用ログインURLにリダイレクト
        	$this->redirect($this->Twitter->getAuthenticateUrl(null, true));
    	}

    	//ログインアクション
		public function login(){}

		public function logout(){
			$this->Auth->logout();
			$this->Session->destroy(); //セッションを完全削除
			$this->Session->setFlash(__('ログアウトしました'));
			$this->redirect(array('action' => 'login'));
		}

		function oauth_callback() {
	        if(!$this->Twitter->isRequested()){//認証が実施されずにリダイレクト先から遷移してきた場合の処理
	            $this->flash(__('invalid access.'), '/', 5);
	            return;
	        }
	        $this->Twitter->setTwitterSource('twitter');//アクセストークンの取得を実施
	        $token = $this->Twitter->getAccessToken();
	        $data['User'] = $this->NewUser->signin($token); //ユーザ登録
	        $data = $this->NewUser->find('first', array('conditions' => array("name" => $data['User']['name']), "password" => $data['User']['password']));
	        $this->Auth->login($data['NewUser']); //CakePHPのAuthログイン処理
	        $this->redirect($this->Auth->loginRedirect); //ログイン後画面へリダイレクト
    	}

    	function index(){}
    }