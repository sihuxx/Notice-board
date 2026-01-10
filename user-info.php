<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>내 정보</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<?php
  require_once './db.php';
  require_once './lib.php';
  $user = $_SESSION["ss"] ?? false;
?>

<body>
<?php require_once 'header.php'; ?>
  <main class="my-info">
    <div>
      <h1><?= $user->name ?>님</h1>
      <p>@<?= $user->id ?></p>
      <div>
        <h3>비밀번호</h3>
        <p><?= $user->psw ?></p>
      </div>
      <div>
        <h3>이메일</h3>
        <p><?= $user->email ?></p>
      </div>
      <a href="./logout.php">로그아웃</a>
    </div>
    <img src="./images/Notice-logo.png" alt="">
  </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>