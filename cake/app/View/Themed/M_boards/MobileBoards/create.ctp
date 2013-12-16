<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title></title>
  
  
  
  <link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="codiqa.ext.css">
  
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>
  <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

  <!-- Extra Codiqa features -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/codiqa.ext.js"></script>
   
</head>
<body>
<?php
	if (empty($this->params->data['Board']['comment'])) {
		echo '投稿内容';
		echo $this->Form->create() ;//フォーム開始
		
		echo $this->Form->text('comment');//テキストボックス

		echo $this->Form->submit('投稿');//送信ボタン
		echo $this->Form->end();//フォーム終了
	}else{
		echo $this->Form->create(array(
			'action' => 'creatable'
		)) ;//フォーム開始
		echo $this->Form->hidden("comment", array("value" => $com["Board"]["comment"]));
		echo $this->Html->tag('h2',$com["Board"]["comment"]);
		echo $this->Html->tag('br');
		echo'この内容で投稿してもいいですか？';
		echo $this->Form->submit('送信');//送信ボタン
		echo $this->Form->end();//フォーム終了
	}
?>
</body>
</html>
