<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>검색</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <a class="back-btn" href="./board.php">&lt; 돌아가기</a>
  <form action="./search.php" method="post" class="search-box">
    <input type="text" name="search" placeholder="검색어를 입력해주세요">
    <button>검색</button>
  </form>
  <?php
  require_once './db.php';
  $search = $_POST["search"] ?? false;
  if(isset($search)) {
    $posts = DB::fetchAll("select * from post where
  title like '%$search%' or
  detail like '%$search%' or
  writer like '%$search%'");
  }
  ?>
  <main class="search-main">
    <?php if(!empty($search) && count($posts) > 0) { ?>
    <table class="board">
      <thead>
        <th>유형</th>
        <th>제목</th>
        <th>내용</th>
        <th>작성자</th>
        <th>날짜</th>
        <th>조회수</th>
      </thead>
      <tbody>
      <?php foreach($posts as $p) { ?>
      <tr onclick="location.href = './post.php?idx=<?= $p->idx?>'" style="cursor:pointer;">
        <td><?= $p->cate ?></td>
        <td><?= $p->title ?></td>
        <td><?= $p->detail ?></td>
        <td><?= $p->writer ?></td>
        <td><?= $p->date ?></td>
        <td><?= $p->view ?></td>
      </tr>
      <?php } ?>
    </tbody>
   </table>
<?php } else {?>
<p class="no-result">결과가 없습니다.</p>
<?php } ?>
  </main>
</body>
</html>