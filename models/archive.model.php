<?php
//<========if archive = 1 the classes is archived======>
function archiveClass(int $id): bool
{
    global $connection;
    try {
        $statement = $connection->prepare("UPDATE classes SET archive = 1 WHERE id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//<========if archive = 0 is not archive=======>
function restoreClass(int $id): bool
{
    global $connection;
    try {
        $statement = $connection->prepare("UPDATE classes SET archive = 0 WHERE id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function deleteArchive(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classes where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

function nounClass(): array
{
    global $connection;
    try {
        $statement = $connection->prepare("SELECT * FROM classes WHERE archive = :id");
        $statement->execute([
            ':id' => 1
        ]);
        return $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>

