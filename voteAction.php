<?php

require_once './db.php';
require_once './lib.php';

$post_idx = $_GET["idx"];
$user = $_SESSION["ss"];
$option = $_POST["option"];

if(!$user) {
  alert("로그인이 필요합니다");
  back();
}

if(db::fetch("select * from user_votes where post_idx = '$post_idx ' and user_idx = '$user->idx'")) {
  alert("이미 참여한 투표입니다");
  back();
} else {
  db::exec("insert into user_votes(post_idx, user_idx) values('$post_idx ', '$user->idx')");
  if($option == "1") {
    db::exec("update votes set count1 = count1 + 1 where post_idx = '$post_idx '");
  } else {
    db::exec("update votes set count2 = count1 + 1 where post_idx = '$post_idx '");
  }
  alert("투표가 완료되었습니다");
  move("./post.php?idx=$post_idx ");
}
