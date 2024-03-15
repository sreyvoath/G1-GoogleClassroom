<?php
//======get assignment when students uploaded======>
function teacherGetAssignment($id, $user_id):array
{

    global $connection;
    $statement = $connection->prepare("select * from student_submit where assignment_id =:id and user_id = :user_id");
    $statement->execute([":id" => $id, ":user_id"=> $user_id]);
    return $statement->fetchAll();
}

?>