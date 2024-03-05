<?php

// ========Get all students============
function getStudents()
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role
    ");

    $statement->execute([":role" => "student"]);
    return $statement->fetchAll();
}

// ========Get all students============
function getStudentsInClass(int $user_id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role and c.user_id = :id
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $user_id
    ]);
    return $statement->fetchAll();
}

// ========Get all students============
function getStudent(int $id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role and u.id = :id
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $id
    ]);
    return $statement->fetchAll();
}

function studentJoinedClass(int $class_id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role and c.id =  :id
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $class_id
    ]);
    return $statement->fetchAll();
}
