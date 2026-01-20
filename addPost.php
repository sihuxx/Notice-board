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
        <select name="category" class="cate" onChange="onChange()">
          <option value="일반">일반</option>
          <option value="유머">유머</option>
          <option value="투표">투표</option>
        </select>
      </div>
      <div>
        <input type="text" id="title" name="title" placeholder="제목" required>
      </div>
      <hr>
      <div>
        <input type="file" id="file" name="file" placeholder="파일">
      </div>
      <div class="section">
      </div>
      <button type="submit">글 쓰기</button>
    </form>
  </main>
</body>
<script>
  function onChange() {
    const writeSec = `
        <textarea name="detail" placeholder="내용을 입력해주세요." required></textarea>
    `;
    const voteSec = `
        <div class="vote-box">
          <input type="text" name="option1" placeholder="옵션 1" class="vote-input" required>
          <input type="text" name="option2" placeholder="옵션 2" class="vote-input" required> 
        </div>
        <textarea name="detail" placeholder="질문을 입력해주세요." required></textarea>
    `
    const section = document.querySelector('.section') 
    const cate = document.querySelector('.cate').value;

    if (cate == "투표") {
      section.innerHTML = voteSec
    } else {
      section.innerHTML = writeSec
    }
  }
  onChange()
</script>
</html>