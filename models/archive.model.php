<?php
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
?>
