<?php

// ===== classs archive =====
function archiveClass(int $id): bool
{
    global $connection;
    try {
        $statement = $connection->prepare("update classes set archive = 1 where id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// =======restore classs from archive page ======
function restoreClass(int $id): bool
{
    global $connection;
    try {
        $statement = $connection->prepare("update classes set archive = 0 where id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//<======== delete archive class =======>
function deleteArchive(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//<======== get archive class=======>
function nounClass(): array
{
    global $connection;
    try {
        $statement = $connection->prepare("select * from classes where archive = :id");
        $statement->execute([
            ':id' => 1
        ]);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// ==== hide class =========
function nounclassHome(): array
{
    global $connection;
    try {
        $statement = $connection->prepare("select * from classes where archive = :id");
        $statement->execute([
            ':id' => 0
        ]);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>

