<?php

// ==== Create Post insert to database ====
function createAssign(string $title, string $content, int $score, DateTime $start_date, DateTime $deadline, int $class_id) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into assignments (title, content, score, start_date, dealine, class_id) values (:title, :content, :score, :start_date, :deadline, :class_id)");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':score' => $score,
        ':start_date' => $start_date,
        ':deadline' => $deadline,
        ':class_id' => $class_id,
    ]);
    return $statement->rowCount() > 0;
}

// ========Get single post============
function getAssign(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// ========Get all posts============
function getAssigns($id) : array
{   

    global $connection;
    $statement = $connection->prepare("select * from assignments where class_id=:id");
    $statement->execute([":id"=>$id]);
    return $statement->fetchAll();
}

function updateAssign(string $title, string $description, int $id) : bool
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

// ========Delete post============
function deleteAssign(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}