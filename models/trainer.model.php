<?php
function getUsers() : array
{
    global $connection;
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    return $statement->fetchAll();
}

function createUser(string $name, string $email, string $password, string $image) : bool
{
    global $connection;
    $role = "teacher";
    $statement = $connection->prepare("insert into users (name,email, password, role, image) values (:name, :email, :password, :role, :image)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role,
        ':image' => $image

    ]);

    return $statement->rowCount() > 0;
}

// function getUser(int $id)
// {
//     global $connection;
//     $statement = $connection->prepare("select * from users where id = :id");
//     $statement->execute([':id' => $id]);
//     return $statement->fetch();
// }