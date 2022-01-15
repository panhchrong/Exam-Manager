<?php
include('database.php');
function tryLogin($email, $password)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tblperson where email = \'' . $email . '\' and _password = \'' . $password . '\'';
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row['id'] . $row['username'] . $row['email'] . $row['_password'];
        return $row;
    } else {
        return null;
    }
}
