<?php
require '../../database/database.php';
require '../../models/invites/invite.model.php';

// ========check class id =======
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id)) {

    deleteMessage($id);
    header('Location: /home');
}
?>