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
  <?php 
  require_once './header.php';
  $comments = DB::fetchAll("select * from comment where post_idx = '$post->idx'");
  ?>
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
      <form action="./likeAction.php?idx=<?=$post->idx?>" method="post" class="like-box">

        <?php if(db::fetch("select * from likes where post_idx = '$post->idx' and user_idx = '$user->idx'")) { ?>
          <button class="select">좋아요</button>
        <?php } else { ?>
          <button>좋아요</button>
        <?php } ?>

        <span><?= $post->like_count?></span>
      </form>
      <h3>댓글 <?= count($comments)?></h3>
      <form action="./addCommentAction.php" method="post" class="comment-input">
        <input type="hidden" name="postIdx" value="<?= $post->idx?>">
        <input type="text" placeholder="댓글을 남겨주세요" name="content">
        <button>댓글 달기</button>
      </form>
      <div class="comment-box">
        <?php if (count($comments) > 0) { ?>
          <?php foreach($comments as $comment) { ?>
            <div class="comment">
             <div class="comment-content">
               <h4><?= $comment->writer?></h4>
              <p><?= $comment->content?></p>
              <p class="comment-date"><?= $comment->date?></p>
             </div>
              <?php if($user->idx == $comment->writer_idx) { ?>
              <div>
                <a href="./editComment.php?idx=<?=$comment->idx?>" class="edit-btn">수정</a>
                <a href="./deleteCommentAction.php?idx=<?=$comment->idx?>" class="edit-btn">삭제</a>
              </div>
              <?php } ?>
            </div>
            <hr>
          <?php } 
        } else { ?>
          <p class="no-comment">아직 댓글이 없습니다...</p>
        <?php } ?>
      </div>
    </div>
  </main>
  
</body>
</html>