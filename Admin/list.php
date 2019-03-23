<?php
	  header('content-type:text/html;charset=utf-8');
	  //4.当前页
	  $cur_page=empty($_GET['p'])?1:$_GET['p'];
	  $cur_page2=empty($_POST['cur_page2'])?:$_POST['cur_page2'];
	 // echo $cur_page;
	  //2.设置每页显示条数
	  $num=3;
	  //3.偏移量   起始位置或者开始显示条目数 （当前页数-1）*每页条目数
	  $start=($cur_page-1)*$num;

	  //1、查询每页展示条目数
	  $link=mysqli_connect('127.0.0.1','root','root','wishwall') or exit('连接失败');
	  $sql="select *from wish limit $start,$num";
	  $res=mysqli_query($link,$sql);
	  while($arr=mysqli_fetch_assoc($res)){
		  $data[]=$arr;
	  }
	  //print_r($data);


	  //查询数据库中总条目数
	  $sql2="select count(*) as count from wish";
	  $res2=mysqli_query($link,$sql2);
	  $arr2=mysqli_fetch_assoc($res2);
	  $limit_total=$arr2['count'];

	  //所需页数
	  $page=ceil($limit_total/$num);
	  //echo $page;exit;

	 /*  //2.
	  
	  $link=mysqli_connect('127.0.0.1','root','root','all') or exit('连接失败');
	  $sql="select *from wish";
	  $res=mysqli_query($link,$sql);
	  while($arr=mysqli_fetch_assoc($res)){
		  $data[]=$arr;
	  } */
	  //	print_r($data);
?>	  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>愿望列表</title>
	<script type="text/javascript" src="./Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./Js/index.js"></script>
	<link rel="stylesheet" href="./Css/public.css" />
	<link rel="stylesheet" href="./Css/index.css" />	

</head>
<body>

<div  id="main">
<table width="90%" border="0" cellspacing="0" cellpadding="0" class="news_table">
  <caption>
    愿望列表
  </caption>
  		<tr>
			<td>编号</td>
			<td>昵称</td>
			<td>愿望内容</td>
			<td>许愿时间</td>
			<td>执行</td>
			<td>操作</td>
		</tr>
 <?php foreach($data as $k=>$v){?>
		<tr>
				<td>No.0000<?php echo $v['id']?></td>

				<td><?php echo $v['username']?></td>
				<td><?php echo $v['content']?></td>
				<td><?php echo date('Y-m-d H:i:s',$v['add_time'])?></td>
				<td><?php  if($v['is_pass']==1){
					echo '未审核';
				}else if($v['is_pass']==2){
					echo '已通过';
				}else{
					echo '驳回';
				}?>
				</td>
				<td>
				 <?php  if($v['is_pass']==1){?>
					<a href="up.php?id=<?php echo $v['id']?>">通过</a>
					<a href="upbo.php?id=<?php echo $v['id']?>">驳回</a>
				 <?php  }?>
					
				    <a href="dele.php?id=<?php echo $v['id']?>">删除</a>
				</td>
			</tr>
 <?php }?>
</table>
</div>	
</body>
</html>
<div>
<a href="list.php?p=1">首页</a>
<a href="list.php?p=<?php echo ($cur_page-1)<1?1:$cur_page-1 ?>">上一页</a>
<?php for($i=1;$i<=$page;$i++){?>
	 <a href="list.php?p=<?php echo $i?>"><?php echo $i?></a>
<?php }?>
<a href="list.php?p=<?php echo ($cur_page+1)>$page?$page:$cur_page+1 ?>">下一页</a>
<a href="list.php?p=<?php echo $page?>">尾页</a>


<!-- 输入数字转页 -->
<form action="list.php" method="post">
 转到<input type="text" size=1 name="cur_page2">页 <input type="submit" value="页数">
 
</form>
<a href="list.php?p=<?php echo $cur_page2?>"><input type="submit" value="GO"></a>
 
</div>

