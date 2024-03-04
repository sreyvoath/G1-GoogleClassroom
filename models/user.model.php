<?php

// ========= get user by id ===============
function getUser(string $id): array
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
// ==============update profile==================
function updateProfile(string $name, string $email, string $image, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set name =:name, email =:email, image = :image where id = :id");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':image' => $image,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}

//======== check account exist=======
function getUserEmail(string $email): array
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

//======== check account exist=======
function getUserStudent(): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where role = :role");
    $statement->execute([':role' => "student"]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
