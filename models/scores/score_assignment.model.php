<?php

// ========Get score assignment============
function getScoreAssign(int $id)
{

    global $connection;
    $statement = $connection->prepare("select * from assignments where id = :id");
    $statement->execute([
        ":id" => $id
    ]);
    return $statement->fetch();
}
// ========return score assignment============
function returnScore(int $id, int $student_id)
{

    global $connection;
    $statement = $connection->prepare("select * from assignment_score where assignment_id = :id and user_id = :user_id");
    $statement->execute([
        ":id" => $id,
        ":user_id" => $student_id
    ]);
    return $statement->fetch();
}

// ===========Get name student submitted assignment============
function getUserSubmitted(int $id)
{

    global $connection;
    $statement = $connection->prepare("select u.name from student_submit s
    inner join users u on u.id = s.user_id
    ");
    $statement->execute([
        ":id" => $id
    ]);
    return $statement->fetch();
}

function getStudentAssigned(int $class_id)
{

    global $connection;
    $statement = $connection->prepare("select u.id, u.name, u.email, u.image, c.id as class_id , c.title, uj.join_date, s.document from users u 
    inner join users_join_class uj on uj.user_id= u.id
    inner join classes c on uj.class_id = c.id
    inner join assignments a on c.id = a.class_id
    inner join student_submit s on a.id = s.assignment_id
    where u.role = :role and c.id = :id 
    group by u.id 
    ");

    $statement->execute([
        ":role" => "student",
        ":id" => $class_id,

    ]);
    return $statement->fetchAll();
}

function getStudentTurned(int $assignment_id)
{
    global $connection;
    $statement = $connection->prepare("select s.*, u.image, u.name, a.document from student_submit s
    inner join users u on u.id = s.user_id
    inner join assignments a on a.id = s.assignment_id
    where u.role = :role and a.id = :assign_id and s.status = :status
    
    ");

    $statement->execute([
        ":role" => "student",
        ":status" => true,
        ":assign_id" => $assignment_id,

    ]);
    return $statement->fetchAll();
}

function getStudentTurnedIn(int $assignment_id, int $class_id)
{
    global $connection;
    $statement = $connection->prepare("select u.*, uj.turned_in, uj.graded, s.document from users_join_class uj
    inner join classes c on c.id = uj.class_id
    inner join users u on u.id = uj.user_id
    inner join assignments a on a.class_id = c.id
    inner join student_submit s on s.assignment_id = a.id
    where u.role = :role and a.id = :assign_id and uj.class_id = :class_id
    group by u.id
    ");

    $statement->execute([
        ":role" => "student",
        ":assign_id" => $assignment_id,
        ":class_id" => $class_id,
    ]);
    return $statement->fetchAll();
}
function studentTurnIn(int $assignment_id, int $class_id)
{
    global $connection;
    $statement = $connection->prepare("select u.*, uj.turned_in, uj.graded, s.document from users_join_class uj
    inner join classes c on c.id = uj.class_id
    inner join users u on u.id = uj.user_id
    inner join assignments a on a.class_id = c.id
    inner join student_submit s on s.assignment_id = a.id
    where u.role = :role and a.id = :assign_id and uj.class_id = :class_id
    group by u.id
    ");

    $statement->execute([
        ":role" => "student",
        ":assign_id" => $assignment_id,
        ":class_id" => $class_id,
    ]);
    return $statement->fetch();
}

function getUserById($id):array {
    global $connection;

    $statement =  $connection->prepare("select * from users where id=:id");
    $statement->execute([
        ":id" => $id,
    ]);
    return $statement->fetch();
}

// ==== Create assignment score to database ====
function insertAssignScore(int $score, int $user_id, int $assignment_id): bool
{

    global $connection;
    $statement = $connection->prepare("insert into assignment_score (score, user_id, assignment_id) values (:score, :user_id, :assign_id)");
    $statement->execute([
        ":score"=>$score,
        ":user_id"=>$user_id,
        ":assign_id"=>$assignment_id,
        
    ]);
    return $statement->rowCount() > 0;
}

function getStudentGraded($id):array {
    global $connection;

    $statement =  $connection->prepare("select ss.*, u.name, u.image from assignment_score ss inner join users u on u.id = ss.user_id where assignment_id=:id");
    $statement->execute([
        ":id" => $id,
    ]);
    return $statement->fetchAll();
}

function getStudentTurnIn($id):array {
    global $connection;

    $statement =  $connection->prepare("select ss.*, u.name, u.image from student_submit ss inner join users u on u.id = ss.user_id where assignment_id=:id");
    $statement->execute([
        ":id" => $id,
    ]);
    return $statement->fetchAll();
}