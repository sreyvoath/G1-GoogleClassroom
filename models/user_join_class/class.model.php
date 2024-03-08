<?php

//<======== get single class=======>
function getUserCreateClass(int $id)
{
    global $connection;
    $statement = $connection->prepare("select u.name, u.image from users u inner join classes c on u.id = c.user_id where c.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}


//<================check id user were id user in join class==============>

function checkId(string $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from users_join_class where user_id=:id");
    $statement->execute([':id' => $id]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

//<================insert user to join class==============>

function createUserJoinClass(string $student_id, $class_id): bool
{
    global $connection;
    $statement = $connection->prepare("insert into users_join_class (user_id, class_id) values (:student_id, :class_id)");
    $statement->execute([
        ':student_id' => $student_id,
        ':class_id' => $class_id
    ]);
    return $statement->rowCount() > 0;

    
}

//<======== delete class joined=======>
function deleteClassJoin(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from users_join_class where class_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//<======== delete class joined=======>
function unEnrolledClass(int $student_id, int $class_id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from users_join_class where user_id = :user_id and class_id = :class_id");
    $statement->execute([
        ':user_id' => $student_id,
        ':class_id' => $class_id
    ]);
    return $statement->rowCount() > 0;
}


