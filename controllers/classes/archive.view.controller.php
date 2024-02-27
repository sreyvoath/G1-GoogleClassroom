
<?php require "database/database.php";
require 'models/archive.model.php';
require 'models/class.model.php';

// =========== get funtion get class =============
$classes = getClasses($_SESSION['user']['id']);
$classNoun = nounClass();
require "views/classes/class_archive.view.php";
