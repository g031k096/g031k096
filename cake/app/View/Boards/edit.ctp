<h2>コメント編集画面</h2>
<?php
	echo $this->Form->create('Edit', array(
		'type' => 'post',
		'url' => 'index'
	)) ;//フォーム開始

	echo $this->Form->text('Edit.comment');//テキストボックス


	echo $this->Form->submit('送信');//送信ボタン
	echo $this->Form->end();//フォーム終了
?>
