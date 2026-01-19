<?php
require_once './db.php';
require_once './lib.php';

$user = $_SESSION["ss"];
$title = $_POST["title"];
$detail = $_POST["detail"];

$file = $_FILES["file"];
$desPath = './images/file' . $file["name"];

if (!empty($file['name'])) {
  if (move_uploaded_file($file["tmp_name"], $desPath)) {
    alert("업로드 완료");
    db::exec("insert into post(title, detail, writer, writer_id, img) values ('$title', '$detail', '$user->name', '$user->id', '$desPath')");
    move("./board.php?sort=desc");
  } else {
    alert("파일 업로드 실패");
    back();
  }
} else {
  db::exec("insert into post(title, detail, writer, writer_id, img) values ('$title', '$detail', '$user->name', '$user->id', '$desPath')");
  alert("업로드 완료");
  move('./board.php?sort=desc');
}