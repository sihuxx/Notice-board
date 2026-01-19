<?php

require_once './db.php';
require_once './lib.php';

$user = $_SESSION["ss"];

$postIdx = $_POST["postIdx"];
$content = $_POST['content'];

alert("댓글이 추가되었습니다");
DB::exec("insert into comment(post_idx, writer, writer_idx, content) values('$postIdx', '$user->name', '$user->idx', '$content')");
move("./post.php?idx=$postIdx");