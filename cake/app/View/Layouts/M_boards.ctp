<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('board');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<meta name="viewport" content="width=device-width,minimum-scale=1">
 	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
 	<script src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
 	<script type="text/javascript">
	 	/* ajaxを無効にするための設定　*/
	 	$(document).bind("mobileinit",function(){
	 	$.mobile.ajaxEnabled=false;
	 	$.mobile.pushStateEnabled=false;
	 	});
 	</script>
 	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>

 	<script type="text/javascript">
		if (window.location.hash == '#_=_')window.location.hash = '';
	</script>
</head>

<body>
	<div data-role="page" data-theme="e">
		 <div data-role="header" data-theme="b">
		 	<h1>第11回　基礎課題</h1>
		 </div><!-- /header -->

		 <div data-role="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		 </div><!-- /content -->

		 <div data-role="footer" data-theme="b">
		 	<h4>by Shizune Takahashi</h4>
		 </div><!-- /footer -->

	</div><!-- /page -->
</body>
</html>
