<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>댓글 편집</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <?php
  require_once './header.php';
  $idx = $_GET["idx"];
  $comment = DB::fetch("select * from comment where idx = $idx");
  ?>
    <main class="post-box">
    <form action="./editCommentAction.php" method="post" enctype="multipart/form-data">
      <h3>댓글 수정</h3>
      <input type="hidden" name="idx" value="<?=$idx?>">
        <textarea name="content" placeholder="내용을 입력해주세요." required>
          <?=$comment->content?>
        </textarea>
      </div>
      <button type="submit">글 수정</button>
    </form>
  </main>
</body>
</html>