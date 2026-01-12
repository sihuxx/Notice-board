<?php
require_once './lib.php';
require_once './db.php';

$idx = $_GET["idx"];
$user = $_SESSION["ss"] ?? false;
$post = DB::fetch("select * from post where idx = '$idx'");

DB::exec("update post set view = view + 1 where idx = '$idx'");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post->title ?></title>
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
  <?php require_once './header.php' ?>
  <main class="post-view-box">
    <div>
      <h1><?= $post->title ?></h1>
      <div class="post-info">
        <div>
          <p><?= $post->writer ?></p>
          <p><?= $post->date ?></p>
          <p>조회수: <?= $post->view ?></p>
        </div>
        <?php if($user) { ?>
        <?php if ($post->writer_id == $user->id) { ?>
          <div>
            <a href="./editPost.php?idx=<?=$idx?>">수정</a>
            <a href="./deletePostAction.php?idx=<?=$idx?>">삭제</a>
          </div>
          <?php } else { ?>
            <div>
              <a href="./userInfo.php?id=<?=$post->writer_id?>">프로필 보기</a>
            </div> 
            <?php }} else {?>
              <div>
              <a href="./userInfo.php?id=<?=$post->writer_id?>">프로필 보기</a>
            </div>
            <?php } ?>
      </div>
      <hr>
      <div class="post-content">
        <img src="<?= $post->img ?>" alt="">
        <p><?= $post->detail ?></p>
      </div>
    </div>
  </main>
  
</body>
</html>