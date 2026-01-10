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
      <?php
      require_once './lib.php';
      require_once './header.php';

      $posts = DB::fetchAll("select * from post");
      ?>
    <main class="board-box">
      <h1>자유 게시판</h1>
      <table class="board">
        <thead>
          <th>제목</th>
          <th>내용</th>
          <th>작성자</th>
          <th>날짜</th>
          <th>조회수</th>
        </thead>
        <tbody>
        <?php foreach($posts as $p) { ?>
        <tr onclick="location.href = './post.php?idx=<?= $p->idx?>'" style="cursor:pointer;">
          <td><?= $p->title ?></td>
          <td><?= $p->detail ?></td>
          <td><?= $p->writer ?></td>
          <td><?= $p->date ?></td>
          <td><?= $p->view ?></td>
        </tr>
        <?php } ?>
      </tbody>
     </table>
    </main>
      <a href="./addPost.php" class="post-btn">글쓰기</a>
      <?php require_once 'footer.php'; ?>
  </div>
</body>
</html>