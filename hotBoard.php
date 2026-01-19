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
    ?>
      <main class="board-box">
        <h1>인기 게시판</h1>
        <div class="btn-box">
          <button class="desc-btn" onclick="location.href='./hotBoard.php?sort=desc'">조회수 많은 순</button>
          <button class="asc-btn" onclick="location.href='./hotBoard.php?sort=asc'">조회수 적은 순</button>
        </div>
        <?php
        $sort = $_GET["sort"] ?? 'desc';
        $posts = DB::fetchAll("select * from post order by view $sort limit 10");
        $user = $_SESSION["ss"] ?? false;
      ?>
      <table class="board">
        <thead>
          <th>제목</th>
          <th>내용</th>
          <th>닉네임</th>
          <th>날짜</th>
          <th>조회수</th>
        </thead>
        <tbody>
        <?php foreach($posts as $p) { ?>
        <tr  onclick="location.href = './post.php?idx=<?= $p->idx?>'" style="cursor:pointer;">
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
       <button class="post-btn" onclick="checkUser()">글쓰기</button>
    <?php require_once 'footer.php'; ?>
  </div>
</body>
<script>
  function checkUser() {
    const isUser = <?php echo $user ? 'true' : 'false'; ?> 
  if(isUser) {
    location.href = './addPost.php'
  } else {
    alert("로그인 후 이용해주세요")
  }
  }
    function checkSort() {
    const isDesc = <?php echo ($sort == 'desc') ? 'true' : 'false' ?>;
    const descBtn = document.querySelector(".desc-btn");
    const ascBtn = document.querySelector(".asc-btn");

    if(isDesc) {
      descBtn.classList.add('select');
      ascBtn.classList.remove('select');
    } else {
      descBtn.classList.remove('select');
      ascBtn.classList.add('select');
    }
  }

  checkSort();
</script>
</html> 