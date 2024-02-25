<?php
// =========== use for allow the last session ========
session_start();
session_destroy();
header("location:/");