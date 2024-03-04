<?php

require "database/database.php";
require "models/user_join_class/student.model.php";

$students = getStudentsInClass($_SESSION['user']['id']);
require "views/students/student.view.php";