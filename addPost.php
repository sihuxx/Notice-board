<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 쓰기</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<?php
 require_once 'header.php'; 
 $user = $_SESSION["ss"];
?>
  <main class="post-box">
    <form action="./addPostAction.php" method="post" enctype="multipart/form-data">
      <h3>글 쓰기</h3>
      <div>
        <input type="text" id="title" name="title" placeholder="제목" required>
      </div>
      <hr>
      <div>
        <input type="file" id="file" name="file" placeholder="파일">
      </div>
      <div>
        <textarea name="detail" placeholder="내용을 입력해주세요." required></textarea>
      </div>
      <button type="submit">글 쓰기</button>
    </form>
  </main>
</body>
</html>