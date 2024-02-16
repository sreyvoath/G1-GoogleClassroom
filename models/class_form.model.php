<?php
// insert data to into database
function CreateData($class_name,$section,$subject){
    global $connection;
    $statement = $connection->prepare("insert into classroom (class_name, section,subject) values (:class_name, :subject)");
    $statement->execute([
        ':class_name' => $class_name,
        ':section' => $section,
        ':subject' => $subject
    ]);
}
