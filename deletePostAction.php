<?php
require_once './db.php';
require_once './lib.php';

$idx = $_GET["idx"];

DB::exec("delete from post where idx = '$idx'");

move("./board.php");