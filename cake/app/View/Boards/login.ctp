<div class="hero-unit">
	<?php
		echo $this->Session->flash('Auth');
		echo $this->Form->create('User', array('url' => 'login'));
		echo $this->Form->input('User.name', array('label' => 'ユーザー名'));
		echo $this->Form->input('User.password', array('label' => 'パスワード'));
		echo $this->Form->end('ログイン');
	?>
	<a href="useradd" id="switch" class="label btn-primary">新規登録</a>
</div>