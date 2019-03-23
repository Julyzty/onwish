<?php
      header('content-type:text/html;charset=utf-8');
      //接收id值 连接数据库 SQL语句 执行
      $id=$_GET['id'];
       
      $link=mysqli_connect('127.0.0.1','root','root','wishwall') or exit('连接失败');
      $sql="delete from wish where id=$id";
      $res=mysqli_query($link,$sql);
      if($res){
        echo '删除成功';
        header("refresh:2;url='list.php'");
    }else{
        echo '删除失败';
        header("refresh:2;url='list.php'");
    }
?>