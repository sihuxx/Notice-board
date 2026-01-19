<?php

require_once './db.php';
require_once './lib.php';

$idx = $_POST["idx"];
$content = $_POST["content"];
$comment = DB::fetch("select * from comment where idx = '$idx'");

DB::exec("update comment set content = '$content' where idx = '$idx'");
alert("댓글이 수정되었습니다");
move("./post.php?idx=$comment->post_idx");