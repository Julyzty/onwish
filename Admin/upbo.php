<?php
     //接收id值 连接数据库 SQL语句 执行
     header('content-type:text/html;charset=utf-8');
     $id=$_GET['id'];
       
     $link=mysqli_connect('127.0.0.1','root','root','all') or exit('连接失败');
     $sql="update wish set is_pass=3 where id=$id";
     $res=mysqli_query($link,$sql);
     if($res){
        echo '驳回成功';
        header("refresh:2;url='list.php'");
    }else{
        echo '驳回失败';
        header("refresh:2;url='list.php'");
    }
?>