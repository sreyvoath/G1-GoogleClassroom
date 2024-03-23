<?php
//<======== create user account =======>
function createAccount(string $name, string $email, string $role,int $code, string $password, string $image) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (name,email,pass_verify, password, role, image) values (:name, :email,:code, :password, :role, :image)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role,
        ':code' => $code,
        ':image' => $image
    ]);
    return $statement->rowCount() > 0;
}

//<======== check exist account =======>
function accountExists(string $email): array
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

// =========== get users by email ============
function getUserEmail(string $email)
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