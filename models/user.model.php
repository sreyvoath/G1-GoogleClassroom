<?php
// function get user
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

// function update profile
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