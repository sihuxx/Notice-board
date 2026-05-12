<?php

require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];
$user = DB::fetch("select * from user where idx = $idx");

$newPsw = $_POST["psw"];
$checkPsw = $_POST["checkPsw"];

if ($newPsw == $checkPsw) {
  $psw = hash("sha256", $newPsw . $user->salt);
  DB::exec("update user set psw = '$psw' where idx = $idx");
  alert("비밀번호 변경 성공");
  move('./myInfo.php');
}

alert("비밀번호 변경 실패");
move('./myInfo.php');