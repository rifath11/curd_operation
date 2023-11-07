<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "information";
$conn = mysqli_connect($server,$user,$password,$db);
if($conn){


}else{
    echo 'Not Connected';
}
