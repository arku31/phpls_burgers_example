<?php
$dsn = "mysql:host=127.0.0.1;charset=utf8;";
$pdo = new PDO($dsn,'root','123');
$pdo->query('use burgers;');

return $pdo;