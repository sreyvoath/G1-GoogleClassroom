<?php require "database/database.php";
require 'models/class.model.php';
$classes = getClasses();
require "views/classes/class_archive.view.php";