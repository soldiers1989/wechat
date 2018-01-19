<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 22:24
 */
session_start();
$conn = new mysqli('localhost', 'root', '', 'dueape');
$_SESSION["uid"] = 'user@123.com';
$_SESSION["user_name"] = 'user@123.com';
$_SESSION["uemail"] = 'user@123.com';