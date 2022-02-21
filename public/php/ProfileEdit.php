<?php
session_start();
include '../../server/database.php';
$user = getUserWithID($_SESSION['ID']);
if (empty($user)) {
    header("location: ./login.php");
    exit;
}
$picture = $user['Picture'] == '' ? '../img/profile-pic/profile-alt.png' : '../img/profile-pic/' . $user['Picture'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - <?php echo $_SESSION['Username'] ?></title>
    <?php require('../html/linker.html') ?>
</head>

<body>
    <?php
    require("../html/header.html");
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 rounded shadow p-3 m-4 row justify-content-center">
                <div class="col-md-4">
                    <img src=<?php echo $picture ?> alt="../img/profile-pic/profile-alt.png" class="rounded-circle img-fluid">
                </div>
                <div class="bg-light d-flex justify-content-center">
                    <form action="../../server/ChangePic.php" class="mt-3" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="image" accept="image/png, image/jpeg, image/gif">
                        </div>
                        <div>

                            <input type="submit" class="btn btn-success mt-4" value="change profile picture">
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-10 p-3">
                <a href="./profile.php" class="btn btn-success text-white pl-3 pr-3">Back</a>
            </div>
        </div>
    </div>
    <?php
    require("../html/footer.html");
    ?>
</body>

</html>