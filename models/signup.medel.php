<?php

function createAccount(string $name, string $email, string $password) : bool
{
    global $connection;
    $role = "teacher";
    $statement = $connection->prepare("insert into users (name,email, password, role) values (:name, :email, :password, :role)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role

    ]);

    return $statement->rowCount() > 0;
}
