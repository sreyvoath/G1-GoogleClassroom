<?php

require "database/database.php";
require "models/user_join_class/student.model.php";

$students = getStudents();
require "views/students/student.view.php";