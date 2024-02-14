<?php
  $mysqli = mysqli_connect('localhost', 'advbbs', '12345', 'advbbs');

  if ($mysqli->connect_errno) {
    echo "연결 실패". $mysqli->connect_error;
    exit(); # 현재 스크립트를 제거, 종료 / 뒤어 어떤 스크립트가 있던간에 무시하고 종료
  }
?>