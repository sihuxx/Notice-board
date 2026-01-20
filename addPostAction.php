<?php
require_once './db.php';
require_once './lib.php';

$user = $_SESSION["ss"];
$title = $_POST["title"];
$detail = $_POST["detail"];
$category = $_POST["category"];

$file = $_FILES["file"];
$path = './images/file/' . $file["name"];
$desPath = "";

if (!empty($file['name'])) {
  if (move_uploaded_file($file["tmp_name"], $path)) {
    $desPath = $path;
  } else {
    alert("파일 업로드 실패");
    back();
  }
}

if($desPath) {
  db::exec("insert into post(title, detail, writer, writer_id, img, cate) values ('$title', '$detail', '$user->name', '$user->id', '$desPath', '$category')");
  } else {
  db::exec("insert into post(title, detail, writer, writer_id, cate) values ('$title', '$detail', '$user->name', '$user->id', '$category')");
}

if ($category == "투표") {
  $this_post = db::fetch("select * from post where writer_id = '$user->id' order by idx desc limit 1");

  $option1 = $_POST["option1"];
  $option2 = $_POST["option2"];
  
  db::exec("insert into votes(post_idx, option1, option2) values ('$this_post->idx', '$option1', '$option2')");
}

alert("업로드 완료");
move("./post.php?idx=$this_post->idx");