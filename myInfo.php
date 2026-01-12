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
  $posts = DB::fetchAll("select * from post where writer_id = '$user->id'");
?>

<body>
<?php require_once 'header.php'; ?>
  <main class="my-info">
    <div>
      <h1><?= $user->name ?>님</h1>
      <p>@<?= $user->id ?></p>
      <div>
        <h3>비밀번호</h3>
        <p>********</p>
        <button class="change-psw-btn"
        onclick="location.href='./authPsw.php?idx=<?=$user->idx?>'"
        >비밀번호 변경</button>
      </div>
      <div>
        <h3>이메일</h3>
        <p><?= $user->email ?></p>
      </div>
      <a href="./logout.php">로그아웃</a>
    </div>
     <div>
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
  </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>