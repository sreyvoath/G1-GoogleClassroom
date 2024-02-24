
<?php require "database/database.php";
require 'models/archive.model.php';
require 'models/class.model.php';
$classes=getClasses();
$classNoun = nounClass();
require "views/classes/class_archive.view.php";