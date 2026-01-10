<?php

function hashPsw($psw) {
  $salt = bin2hex(random_bytes(32));
  $h_psw = hash("sha256", $psw . $salt);
  return [$salt, $h_psw];
}

function move($page) {
  echo "<script>location.href = '$page'</script>";
}

function alert($msg) {
  echo "<script>alert('$msg')</script>";
}

function back() {
  echo "<script>history.back();</script>";
}