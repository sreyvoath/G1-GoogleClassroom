<?php

//<======== get users (no exist email) =======>
function getUser(string $email): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where email = :email");
    $statement->execute([':email' => $email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

//<======== get user by id=======>
function getUserId(string $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where id = :id");
    $statement->execute([':id' => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

//<======== get user by id=======>
function getPassCode(string $teacherEmail): array
{
    global $connection;
    $statement = $connection->prepare("select pass_verify from users where email = :email");
    $statement->execute([':email' => $teacherEmail]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}


function updatePassword(string $email, string $newPassword): bool
{
    global $connection;

    $statement = $connection->prepare("UPDATE users SET password = :password WHERE email = :email");
    $statement->execute([
        ':email' => $email,
        ':password' => $newPassword
    ]);

    return $statement->rowCount() > 0;
}

function executePassCode(string $code): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where pass_verify = :code");
    $statement->execute([':code' => $code]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}