<html>
<head>
<meta charset="UTF-8">
</head>
<body>
リンクの名前変更<br />
	$('.sub_navigation > li:eq(1) a').text('佐々木研');
<br /><br />
リンクの張替え<br />
　　　$('.sub_navigation > li:eq(1) a').attr('href','https://www.facebook.com/IPU.IS.Lab?fref=ts');
<br /><br />
文字のつけたし<br />
	var li = $($('&ltli /&gt').text('おはよ').css('color','red');$('.sub_navigation > li:eq(2)').after(li);
<br /><br />
</body>
</html>