<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$database = 'agham';

$conn = mysqli_connect($host, $user, $pw, $database);

if (!$conn) {
    echo 'ga konek bro!';
}
