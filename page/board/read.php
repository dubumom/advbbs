<?php
  include $_SERVER['DOCUMENT_ROOT']."/advbbs/inc/db.php";
  //idx번호희 글 조회
  $bno = $_GET['idx']; #변수명 $bno에 넘어온 숫자를 저장
  $sql = "SELECT * FROM board WHERE idx = {$bno}"; //변수명 $sql에 board테이블에서 idx번호가 $bno와 일치하는 행 조회
  $result = $mysqli->query($sql);//$sql쿼리를 실행하고 그 결과를 변수명 $result에 할당
  $resultArr = mysqli_fetch_assoc($result);//$result에 할당된 값을 연관배열로 출력하고 그 값을 변수명 $resultArr에 할당
  
    //조회수 업데이트
  $hit = $resultArr['hit'] + 1;
  $sqlupdate = "UPDATE board SET hit={$hit} WHERE idx = {$bno}"; //변수명 $sqlupdate에 테이블 board에서 idx번호가 bno와 일치하는 행에서 hit값을 $hit로 변경하는 문장을 저장.
  $mysqli->query($sqlupdate);
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
  <div class="wrapper">
    <h1>글보기</h1>
    <h2><?=$resultArr['title']?></h2>
    <div class="info">
      <span>글쓴이: <?=$resultArr['name']?></span>
      <span>날짜: <?=$resultArr['date']?></span>
      <span>조회수: <?=$resultArr['hit']?></span>
      <span>추천수: <?=$resultArr['thumbsup']?></span>
    </div>
    <div class="content"><?=nl2br($resultArr['content'])?></div>
    <hr>
    <p>
      <a href="../../index.php">홈</a>/
      <a href="thumbup.php?idx=<?=$bno;?>">추천</a>/
      <a href="modify.php?idx=<?=$bno;?>">수정</a>/
      <a href="delete.php?idx=<?=$bno;?>">삭제</a>/
    </p>
  </div>
</body>
</html>