<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";

  $bno = $_POST['idx']; 
  $username = $_POST['name'];
  $userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date("Y-m-d");

  $sql = $sql= "UPDATE board SET name='$username', title='$title', content='$content', date='$date', pw='$userpw' WHERE idx = {$bno}";
  $result = $mysqli->query($sql);
  if(!$result){
    echo "<script>alert('수정실패');history.back();</script>";
    error_log(mysql_error($mysqli));
  }else{
    echo "<script>alert('수정성공');location.href='../../index.php';</script>";
    echo '<a href="index.php">홈</a>';
  }
?>