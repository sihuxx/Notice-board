<?php

require_once './db.php';
require_once './lib.php';

$idx = $_POST["idx"];
$content = $_POST["content"];

DB::exec("update comment set content = '$content' where idx = '$idx'");
alert("댓글이 수정되었습니다");
move("./post.php?idx='$idx'");