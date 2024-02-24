<?php
// function get category
function getCategories() : array
{
    global $connection;
    $statement = $connection->prepare("select * from categories");
    $statement->execute();
    return $statement->fetchAll();
}

?>