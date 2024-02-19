<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";

  
  $bno = $_POST['board_no']; 
  $rno = $_POST['reply_no']; 
  $userpw = $_POST['password'];
  $content = $_POST['content'];

  $sql = $sql= "UPDATE reply SET content='{$content}' WHERE idx = {$rno}";

  //비번조회
  $pwsql = "SELECT password FROM reply WHERE idx = {$rno}"; 
  $result = $mysqli->query($pwsql);
  $row = mysqli_fetch_assoc($result);

  $org_pw = $row['password'];
  if(password_verify($userpw,$org_pw)){
    if($mysqli->query($sql)){
      echo "<script>
      alert('댓글 수정 완료');
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