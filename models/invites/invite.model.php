<?php

//<======== create classes=======>
function createMessage(string $message, int $user_id, int $class_id, int $inviter_id): bool
{
    global $connection;
    $statement = $connection->prepare("insert into invited (message, user_id, class_id, inviter_id) values(:message, :user_id, :class_id, :inviter_id )");
    $statement->execute([
        ":message"=> $message,
        ":user_id"=> $user_id,
        ":class_id"=> $class_id,
        ":inviter_id"=> $inviter_id,
    ]);
    return $statement->rowCount() > 0;
}


// ========Get all students============
function getMessages()
{

    global $connection;
    $statement = $connection->prepare("select i.id, i.inviter_id, u.name, u.id as user_id, c.id as class_id, c.title, i.message from users u
     inner join invited i on i.user_id = u.id
     inner join classes c on i.class_id = c.id 
    ");

    $statement->execute();
    return $statement->fetchAll();
}

//<======== delete class=======>
function deleteMessage(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from invited where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
