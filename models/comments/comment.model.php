<?php

function commentPublic(int $assignment_id, int $user_id, string $comment): bool
{

    global $connection;
    $statement = $connection->prepare("insert into comments (assignment_id, user_id, comment) values (:assignment_id, :user_id, :comment)");
    $statement->execute([
        ':assignment_id' => $assignment_id,
        ':user_id' => $user_id,
        ':comment' => $comment,
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
    $statement = $connection->prepare("select c.id as comment_id, c.comment, u.* from comments c inner join users u on c.user_id = u.id where assignment_id=:id");
    $statement->execute([
        ':id' => $id
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
