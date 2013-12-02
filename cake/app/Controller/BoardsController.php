<?php
class BoardsController extends AppController {
	public $name = 'Boards';
	public $uses = array('Board', 'User');
	public $layout = "board_layout";
	public $components = array(
			'DebugKit.Toolbar', //デバッグキット
			'Auth' => array( //ログイン機能を利用する
				'authenticate' => array(
					'Form' => array(
						'userModel' => 'User',
						'fields' => array('username' => 'name','password' => 'password')
					)
				),
				//ログイン後の移動先
				'loginRedirect' => array('controller' => 'boards', 'action' => 'index'),
				//ログアウト後の移動先
				'logoutRedirect' => array('controller' => 'boards', 'action' => 'login'),
				//ログインページのパス
				'loginAction' => array('controller' => 'boards', 'action' => 'login'),
				//未ログイン時のメッセージ
				'authError' => 'あなたのお名前とパスワードを入力して下さい。',
			)
		);

	public function index(){
		if(!empty($this->request->data['Board']['words'])){
			$WORDS = $this->request->data['Board']['words'];
			$NUM = $this->request->data['Board']['num']+1;
			$conditions = array('conditions' => array("Board.comment LIKE" => "%$WORDS%"), 'limit' => $NUM);
			$this->Session->write("conditions", $conditions);
			$this->paginate = $conditions;
			$search = $this->paginate('Board');
			$this->set('data', $search);
		}else{
			//$this->set('data', $this->Board->find('all'));
			if (empty($this->request->params['named']['page'])){
				$this->Session->delete('conditions');
			}
			if (!($this->Session->read('conditions'))){
				$this->set('data', $this->paginate('Board'));
			}else{
				$this->paginate = $this->Session->read('conditions');
				$this->set('data', $this->paginate('Board'));
			}
		}
	}

	public function edit($id){
		if(!empty($this->request->data)){//ポスト送信されたら
			$this->set('edt', $this->request->data);//ビューに値を受け渡す
		}else{
			$this->set("data", $this->Board->findById($id));
		}
	}

	public function del($id){
		$this->Board->delete($id);
		$this->redirect(array("action" => "index"));
	}

	public function create(){
		if(!empty($this->request->data)){//ポスト送信されたら
			$com = $this->request->data;
			$this->set('com', $com);//ビューに値を受け渡す
		}
	}

	public function creatable(){
		$this->request->data['Board']['user_id'] = $this->Auth->user('id');
		$this->Board->save($this->request->data);
		$this->redirect('index');
	}

	public function beforeFilter(){//login処理
		$this->Auth->allow('login', 'logout', 'useradd');//loginしなくてもいいところ
		$this->set('user', $this->Auth->user());//???
	}

	public function login(){
		if($this->request->is('post')){//POST送信したら
			if($this->Auth->login()){//login成功したら
				return $this->redirect($this->Auth->redirect());//loginページへ移動
			}else{
				$this->Session->setFlash(__('ユーザ名もしくはパスワードが違います'), 'default', array(), 'auth');//???
			}
		}
	}

	public function logout(){
		$this->Auth->logout();
		$this->Session->destroy();//sessionをリセット
		$this->Session->setFlash(__('ログアウトしました'));
		$this->redirect(array('action' => 'login'));
	}

    public function useradd(){
        if($this->request->is('post')) {//POST送信なら
	        //パスワードとパスチェックの値をハッシュ値変換
	        $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
	        $this->request->data['User']['pass_check'] = AuthComponent::password($this->request->data['User']['pass_check']);
	        //入力したパスワートとパスワードチェックの値が一致
	        if($this->request->data['User']['pass_check'] === $this->request->data['User']['password']){
	        	$this->User->create();//ユーザーの作成
		    	$mes = ($this->User->save($this->request->data))? '新規ユーザーを追加しました' : '登録できませんでした。やり直して下さい';
		  		$this->Session->setFlash(__($mes));
	            $this->redirect(array('action' => 'login'));//リダイレクト
	        }else{
	            $this->Session->setFlash(__('パスワード確認の値が一致しません．'));
	        }
        }
    }
}
?>