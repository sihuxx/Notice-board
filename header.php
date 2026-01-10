<?php
  require_once './db.php';
  require_once './lib.php';
  $user = $_SESSION["ss"] ?? false;
?>

<header>
      <div class="header-content">
        <a href="./index.php" class="logo">
        <img src="./images/Notice-logo.png" alt="로고">
      </a>
      <nav class="nav01">
        <ul>
          <li>
            <a href="./board.php">자유게시판</a>            
          </li>
          <li>
            <a href="./hot-board.php">HOT 게시판</a>            
          </li>
        </ul>
      </nav>
<?php if (!$user) { ?>
        <nav class="nav02">
        <ul>
          <li>
            <a href="./reg.php">회원가입</a>
          </li>
          <li>
            <a href="./login.php">로그인</a>
          </li>
        </ul>
      </nav>
<?php } else if ($user->isAd == 1) {?>
        <nav class="nav02">
        <ul>
          <li>
            <a href="./my-info.php">관리자</a>
            <ul class="sub">
              <li><a href="#">회원 관리</a></li>
              <li><a href="#">게시글 관리</a></li>
            </ul>
          </li>
                   <li>
            <a href="./logout.php">로그아웃</a>
          </li>
          <li>
            <a href="./my-info.php">내 정보</a>
          </li>
        </ul>
      </nav>
      </nav> 
      <?php } else { ?>
        <nav class="nav02">
        <ul>
          <li>
            <a href="./my-info.php">내 정보</a>
          </li>
          <li>
            <a href="./logout.php">로그아웃</a>
          </li>
          <li>
           <a href="#">
             <?= $user->id ?>님
           </a>
          </li>
        </ul>
      </nav>
        <?php } ?>
      </div>
    </header>