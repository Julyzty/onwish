<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="./Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./Js/index.js"></script>
<link rel="stylesheet" href="./Css/public.css" />
<link rel="stylesheet" href="./Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<!--头部-->
	<div id="top">
		<div class="exit">
			<a href="#" target="_self">退出</a>
		</div>
	</div>

	<!--左侧菜单栏-->
	<div id="left">
		<dl>
			<dt>愿望管理</dt>
			<dd><a href="list.php">愿望列表</a></dd>
		</dl>
	</div>

	<!--右侧默认展示页-->
	<div id="right">
		<iframe name="iframe" src="list.php"></iframe>
	</div>
</body>
</html>