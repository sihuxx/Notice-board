<?php

require_once './db.php';
require_once './lib.php';

$type = $_POST['type'];

if ($type == 'reg') {
  $id = $_POST["id"];
  $psw = $_POST["psw"];
  $email = $_POST["email"];
  $name = $_POST["name"];

  if(DB::fetch("select * from user where id = '$id'")) {
    alert("이미 있는 아이디입니다.");
    back();
  } else {
    [$salt, $h_psw] = hashPsw($psw);
    DB::exec("insert into user(id, psw, salt, name, email) values ('$id', '$h_psw', '$salt', '$name', '$email')");
    alert("회원가입 성공!");
    move('./login.php');
  }
} else {
  $id = $_POST["id"];
  $psw = $_POST["psw"];
  
  if(!DB::fetch("select * from user where id = '$id'")) {
    alert("사용자를 찾을 수 없습니다");               
    back();
  } else {
    $user = DB::fetch("select * from user where id = '$id'");
    
    $input_psw = hash("sha256", $psw . $user->salt);
    
    if($input_psw !== $user->psw) {
      alert("비밀번호가 일치하지 않습니다.");
      back();
    } else {
      $_SESSION["ss"] = $user;
      alert("로그인 성공");
      move('./index.php');
    }
  }
}