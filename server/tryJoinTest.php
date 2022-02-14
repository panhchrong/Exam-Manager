<?php
session_start();
if (empty($_POST)) {
    header('location: ../public/');
    exit;
} else if (empty($_SESSION['ID'])) {
    header('location: ../public/login.php');
    exit;
}
echo $_POST['code'];
include('./database.php');
$conn = ConnectToDatabase('examdb');
$sql = "select * from tbltest inner join tblperson on tbltest.hostID = tblperson.ID where tbltest.testcode = '" . $_POST['code'] . "'";
$result = $conn->query($sql);
$test = null;
$msg = "Test Joined Successfully";
$class = "col-md-10 rounded p-3 bg-success";
if (!empty($result) && $result->num_rows > 0) {
    $test = $result->fetch_assoc();
}
//print_r($test);
$startdate = new DateTime($test['TestStartDate'], new DateTimeZone("Asia/Phnom_Penh"));
$enddate = new DateTime($test['TestEndDate'], new DateTimeZone("Asia/Phnom_Penh"));
$now = new DateTime("now", new DateTimeZone("Asia/Phnom_Penh"));
if ($_SESSION['ID'] == $test['hostID']) {
    $msg = 'This is your own test';
    $class = 'col-md-10 rounded p-3 bg-warning';
} else if ($enddate->getTimestamp() - $now->getTimestamp() < 0) {
    $msg = 'This test session is over';
    $class = 'col-md-10 rounded p-3 bg-danger';
} else if (!empty(checkIfResultExist($test['testID'], $_SESSION['ID']))) {
    $msg = 'You have already done this test';
    $class = 'col-md-10 rounded p-3 bg-info';
} else if (!empty(checkIfTestJoined($test['testID'], $_SESSION['ID']))) {
    $msg = 'You have already joined this test';
    $class = 'col-md-10 rounded p-3 bg-info';
} else JoinTest($test['testID'], $_SESSION['ID']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joining Test</title>
    <?php require('../public/html/linker.html') ?>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 rounded mt-5 bg-success">
                <h3 style="color:white">Test Details</h3>
            </div>

            <div class="col-md-10 shadow p-3 rounded row">
                <div class="col-md-6 p-2">
                    <p class="text-primary font-weight-bold">Host By: </p>
                    <p><?php echo $test['ID'] == $_SESSION['ID'] ? $test['Username'] . " (You)" : $test['Username'] ?></p>

                    <p class="text-primary font-weight-bold">Email: </p>
                    <p><?php echo $test['Email'] ?></p>

                </div>
                <div class="col-md-6 p-2">
                    <p class="text-primary font-weight-bold">Test Name: </p>
                    <p><?php echo $test['testName'] ?></p>
                    <p class="text-primary font-weight-bold">Test Start On: </p>
                    <p><?php echo $startdate->format('d M Y, h:i') ?></p>
                    <p class="text-primary font-weight-bold">Test End On: </p>
                    <p><?php echo $enddate->format('d M Y, h:i') ?></p>
                    <p class="text-primary font-weight-bold">Duration: </p>
                    <p><?php echo $test['testDuration'] . 'mn' ?></p>
                    <p class="text-primary font-weight-bold">Possible Score: </p>
                    <p><?php echo $test['testScore']  ?></p>
                </div>
                <a href="../public/php/browse.php" class="btn btn-info p-2">Done</a>
            </div>
            <?php
            echo "<div class='" . $class . "'";
            echo "<h3 style='color:white'>" . $msg . "</h3>";
            echo "</div>";
            ?>
        </div>
    </div>
</body>

</html>