<!DOCTYPE html>
<?php
include('../../server/database.php');
session_start();
if (!isset($_SESSION['ID']) && empty($_SESSION['ID']))
    header("Location: ./login.php");
//echo '<script>alert(document.cookie);</script>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
        session_destroy();
        unset($_SESSION['ID']);
    }
    echo "<script>alert('alert log out success')</script>";
    header('location: ./Index.php');
}
$user = getUserWithID($_SESSION['ID']);
$profile_pic = $user['Picture'] == '' ? '../img/profile-pic/profile-alt.png' : '../img/profile-pic/' . $user['Picture'];
$user_test = getTestResultperID($user['ID']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>' . $user['Username'] . '\'s profile</title>';
    ?>
</head>

<body class="bg-light">
    <?php
    require('../html/header.html');
    include('../html/profile.html')
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 mt-5 pt-5">
                <div class="shadow row z-depth-3">
                    <div class="col-sm-4 bg-light rounded-left">
                        <div class="card-block text-center text-white">
                            <img src=<?php echo $profile_pic ?> class="rounded-circle img-fluid" style="margin-top:4%; width:350px; height:350px">
                            <a href="./ProfileEdit.php" class="btn btn-success" style="margin: 5%;">Change Profile Picture</a>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">User Profile's info</h3>
                        <hr class="badge-secondary mt-0 w-40">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Username</p>
                                <h5 class="text-muted"><?php echo $user['Username'] ?></h5>
                            </div>
                            <div class="col-sm-8">
                                <p class="font-weight-bold">Email</p>
                                <h5 class=" text-muted"><?php echo $user['Email'] ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow col-md-10 mt-5 pt-5 rounded">
                <h3 class="mt-3 text-center">Test You Participated</h3>
                <form action="TestDetail.php" method="post" id='Test-Table'>
                    <table class="table table-striped table-hover" id='result'>
                        <?php
                        if (!empty($user_test)) {

                            echo '<thead>';
                            echo '<tr class="text-success">';
                            echo '<th>Test Name</th>';
                            echo '<th>Submit Date</th>';
                            echo '<th>Score</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            foreach ($user_test as $row) {
                                $date = new DateTime($row['SubmitDate'], new DateTimeZone("Asia/Phnom_Penh"));
                                echo '<tr id = "' . $row['testID'] . '" onclick = "getTestInfo(this)" style="cursor:pointer;">';
                                echo '<td>' . $row['testName'] . '</td>';
                                echo '<td>' . $date->format('d M Y, H:i') . '</td>';
                                echo '<td>' . $row['score'] . '</td>';
                                echo '</tr>';
                            }
                        } else echo '<h6 class = "text-muted">Seem like you haven\'t done any test yet.</h6>';
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="shadow col-md-10 p-5">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <button class="btn btn-info col-md-3" type="submit">Log out</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    require('../html/footer.html');
    ?>
    <script>
        function getTestInfo(item) {
            document.getElementById('Test-Table').setAttribute('action', 'TestDetail.php?id=' + item.id);
            document.getElementById('Test-Table').submit();
        }
    </script>
</body>

</html>