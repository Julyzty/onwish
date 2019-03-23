<?php
      header('content-type:text/html;charset=utf-8');
    //用post接收值  连接数据库 SQL语句 执行
         
      $name=empty($_POST['username'])?"":$_POST['username'];
      $pwd=empty($_POST['pwd'])?"":md5($_POST['pwd']);
      $link=mysqli_connect('127.0.0.1','root','root','wishwall') or exit('连接失败');
      $sql="select *from enter where e_name='$name' and pwd='$pwd'";
      $res=mysqli_query($link,$sql);
      if($res){
        echo '登录成功';
        header("refresh:2;url='list.php'");
    }else{
        echo '登录失败';
        header("refresh:2;url='login.php'");
    }
?>