<?php
require_once 'Dbconn.php';
unset($_SESSION);
session_destroy();
header("Locaion:register.php");