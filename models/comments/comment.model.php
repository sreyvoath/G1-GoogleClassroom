<?php

function commentPublic(int $assignment_id, int $user_id, string $comment, string $time, int $teacher_id): bool
{
    global $connection;
    $statement = $connection->prepare("insert into comments (time, assignment_id, user_id,teacher_id, comment, is_private) values (:time,:assignment_id, :user_id, :teacher_id, :comment, :is_private)");
    $statement->execute([
        ':assignment_id' => $assignment_id,
        ':user_id' => $user_id,
        ':teacher_id' => $teacher_id,
        ':comment' => $comment,
        ':is_private' => false,
        ':time' => $time,
    ]);
    return $statement->rowCount() > 0;
}

function commentPrivate(int $assignment_id, int $user_id, string $comment, string $time, int $teacher_id): bool
{
    global $connection;
    $statement = $connection->prepare("insert into comments (time, assignment_id, user_id,teacher_id, comment, is_private) values (:time,:assignment_id, :user_id, :teacher_id, :comment, :is_private)");
    $statement->execute([
        ':assignment_id' => $assignment_id,
        ':user_id' => $user_id,
        ':comment' => $comment,
        ':is_private' => true,
        ':time' => $time,
        ':teacher_id' => $teacher_id
    ]);
    return $statement->rowCount() > 0;
}

function getComment($id): array
{

    global $connection;
    $statement = $connection->prepare("select * from comments where id=:id");
    $statement->execute([":id" => $id]);
    return $statement->fetchAll();
}


function showCmts(int $id)
{
    global $connection;
    $statement = $connection->prepare("select c.id as comment_id, c.time, c.comment, u.* from comments c inner join users u on c.user_id = u.id where assignment_id=:id and c.is_private=:is_private");
    $statement->execute([
        ':id' => $id,
        ':is_private' => false
    ]);
    return $statement->fetchAll();
}

function getPrivate(int $id, int $student_id, int $teacher_id):array
{
    global $connection;
    $statement = $connection->prepare("select c.id as comment_id, c.time, c.comment, u.* from comments c inner join users u on c.user_id = u.id where assignment_id=:id and c.is_private=:is_private and ((u.id = :student_id or u.id = :teacher_id) and c.teacher_id= :teacher_id)");
    $statement->execute([
        ':id' => $id,
        ':student_id' => $student_id,
        ':teacher_id' => $teacher_id,
        ':is_private' => true
    ]);
    return $statement->fetchAll();
}


//<======== delete comment=======>
function deleteComment(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from comments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
