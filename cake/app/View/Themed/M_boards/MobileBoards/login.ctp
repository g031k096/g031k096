<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title></title>   
</head>
<body>
  <div class="hero-unit">
    <?php
      echo $this->Session->flash('Auth');
      echo $this->Form->create('User', array('url' => 'login'));
      echo $this->Form->input('User.name');
      echo $this->Form->input('User.password');
      echo $this->Form->end('ログイン');
      echo $this->Form->create('TwLogins', array('action'=>'twitter_login'));
        echo $this->Form->end(__('Twitter で Login'));
        echo $this->Form->create('Fbconnects', array('action'=>'facebook'));
        echo $this->Form->end(__('Facebook で Login'));
      echo $this->Html->tag('br');
      echo $this->Html->tag('br');
      
    ?>
    <a href="useradd" id="switch" class="label btn-primary">新規登録</a>
  </div>
</body>
</html>
