<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시판</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <div class="body-container">
      <?php require_once 'header.php'; ?>
    <main class="index-box">
      <img src="./images/Notice-logo.png" alt="">
      <a href="./board.php?sort=desc">글 쓰러 가기</a>
    </main>
    <?php require_once 'footer.php'; ?>
  </div>
</body>
</html>