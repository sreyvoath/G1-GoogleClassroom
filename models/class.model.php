<?php

//<======== get classes=======>
function getClasses(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from classes where user_id = :id order by id desc");
    $statement->execute([":id"=>$id]);
    return $statement->fetchAll();
}

//<======== create classes=======>
function createClass(string $title, string $section, string $subject, int $user_id, string $image, string $code) : bool
{
    global $connection;
    
    $statement = $connection->prepare("insert into classes(title, section, subject, archive, user_id, image, code) values(:title, :section, :subject,  :archive,  :user_id, :image, :code)");
    $statement->execute([
        ':title' => $title,
        ':section' => $section,
        ':subject' => $subject,
        ':user_id' => $user_id,
        ':archive' => 0,
        ':image' => $image,
        ':code' => $code
    ]);
    return $statement->rowCount() > 0;
}

//<======== get single class=======>
function getClass(int $id)
{
    global $connection;
    $statement = $connection->prepare("select * from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}
//<======== get single class=======>
function getClassCode(string $code)
{
    global $connection;
    $statement = $connection->prepare("select * from classes where code = :code");
    $statement->execute([':code' => $code]);
    return $statement->fetch();
}

//<======== update class=======>
function updateClass(string $title, string $section, string $subject, int $id, string $image) : bool
{
    global $connection;
    $statement = $connection->prepare("update classes set title = :title, section = :section, subject = :subject,image = :image where id = :id");
    $statement->execute([
        ':title' => $title,
        ':section' => $section,
        ':subject' => $subject,
        ':id' => $id,
        ':image' => $image
    ]);
    return $statement->rowCount() > 0;
}

//<======== delete class=======>
function deleteClass(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
