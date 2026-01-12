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
    <form action="./authPswAction.php?idx=<?=$idx?>" method="post">
      <h3>비밀번호 인증</h3>
      <div>
        <label for="nowPsw">현재 비밀번호</label>
      <input type="text" name="psw" id="nowPsw" placeholder="현재 비밀번호">
      </div>
      <button type="submit">인증</button>
    </form>
  </main>
  <?php require_once './footer.php' ?>
</body>
</html>