<?php

// ========Get all students============
function studentJoinClass(int $id)
{

    global $connection;
    $statement = $connection->prepare("select * from classes where id = :id order by id desc");
    $statement->execute([":id"=>$id]);
    return $statement->fetchAll();
}

//<======== get single class=======>
function getUserCreateClass(int $id)
{
    global $connection;
    $statement = $connection->prepare("select u.name, u.image from users u inner join classes c on u.id = c.user_id where c.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}
