<?php
require '../../database/database.php';
require '../../models/class.model.php';
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id))
{
    
    deleteClass($id);
    header('Location: /home');
}