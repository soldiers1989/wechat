<?php
session_start();
//$conn = new mysqli('localhost', 'root', '', 'dueape');
$conn = new mysqli('45.32.139.195', 'root', 'henryhaha', 'dueape');
if(mysqli_connect_errno())
{
    echo mysqli_connect_error();
}
//$_SESSION["uid"] = '10000';
//$_SESSION["user_name"] = 'user@123.com';
//$_SESSION["uemail"] = 'user@123.com';