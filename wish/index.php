<?php
	   header('content-type:text/html;charset=utf-8'); 
	   //连接打开数据库  SQL语句 

	   $link=mysqli_connect('127.0.0.1','root','root','wishwall') or exit('连接失败');
	   $sql="select *from wish where is_pass=2";
	   $res=mysqli_query($link,$sql);
	   while($arr=mysqli_fetch_assoc($res)){
		   $data[]=$arr;
	   }
	  //print_r($data);exit;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<!--列表展示所有愿望-->
	<div id='main'>
	<?php foreach($data as $k=>$v){?>
		<dl class='paper a1'>
			<dt>
				<span class='username'><?php echo $v['username']?></span>
				<span class='num'>No.0000<?php echo $v['id']?></span>
			</dt>
			<dd class='content'>
			 <?php if($v['id']==8){ ?>
			 <?php echo <img src="$v['content']" width="50" height='80'>?>
			 <?php }else{ ?>
				 <?php echo $v['content']?>
			 <?php }?>
			
			</dd>
			<dd class='bottom'>
				<span class='time'><?php echo date('Y-m-d H:i:s',$v['add_time']);?></span>
			</dd>
		</dl>
		<?php }?>
		</div>


	<!--发布愿望-->
	<div id='send-form'>
		<p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
		<form action="add.php" method="post" name='wish'>
			<p>
				<label for="username">昵称：</label>
				<input type="text" name='username' id='username'/>
			</p>
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
				<textarea name="content" id='content'></textarea>
			</p>
		
			<input type="submit" id='send-btn' value='' />
		</form>
	</div>
</body>
</html>