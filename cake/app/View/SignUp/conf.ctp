<?php

	if(empty($this->params->data['button'])){//登録ボタンが押されてなかったら	
		echo "<h2>この情報で登録します。よろしいですか？</h2>";

		echo '名前：'	;
		echo $info['name'];
		echo "<br />";

		echo '性別：'	;
		echo $info['sex'];
		echo '<br />';

		echo '学年：'	;
		echo $info['level'];
		echo '<br />';

		echo '好きなもの：'	;
		if(!empty($info['like'])){
			foreach ($info['like'] as $value) {
				echo $value;
				echo ' ';
			}
		}

		echo '<br />';

		echo 'コメント：';
		echo $info["comment"];
		echo '<br />';

		echo 'パスワード：'	;
		echo $info["password"];
		echo '<br />';

		echo '登録時間：'	;
		echo $info["time"];
		echo '<br />';

		echo $this->Form->create('hoge', array(
			'type' => 'post',
			'url' => 'conf'
		)) ;//フォーム開始

		echo $this->Form->submit('登録', array('name' => 'button'));//登録ボタン
		echo $this->Form->end();//フォーム終了

	}else{//登録ボタンが押されたら

		echo $this->Html->tag('h2', 'ありがとうございました');	
		echo $this->Html->link('入力フォームに戻る', array('controller' => 'SignUps', 'action' => 'sign_up'));
	}
?>