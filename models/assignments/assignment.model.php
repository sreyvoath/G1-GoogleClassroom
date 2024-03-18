<?php

// ==== Create assignment insert to database ====
function createAssign(string $title, string $content, string $document, string $filepath, int $score, string $end_date, string $end_time, int $class_id): bool
{

    global $connection;
    $statement = $connection->prepare("insert into assignments (title, content, document,filepath, score, end_date, end_time, class_id) values (:title, :content, :document, :filepath, :score, :end_date, :end_time, :class_id)");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':document' => $document,
        ':filepath' => $filepath,
        ':score' => $score,
        ':end_date' => $end_date,
        ':end_time' => $end_time,
        ':class_id' => $class_id,
    ]);
    return $statement->rowCount() > 0;
}

// ========Get single assignment============
function getAssign(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from assignments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// ========Get all assignments by id class============
function getAssigns($id): array
{

    global $connection;
    $statement = $connection->prepare("select * from assignments where class_id=:id order by id desc");
    $statement->execute([":id" => $id]);
    return $statement->fetchAll();
}

// ========Get all assignments============
function getAssignments()
{

    global $connection;
    $statement = $connection->prepare("select * from assignments order by id desc");
    $statement->execute();
    return $statement->fetchAll();
}


// ========Update  assignment============
function updateAssign(string $title, string $content,int $score, string $end_date, string $end_time, int $class_id, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update assignments set title = :title, content = :content,score=:score, end_date=:end_date, end_time=:end_time, class_id= :class_id where id = :id");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':score' => $score,
        ':end_date' => $end_date,
        ':end_time' => $end_time,
        ':class_id' => $class_id,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}
// ========Update new file assignment============
function uploadNewFile(string $title, string $content, string $document, string $filepath,int $score, string $end_date, string $end_time, int $class_id, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update assignments set title = :title, content = :content, document=:document ,filepath=:filepath, score=:score, end_date=:end_date, end_time=:end_time, class_id= :class_id where id = :id");
    $statement->execute([
        ':title' => $title,
        ':content' => $content,
        ':document' => $document,
        ':filepath' => $filepath,
        ':score' => $score,
        ':end_date' => $end_date,
        ':end_time' => $end_time,
        ':class_id' => $class_id,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}

// ========Delete assignment============
function deleteAssign(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from assignments where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// ========Delete assignment============
function deleteAssignJoin(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from assignments where class_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//======get assignment when students uploaded======>
function getAssignmentsStudents($id, $user_id):array
{

    global $connection;
    $statement = $connection->prepare("select * from student_submit where assignment_id =:id and user_id = :user_id");
    $statement->execute([":id" => $id, ":user_id"=> $user_id]);
    return $statement->fetchAll();
}


//====== when students upload assignment======>
function studentUpload(string $document, string $filepath,int $assignment_id, int $user_id): bool
{

    global $connection;
    $statement = $connection->prepare("insert into student_submit (document,filepath,assignment_id, user_id, status) values (:document, :filepath,:assignment_id, :user_id, :status)");
    $statement->execute([
        ':document' => $document,
        ':filepath' => $filepath,
        ':assignment_id' =>$assignment_id,
        ':user_id' =>$user_id,
        ':status' =>false
    ]);
    return $statement->rowCount() > 0;
}

// ========Delete assignment============
function deleteAssignUplaod(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from student_submit where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// ========Update  status uplaod ============
function updateAssignStatus(int $id, bool $status,): bool
{
    global $connection;
    $statement = $connection->prepare("update student_submit set status = :status where id = :id");
    $statement->execute([
        ':status' => $status,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}

//======get assignment when students uploaded======>
function getStudentsSubmitted(int $assignment_id):array
{

    global $connection;
    $statement = $connection->prepare("select s.*, u.name, u.image from student_submit s
    inner join users u on u.id = s.user_id
    where s.assignment_id =:id");
    $statement->execute([":id" => $assignment_id]);
    return $statement->fetchAll();
}

// ========Update  status uplaod ============
function updateStudentStatus(int $id, bool $status,): bool
{
    global $connection;
    $statement = $connection->prepare("update users_join_class set turned_in = :status where user_id = :id");
    $statement->execute([
        ':status' => $status,
        ':id' => $id,
    ]);
    return $statement->rowCount() > 0;
}
