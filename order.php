<?php
echo '<pre>';
$pdo = require_once "db.php";
require "funcs.php";

$isRegistered = alreadyRegistered($_POST['email'], $pdo);

if (!$isRegistered) {
    $isRegistered = registerUser($_POST['name'], $_POST['email'], $_POST['phone'], $pdo);
}
$data = registerOrder(json_encode($_POST), json_encode($_POST), $isRegistered['id'], $pdo);
print_r($isRegistered);

file_put_contents('letter', 'zakaz#'.$data['id']);
