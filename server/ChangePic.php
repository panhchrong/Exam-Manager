<?php
session_start();
include './database.php';
if ($_FILES['image']['error'] > 0) {
    header('location: ../public/php/ProfileEdit.php');
    exit;
} else {
    $image = $_FILES['image'];
    $name = $_SESSION['ID'] . $image['name'];
    $conn = ConnectToDatabase('examdb');
    $sql = "update tblperson set picture = '" . $name . "' where id = " . $_SESSION['ID'];
    $conn->query($sql);
    $conn->close();
    unlink('../public/img/profile-pic/' . $_SESSION['Picture']);
    move_uploaded_file($image['tmp_name'], "../public/img/profile-pic/" . $_SESSION['ID'] . $image['name']);
    header('location: ../public/php/ProfileEdit.php');
    exit;
}
