<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>내 정보</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
  <?php
  require_once './lib.php';
  require_once 'header.php';
  $userId = $_GET["id"];
  $user = DB::fetch("select * from user where id = '$userId'");
  $posts = DB::fetchAll("select * from post where writer_id = '$userId'");
  ?>
  <main class="my-info">
    <div>
      <h1><?= $user->name ?>님</h1>
      
      <p>@<?= $user->id ?></p> 
<?php 
      if (count($posts) > 0) { 
        ?>
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
      <?php } else { ?>
          <h1>게시글이 없습니다.</h1>
      <?php } ?>
      </div>
    </div>
  </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>