<?php
include('./database.php');
$conn = ConnectToDatabase('examdb');
$sql = 'select * from tblperson where email = \'' . $_POST['email'] . '\'';
$result = $conn->query($sql);
if (!empty($result) && $result->num_rows > 0) {
    header('Location: ../public/php/signup.php');
} else echo 'success';
