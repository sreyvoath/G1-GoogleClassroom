<?php

require "database/database.php";
require "models/user_join_class/teacher.model.php";


$teachers = getTeachers();
echo "Welcome to teacher join class!";
// require "views/teacher/teacher.view.php";