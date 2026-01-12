<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시글 관리</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <?php
  require_once './header.php';
  $posts = DB::fetchAll("select * from post");
  ?>
  <main class="admin-list">
    <h1>게시글 관리</h1>
    <table class="admin-box">
      <thead>
        <th>인덱스</th>
        <th>제목</th>
        <th>내용</th>
        <th>날짜</th>
        <th>작성자</th>
        <th>관리</th>
      </thead>
      <tbody>
      <?php foreach($posts as $post) { ?>
          <tr  onclick="location.href = './post.php?idx=<?= $post->idx?>'" style="cursor:pointer;">
          <td><?= $post->idx ?></td>
          <td><?= $post->title ?></td>
          <td><?= $post->detail ?></td>
          <td><?= $post->date ?></td>
          <td><?= $post->writer ?></td>
          <td><a href="./deletePostAction.php?idx=<?=$post->idx?>" class="del-btn">삭제</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </main>
  <?php
  require_once './footer.php';
  ?>
</body>
</html>