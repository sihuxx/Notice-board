<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 관리</title>
  <link rel="stylesheet" href="./style/style.css">
</head>
<body>
  <?php
  require_once './header.php';
  $users = DB::fetchAll("select * from user");
  ?>
  <main class="admin-list">
    <h1>회원 관리</h1>
    <table class="admin-box">
      <thead>
        <th>순서</th>
        <th>아이디</th>
        <th>이름</th>
        <th>비밀번호</th>
        <th>이메일</th>
        <th>가입 날짜</th>
      </thead>
      <tbody>
      <?php foreach($users as $user) { ?>
          <tr>
          <td><?= $user->idx ?></td>
          <td><?= $user->id ?></td>
          <td><?= $user->name ?></td>
          <td><?= $user->psw ?></td>
          <td><?= $user->email ?></td>
          <td><?= $user->date ?></td>
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