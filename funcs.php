<?php
function alreadyRegistered($email, Pdo $pdo)
{
    // asd@asd.ru
    $prepared = $pdo->prepare('select * from users where email = :email');
    $prepared->execute(['email' => trim($email)]);
    return $prepared->fetch(PDO::FETCH_ASSOC);
}

function registerUser($name, $email, $phone, Pdo $pdo)
{
    $prepared = $pdo->prepare('INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)');
    $prepared->execute(['email' => trim($email), 'name' => $name, 'phone' => $phone]);

    $id = $pdo->lastInsertId();
    $prepared = $pdo->prepare('select * from users where id = :id');
    $prepared->execute(['id' => $id]);
    return $prepared->fetch(PDO::FETCH_ASSOC);
}

function registerOrder($content, $otherDetails, $userId, Pdo $pdo)
{
    $prepared = $pdo->prepare('INSERT INTO orders (content, user_id, otherdata) VALUES (:content, :user_id, :otherdata)');
    $prepared->execute(['content' => trim($content), 'otherdata' => $otherDetails, 'user_id' => $userId]);
    $id = $pdo->lastInsertId();
    $prepared = $pdo->prepare('select * from orders where id = :id');
    $prepared->execute(['id' => $id]);
    return $prepared->fetch(PDO::FETCH_ASSOC);
}