<!DOCTYPE html>
<?php
session_start();
//echo '<script>alert(document.cookie);</script>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
        session_destroy();
        unset($_SESSION['ID']);
    }
    echo "<script>alert('alert log out success')</script>";
    header('location: ./Index.html');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <button type="submit">Log out</button>
    </form>
</body>

</html>