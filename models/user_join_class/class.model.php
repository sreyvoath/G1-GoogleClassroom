<?php

// ========Get all students============
function studentJoinClass(int $id)
{

    global $connection;
    $statement = $connection->prepare("select * from classes where id = :id order by id desc");
    $statement->execute([":id"=>$id]);
    return $statement->fetchAll();
}