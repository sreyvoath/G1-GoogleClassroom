<?php

require_once "database/database.php";
require_once "models/archive.model.php";

//  call funtion hide class ==========
$classNouns = nounclassHOme();
require "views/home/home.view.php";

?>