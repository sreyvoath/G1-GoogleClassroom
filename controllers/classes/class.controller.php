<?php
require "database/database.php";
require 'models/class.model.php';

$classes = getClasses();
require "views/home/home.view.php";