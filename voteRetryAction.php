<?php

require_once './db.php';
require_once './lib.php';

$post_idx = $_GET["idx"];
$user = $_SESSION["ss"];

$user_vote = db::fetch("select * from user_votes where post_idx = '$post_idx' and user_idx = '$user->idx'");

db::exec("delete from user_votes where post_idx = '$post_idx' and user_idx = '$user->idx'");

if ($user_vote->option_idx == "1") {
  db::exec("update votes set count1 = GREATEST(count1 - 1, 0)");
  } else {
    db::exec("update votes set count2 = GREATEST(count2 - 1, 0)");
}

alert("투표가 취소되었습니다");
move("./post.php?idx=$post_idx");