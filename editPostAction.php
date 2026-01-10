<?php

require_once './db.php';
require_once './lib.php';

$idx = $_POST['idx'];
$title = $_POST['title'];
$detail = $_POST['detail'];

$file = $_FILES["file"];
$desPath = "./images/file/" . $file["name"];

if (!empty($file['name'])) {
  if (move_uploaded_file($file["tmp_name"], $desPath)) {
    DB::exec("update post set title = '$title', detail = '$detail', img='$desPath' where idx='$idx'");
    alert("수정 완료!!");
    move("./post.php?idx=$idx");
  } else {
    alert("파일 업로드 실패");
    back();
  }
} else {
  DB::exec("update post set title = '$title', detail = '$detail' where idx='$idx'");
  alert("수정 완료");
  move("./post.php?idx=$idx");
  // move('./');
}