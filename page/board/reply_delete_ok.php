<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  $bno = $_POST['board_no']; 
  $rno = $_POST['reply_no']; 
  $userpw = $_POST['password'];
  $content = $_POST['content'];

  $sql = "DELETE FROM reply WHERE idx = {$rno}";

  //비번확인
  $pwsql = "SELECT password FROM reply WHERE idx = {$rno}"; 
  $result = $mysqli->query($pwsql);
  $row = mysqli_fetch_assoc($result);
  //삭제 아니면 되돌리기
  $org_pw = $row['password'];
  if(password_verify($userpw,$org_pw)){
    if($mysqli->query($sql)){
      echo "<script>
      alert('삭제 성공');
      location.replace('read.php?idx=$bno');
      </script>"; 
    }
  } else {
    echo "<script>
    alert('비밀번호가 일치하지 않습니다.');
    location.replace('read.php?idx=$bno');
    </script>"; 
  }
?>