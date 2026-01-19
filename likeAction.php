<?php

require_once './db.php';
require_once './lib.php';

$post_idx = $_GET["idx"];
$user = $_SESSION["ss"];

if(!$user) {
  alert("로그인이 필요합니다");
  back();
}
  
  if(db::fetch("select * from likes where post_idx = '$post_idx' and user_idx = '$user->idx'")) {
    db::exec("delete from likes where post_idx = '$post_idx' and user_idx = '$user->idx'");
    db::exec("update post set like_count = like_count - 1 where idx = '$post_idx'");
    move("./post.php?idx=$post_idx");
  } else {
    db::exec("insert into likes (post_idx, user_idx) values ('$post_idx', '$user->idx')");
    db::exec("update post set like_count = like_count + 1 where idx = '$post_idx'");
    move("./post.php?idx=$post_idx");
  }
