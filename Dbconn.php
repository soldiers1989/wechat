<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 22:24
 */
session_start();
//$conn = new mysqli('localhost', 'root', '', 'dueape');
$conn = new mysqli('45.77.208.164', 'mysql', 'henryhaha', 'dueape');

if(mysqli_connect_errno())
{
    echo mysqli_connect_error();
}
$_SESSION["uid"] = '10000';
$_SESSION["user_name"] = 'user@123.com';
$_SESSION["uemail"] = 'user@123.com';