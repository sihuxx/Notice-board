<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
<?php require_once './header.php'; ?>
  <main class="sign-box">
    <form action="./userAction.php" method="post">
      <input type="type" name="type" value="reg" hidden>
      <h3>회원가입</h3>
      <div>
        <label for="id">아이디</label>
        <input type="text" id="id" name="id" placeholder="아이디를 입력해주세요" required>
      </div>
      <div>
        <label for="psw">비밀번호</label>
        <input type="password" id="psw" name="psw" placeholder="비밀번호를 입력해주세요" required>
      </div>
      <div>
        <label for="email">이메일</label>
        <input type="email" id="email" name="email" placeholder="이메일를 입력해주세요" required>
      </div>
      <div>
        <label for="name">이름</label>
        <input type="text" id="name" name="name" placeholder="이름을 입력해주세요" required>
      </div>
      <button type="submit">회원가입</button>
      <a href="./login.php">계정이 이미 있으신가요?</a>
    </form>
  </main>
  
</body>

</html>