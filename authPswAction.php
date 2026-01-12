<?php
require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];
$user = DB::fetch("select * from user where idx = $idx");

$inputPsw = $_POST["psw"]; 
$h_inputPsw = hash("sha256", $inputPsw . $user->salt);

if($h_inputPsw == $user->psw) {
  alert("인증에 성공하였습니다.");
  move("./changePsw.php?idx=$idx");
} else {
  alert("비밀번호가 일치하지 않습니다.");
  back();
}