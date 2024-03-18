<?php 

// ========Get score assignment============
function getScoreAssign(int $id)
{

    global $connection;
    $statement = $connection->prepare("select * from assignments where id = :id");
    $statement->execute([
        ":id"=> $id
    ]);
    return $statement->fetch();
}

// ========Get name student submitted assignment============
function getUserSubmitted(int $id)
{

    global $connection;
    $statement = $connection->prepare("select u.name from student_submit s
    inner join users u on u.id = s.user_id
    ");
    $statement->execute([
        ":id"=> $id
    ]);
    return $statement->fetch();
}


