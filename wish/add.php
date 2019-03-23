<?php
      header('content-type:text/html;charset=utf-8');
      //通过post接收值  连接数据库 SQL语句 执行  通知
       $name=empty($_POST['username'])?"":$_POST['username'];
       $content=empty($_POST['content'])?"":$_POST['content'];
       $time=time();


      $link=mysqli_connect('127.0.0.1','root','root','wishwall') or exit('连接失败');
      $sql="insert into wish (username,content,add_time,is_pass)  values('$name','$content','$time','1')";
      //echo $sql;exit;
      $res=mysqli_query($link,$sql);
      //var_dump($res);exit;
      if($res){
          echo '已提交成功，待审核';
          header("refresh:2;url='index.php'");
      }else{
          echo '提交失败';
          header("refresh:2;url='index.php'");
      }
?>