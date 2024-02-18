<?php
function getClasses() : array
{
    global $connection;
    $statement = $connection->prepare("select * from classes");
    $statement->execute();
    return $statement->fetchAll();
}
function createClass(string $title, string $section, string $subject, int $user_id, bool $archive, int $category_id  ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into classes(title, section, subject, user_id, archive, category_id) values(:title, :section, :subject, :user_id, :archive, :category_id )");
    $statement->execute([
        ':title' => $title,
        ':section' => $section,
        ':subject' => $subject,
        ':user_id' => $user_id,
        ':archive' => $archive,
        // ':category_id' => $category_id
    ]);

    return $statement->rowCount() > 0;
}
function getClass(int $id)
{
    global $connection;
    $statement = $connection->prepare("select * from project where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function updateClass(string $name, int $post_id, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update project set name = :name, post_id = :post_id where id = :id");
    $statement->execute([
        ':name' => $name,
        ':post_id' => $post_id,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}
function deleteClass(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from project where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}