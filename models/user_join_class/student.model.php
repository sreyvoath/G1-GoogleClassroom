<?php

// ========Get all students============
function getStudents()
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id from users u 
    inner join user_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    
    ");
    $statement->execute();
    return $statement->fetchAll();
}