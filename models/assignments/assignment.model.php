<?php

// ==== Create Post insert to database ====
function createAssign(string $title, string $content, string $document, int $score, string $end_date, string $end_time, int $class_id): bool
{

    global $connection;
    $statement = $connection->prepare("insert into assignments (title, content, document, score, end_date, end_time, class_id) values (:title, :content, :document, :score, :end_date, :end_time, :class_id)");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':document' => $document,
        ':score' => $score,
        ':end_date' => $end_date,
        ':end_time' => $end_time,
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

function updateAssign(string $title, string $content, string $document, int $score, string $deadline, int $class_id, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update assignments set title = :title, content = :content, document=:document, score=:score, deadline=:deadline, class_id=:class_id where id = :id");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':document' => $document,
        ':score' => $score,
        ':deadline' => $deadline,
        ':class_id' => $class_id,
        ':id' => $id,
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
