<?php
	echo '投稿内容';
	echo $this->Form->create('Input', array(
		'type' => 'post',
		'url' => 'index'
	)) ;//フォーム開始

	echo $this->Form->text('Input.comment');//テキストボックス


	echo $this->Form->submit('投稿');//送信ボタン
	echo $this->Form->end();//フォーム終了
?>
