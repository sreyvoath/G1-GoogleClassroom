<?php

// ==== Create Post insert to database ====
function createAssign(string $title, string $content, int $score, DateTime $deadline, int $class_id): bool
{
    $Object = new DateTime();
    $start_date = $Object->format("d-m-Y h:i a");
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
function getAssign(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from assignments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// ========Get all posts============
function getAssigns($id): array
{

    global $connection;
    $statement = $connection->prepare("select * from assignments where class_id=:id");
    $statement->execute([":id" => $id]);
    return $statement->fetchAll();
}

function updateAssign(string $title, string $content, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update assignments set title = :title, content = :content where id = :id");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}

// ========Delete post============
function deleteAssign(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from assignments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
