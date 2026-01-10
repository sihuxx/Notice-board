<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 수정하기</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<?php
 require_once 'header.php'; 

 $idx = $_GET["idx"];
 $post = DB::fetch("select * from post where idx = '$idx'");
?>
  <main class="post-box">
    <form action="./editPostAction.php" method="post" enctype="multipart/form-data">
      <h3>글 수정</h3>
      <input type="hidden" name="idx" value="<?=$idx?>">
      <div>
        <input type="text" id="title" name="title" value="<?=$post->title?>" placeholder="제목" required>
      </div>
      <hr>
      <div>
        <img src="<?=$post->img?>" alt="">
        <input type="file" id="file" name="file" placeholder="파일">
      </div>
      <div>
        <textarea name="detail" placeholder="내용을 입력해주세요." required>
          <?=$post->detail?>
        </textarea>
      </div>
      <button type="submit">글 수정</button>
    </form>
  </main>
</body>
</html>