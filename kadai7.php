<html>
<head>
<meta charset="UTF-8">
</head>
<body>
ページ上部の画像変更<br />
   左側(ロゴ部分)には属性セレクタを使わずに変更<br />
$('.box_left > .logo > a > img').attr('src','http://www.kotaku.jp/photo/120726judopoke.jpg');
<br /><br />
	右側(人物部分)には属性セレクタを使って変更<br />
$('img[src="http://liginc.co.jp/wp-content/themes/lig2013/images/common/header_hiroyuki2.png"]').attr('src','http://blog-imgs-50.fc2.com/s/a/i/saikyoumoyasi/irubetaru.png');
<br /><br />
任意の文章に変更<br />
	$("div.box_left > h1").text("test")
<br /><br />
任意のwebページへのリンクを追加<br />
$('.sitemap_about.sitemap_tile > ul:eq(2) >li > ul').append($("&ltli /&gt").append($("&lta /&gt").attr("href", "https://twitter.com/").text("twitter").css('color','aqua')));
<br /><br />
<img src="k.PNG" >
<img src="k2.PNG">
</body>
</html>