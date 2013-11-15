<h2>ユーザ登録フォーム</h2>
<?php
	echo $this->Form->create('Touroku', array(
		'type' => 'post',
		'url' => 'conf'
	)) ;//フォーム開始

	echo '<br />名字<br />';
	echo $this->Form->text('Touroku.l_name');//テキストボックス

	echo '<br />名前<br />';
	echo $this->Form->text('Touroku.f_name');//テキストボックス

	echo '<br />性別<br />';
	echo $this->Form->radio('Touroku.sex',
							 array("0" => '男', "1" => '女'),
							 array('legend' => false, 'label' => true, 'value' => '1'));//初期選択値

	echo '<br />学年<br />';
	echo $this->Form->select('Touroku.grade',
							 array('学部1年', '学部2年', '学部3年', '学部4年'),
							 array('value' => '1'));//初期選択値

	echo '<br />好きなもの<br />';
	echo $this->Form->checkbox('Touroku.like.exe', array('checked' => true, 'value' => '運動'));//チェックボックス
	echo $this->Form->label('Touroku.like.運動');//ラベル
	echo $this->Form->checkbox('Touroku.like.com', array('checked' => false, 'value' => '漫画'));
	echo $this->Form->label('Touroku.like.漫画');
	echo $this->Form->checkbox('Touroku.like.pro', array('checked' => true, 'value' => 'プログラミング'));
	echo $this->Form->label('Touroku.like.プログラミング');

	echo '<br />コメント<br />';
	echo $this->Form->textarea('Touroku.comment',
								array('cols' => 40, 'rows' => 3));//テキストエリア

	echo '<br />パスワード<br />';
	echo $this->Form->text('Touroku.password',
							array('type' => 'password'));//伏字にする

	echo $this->Form->hidden('Touroku.time',
							 array('value' => date("Y/m/d H:i:s")));//隠しフィールド

	echo $this->Form->submit('送信');//送信ボタン
	echo $this->Form->end();//フォーム終了

?>