<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  //idx번호희 글 조회
  $bno = $_GET['idx'];
  $sql = "SELECT pw FROM board WHERE idx = {$bno}"; 
  $result = $mysqli->query($sql);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 보기</title>
  <link rel="stylesheet" href="../../css/bbs.css">
</head>
<body>

    <div id="pass_confirm">
      <form action="" method="POST">
        <input type="password" name="pw_chk">
        <button>확인</button>
      </form>
    </div>
    <?php
      //입력한 비번과 이 글의 원래 비번 비교, 일치하면 read.php 페이지 이동
      $org_pw = $row['pw'];
      if(isset($_POST['pw_chk'])){
        $pwk = $_POST['pw_chk']; //1234
        if(password_verify($pwk,$org_pw)){
          
        
    ?>
    <script>
      location.replace("read.php?idx=<?=$bno?>"); //location.replace 기록이 남지 않고 뒤로 돌려주는 스크립트
    </script>
    <?php
      }else{
    ?>
    <script>
      alert('비밀번호가 맞지 않습니다.');
      location.replace("../../index.php");
    </script>
    <?php
      } }
    ?>

</body>
</html>