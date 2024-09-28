<?php
$dbhost = 'localhost';
$dbuser = 'root';
$password = '';
$dbname = 'smart_home';

$conn = new mysqli($dbhost, $dbuser, $password, $dbname);

if ($conn->connect_error) {
    die('Server Bermasalah');
}
