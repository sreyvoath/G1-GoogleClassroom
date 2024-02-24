<?php
// function create post
function createPost(string $title, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

// function get post by id
function getPost(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// function get posts
function getPosts(): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

// function update posts
function updatePost(string $title, string $description, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id
        
    ]);

    return $statement->rowCount() > 0;
}

// function delete post
function deletePost(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
