<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>비밀번호 변경</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<?php
require_once './header.php';
$idx = $_GET["idx"];
?>
<main class="change-psw">
  <form action="./changePswAction.php?idx=<?=$idx?>" method="post">
      <h3>비밀번호 변경</h3>
      <div>
        <label for="newPsw">새 비밀번호</label>
      <input type="text" name="psw" id="newPsw" placeholder="새 비밀번호">
      </div>
      <div>
        <label for="checkPsw">비밀번호 확인</label>
      <input type="text" name="checkPsw" id="checkPsw" placeholder="비밀번호 확인">
      </div>
      <button type="submit">변경</button>
    </form>
</main>
<?php require_once './footer.php' ?>
</body>
</html>