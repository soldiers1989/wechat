<?php
session_start();
$conn = new mysqli('45.77.208.164', 'mysql', 'henryhaha', 'dueape');
if(mysqli_connect_errno())
{
    echo "error";
    echo mysqli_connect_error();
}else{
    echo "ok";
}

