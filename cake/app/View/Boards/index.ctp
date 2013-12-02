<?php
		
	debug($data);
	echo $this->Form->create();
	echo '検索ワード';
	echo $this->Form->text('words');
	echo $this->Html->tag('br');
	echo '検索件数';
	echo $this->Form->text('num');
	echo $this->Form->submit('検索', array('name' => 'kensaku'));
	echo $this->Html->tag('br');
	echo $this->Form->end();

	echo $this->Form->create();
	echo 'ソート';
	echo $this->Form->submit('昇順');
	echo $this->Form->submit('降順');
	echo $this->Html->tag('br');
	echo $this->Form->end();	

	echo $this->Html->link('投稿する', array('controller' => 'Boards', 'action' => 'create'));
	echo $this->Html->tag('br');

	foreach ($data as $key => $value) {
		if(!empty($value["Board"]["comment"])){
			echo $value["Board"]["id"].' ';
			echo $value["Board"]["comment"].' ';
			echo $value["User"]["email"].' ';
			echo $value["Board"]["created"].' ';
			if($user["id"] === $value['Board']['user_id']){
				echo $this->Html->link('編集', array(
						'action' => 'edit', 
						$value["Board"]["id"]
					)).' ';
				echo $this->Html->link('削除', array(
						'action' => 'del', 
						$value["Board"]["id"]
					));
			}
			echo $this->Html->tag('br');
		}
	}

	echo $this->Html->link('ログアウト', array('action' => 'logout'));
?>