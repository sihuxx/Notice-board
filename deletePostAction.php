<?php
require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];

DB::exec("delete from post where idx = '$idx'");

alert("삭제되었습니다");
move("./board.php?sort=desc");