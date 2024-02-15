<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  $bno = $_GET['idx'];

  $sql = "DELETE FROM board WHERE idx = {$bno}";

  $result = $mysqli->query($sql);

  if($result === true){
    echo "<script>alert('삭제 성공');location.href='../../index.php';</script>";
  }
?>