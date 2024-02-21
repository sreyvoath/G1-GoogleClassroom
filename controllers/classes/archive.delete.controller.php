<?php
require '../../database/database.php';
require '../../models/archive.model.php';
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id))
{
    
    deleteArchive($id);
    header('Location: /archive');
}