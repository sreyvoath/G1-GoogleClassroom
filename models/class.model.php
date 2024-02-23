<?php
function getClasses() : array
{
    global $connection;
    $statement = $connection->prepare("select * from classes");
    $statement->execute();
    return $statement->fetchAll();
}
function createClass(string $title, string $section, string $subject, int $user_id, int $category_id) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into classes(title, section, subject, user_id, archive, category_id) values(:title, :section, :subject, :user_id, :archive, :category_id )");
    $statement->execute([
        ':title' => $title,
        ':section' => $section,
        ':subject' => $subject,
        ':user_id' => $user_id,
        ':archive' => 0,
        ':category_id' => $category_id
    ]);

    return $statement->rowCount() > 0;
}
function getClass(int $id)
{
    global $connection;
    $statement = $connection->prepare("select * from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function updateClass(string $title, string $section, string $subject, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update classes set title = :title, section = :section, subject = :subject where id = :id");
    $statement->execute([
        ':title' => $title,
        ':section' => $section,
        ':subject' => $subject,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}
function deleteClass(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}