<?php
	
	
	//echo $this->Html->link('投稿する' array('controller' => 'Boards', 'action' => 'create'));

	foreach ($data as $key => $value) {
		echo $key."<br/>";
		echo $value["Board"]["id"];
	}


?>