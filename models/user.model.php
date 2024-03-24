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
// ==============update new profile==================
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
// ==============update exist profile==================
function updateExistProfile(string $name, string $email,int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set name =:name, email =:email where id = :id");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
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


