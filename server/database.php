<?php
function ConnectToDatabase($dbname)
{
    $servername = 'localhost';
    $username = 'root';
    $conn = new mysqli($servername, $username, '', $dbname);
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    return $conn;
}
