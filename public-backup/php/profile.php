<!DOCTYPE html>
<?php
include('../../server/database.php');
session_start();
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
$user_test = getTestResult($user['ID']);
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
    include('../html/profile.html');
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 mt-5 pt-5">
                <div class="shadow row z-depth-3">
                    <div class="col-sm-4 bg-light rounded-left">
                        <div class="card-block text-center text-white">
                            <img src="../img/profile-pic-alt.jpg" class="rounded-circle img-fluid" style="margin-top:4%">
                            <button class="btn btn-success" style="margin: 5%;">Edit Profile</button>
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
                <h3 class="mt-3 text-center">Your Test</h3>
                <form action="TestDetail" method="post" id='Test-Table'>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Test ID</th>
                                <th>Host ID</th>
                                <th>Test Date</th>
                                <th>Submit Date</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($user_test)) {
                                foreach ($user_test as $row) {
                                    echo '<tr id = "' . $row['testID'] . '" onclick = "getTestInfo(this)">';
                                    echo '<td>' . $row['testID'] . '</td>';
                                    echo '<td>' . $row['hostID'] . '</td>';
                                    echo '<td>' . $row['TestDate'] . '</td>';
                                    echo '<td>' . $row['SubmitDate'] . '</td>';
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
            console.log(item.id);
        }
    </script>
</body>

</html>