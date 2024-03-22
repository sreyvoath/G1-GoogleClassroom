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
    order by uj.id desc
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $id
    ]);
    return $statement->fetchAll();
}

// ========Get all students============
function getTeacher(int $id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id, c.image, c.section, c.code, c.archive , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role and u.id = :id
    order by uj.id desc
    ");

    $statement->execute([
        ":role" => "teacher",
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
    where u.role = :role and c.id = :id 
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $class_id
    ]);
    return $statement->fetchAll();
}
function teacherJoinedClass(int $class_id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    where u.role = :role and c.id =  :id
    ");

    $statement->execute([
        ":role" => "teacher",
        ":id" => $class_id
    ]);
    return $statement->fetchAll();
}

// ========Get all students============
function studentJoinClass(int $id)
{

    global $connection;
    $statement = $connection->prepare("select * from classes where id = :id order by id desc");
    $statement->execute([":id"=>$id]);
    return $statement->fetchAll();
}

// check email there are in user table 

function checkEmailUser(string $email): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where email = :email");
    $statement->execute([':email' => $email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
// check email there are in user table 

function checkEmailUserExits(int $user_id, int $class_id): array
{
    global $connection;
    $statement = $connection->prepare("select c.id, c.title, u.name from classes c 
    inner join users_join_class uj on c.id = uj.class_id 
    inner join users u on uj.user_id = u.id 
    where uj.user_id =:user_id and uj.class_id =:class_id
    ");
    $statement->execute([
        ':user_id' => $user_id,
        ":class_id" => $class_id
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

//<======== delete class=======>
function deleteStudent(int $user_id, int $class_id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from users_join_class where user_id = :user_id and class_id = :class_id");
    $statement->execute([
        ':user_id' => $user_id,
        ':class_id' => $class_id
    ]);
    return $statement->rowCount() > 0;
}

// ========Get students information============
function getStudentInfo(int $student_id, int $id):array
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date, ss.score, sts.document from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    inner join assignments a on a.class_id = c.id
    inner join student_submit sts on sts.user_id = u.id
    inner join assignment_score ss on u.id = ss.user_id
    where u.role = :role and u.id =:student_id and a.id = :ass_id
    order by uj.id desc
    ");

    $statement->execute([
        ":role" => "student",
        ":ass_id"=> $id,
        ":student_id" => $student_id
    ]);
    return $statement->fetch();
}