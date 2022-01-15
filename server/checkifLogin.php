<?php
session_start();
include('./trylogin.php');
if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
    header('Location: ../public/profile.php');
    return;
    exit;
} else if (isset($_COOKIE['email']) && !empty($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['password'])) {
    $result = tryLogin($_COOKIE['email'], $_COOKIE['password']);
    if (!empty($result)) {
        header('Location: ../public/login.php');
        exit;
    } else {
        $_SESSION['ID'] = $result['ID'];
        header('Location: ../public/profile.php');
        exit;
    }
} else {
    header('Location: ../public/login.php');
    exit;
}
