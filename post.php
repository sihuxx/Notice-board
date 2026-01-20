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

        <?php if($post->cate == "투표") {
          $vote = db::fetch("select * from votes where post_idx = '$post->idx'");
          $user_vote = db::fetch("select * from user_votes where post_idx = '$post->idx' and user_idx = '$user->idx'");
          $total = $vote->count1 + $vote->count2;

          if ($total > 0) {
            $result1 = round($vote->count1 / $total) * 100;
            $result2 = round($vote->count2 / $total) * 100;
          } else {
            $result1 = 0;
            $result2 = 0;
          }
            if ($user_vote) { ?>
            <form action="./voteRetryAction.php?idx=<?=$post->idx?>" method="post" class="vote-content voted-content">
              <span class="span">
                <span class="vote1" style="width: <?=$result1?>%;">
                  <label for="op1"><?=$vote->option1?></label>
                </span>
              </span>
              <span class="span"> 
                <span class="vote2" style="width: <?=$result2?>%;">
                  <label for="op2"><?=$vote->option2?></label>
                </span>
              </span>
              <button>다시 투표하기</button>
            </form>
          <?php } else { ?>
            <form action="./voteAction.php?idx=<?=$post->idx?>" method="post" class="vote-content">
              <span class="span">
                <input type="radio" name="option" id="op1" value="1" class="option" onChange="onChange()">
                <label for="op1"><?=$vote->option1?></label>
              </span>
              <span class="span"> 
                <input type="radio" name="option" id="op2" value="2" class="option" onChange="onChange()">
                <label for="op2"><?=$vote->option2?></label>
              </span>
              <button>투표하기</button>
            </form>
          <?php } ?>
        <?php } ?>
      </div>
      <form action="./likeAction.php?idx=<?=$post->idx?>" method="post" class="like-box">

        <?php if($user && db::fetch("select * from likes where post_idx = '$post->idx' and user_idx = '$user->idx'")) { ?>
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
        </div> <?php 
          if($user && $user->idx == $comment->writer_idx) { 
        ?>
          <div class="comment-actions">
            <a href="./editComment.php?idx=<?=$comment->idx?>" class="edit-btn">수정</a>
            <a href="./deleteCommentAction.php?idx=<?=$comment->idx?>" class="edit-btn">삭제</a>
          </div>
        <?php } ?>
      </div> <hr>
    <?php } } else { ?>
    <p class="no-comment">아직 댓글이 없습니다...</p>
  <?php } ?>
</div>
    </div>
  </main>
</body>
<script>
  function onChange() {
    const option = document.querySelectorAll(".option")
    const span = document.querySelectorAll('.span')

    span.forEach(e2 => {
      e2.classList.remove('vote')
    })

    option.forEach(e => {
        if(e.checked) {
          e.closest('span').classList.add('vote')
        }
      })
  }
</script>
</html>