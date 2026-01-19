<?php

require_once "./db.php";
require_once "./lib.php";

$idx = $_GET["idx"];
$comment = DB::fetch("select * from comment where idx = '$idx'");

DB::exec("delete from comment where idx = '$idx'");
alert("댓글이 삭제되었습니다");
move("./post.php?idx=$comment->post_idx");