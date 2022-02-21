<?php
session_start();
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
    header("location: ./login.php");
    exit;
}
$test = null;
$host = null;
$questions = null;
include("../../server/database.php");
if (empty($_GET['code']) && empty($_GET['id'])) {
    echo "ERROR : Empty Test";
} else {
    if (isset($_GET['code']))
        $test = getTestCode($_GET['code']);
    else if (isset($_GET['id']))
        $test = getTest($_GET['id']);
    $host = getUserWithID($test['hostID']);
    $startdate = new DateTime($test['TestStartDate'], new DateTimeZone("Asia/Phnom_Penh"));
    $enddate = new DateTime($test['TestEndDate'], new DateTimeZone("Asia/Phnom_Penh"));
    if (empty($test)) {
        echo "<script>alert('test dose not exist.')</script>";
        header("location: ./browse.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../html/linker.html') ?>
    <title>Test Detail - <?php echo $test['testName'] ?></title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 rounded mt-5 bg-success" style="color : white">
                <h3>Test Details</h3>
            </div>
            <div class="col-md-10 shadow p-3 rounded row">
                <div class="col-md-6 p-2">
                    <p class="text-primary font-weight-bold">Host By: </p>
                    <p><?php echo $host['Username'] ?></p>

                    <p class="text-primary font-weight-bold">Email: </p>
                    <p><?php echo $host['Email'] ?></p>

                </div>
                <div class="col-md-6 p-2">
                    <p class="text-primary font-weight-bold">Test Name: </p>
                    <p><?php echo $test['testName'] ?></p>
                    <p class="text-primary font-weight-bold">Test Start On: </p>
                    <p><?php echo $startdate->format('d M Y, H:i ') ?></p>
                    <p class="text-primary font-weight-bold">Test End On: </p>
                    <p><?php echo $enddate->format('d M Y, H:i ') ?></p>
                    <p class="text-primary font-weight-bold">Duration: </p>
                    <p><?php echo $test['testDuration'] . 'mn' ?></p>
                    <p class="text-primary font-weight-bold">Possible Score: </p>
                    <p><?php echo $test['testScore']  ?></p>
                </div>
                <div class="col-md-6 p-2">
                    <?php
                    if (isset($_GET['code'])) {
                        $startdate = new DateTime($test['TestStartDate'], new DateTimeZone("Asia/Phnom_Penh"));
                        $enddate = new DateTime($test['TestEndDate'], new DateTimeZone("Asia/Phnom_Penh"));
                        $now = new DateTime("now", new DateTimeZone("Asia/Phnom_Penh"));
                        echo "<a class = 'btn btn-danger' href='./browse.php'>Cancel</a>";
                        if (isset($_GET['type']) && $_GET['type'] == 'join' && $_SESSION['ID'] != $test['hostID'] && $enddate->getTimestamp() - $now->getTimestamp() > 0) {
                            echo "<button class='btn btn-success ml-3' id=" . $_GET['code'] . " onclick='JoinTest(this)'>Join</button>";
                        } else if ($_SESSION['ID'] == $test['hostID'])
                            echo "<div class='btn btn-info ml-3'>Participants: " . countPaticipant($test['testID'])['x'] . "</div>";
                        else if ($enddate->getTimestamp() - $now->getTimestamp() < 0)
                            echo "<div class='btn btn-secondary ml-3'>Test Overdued</div>";
                        else if ($startdate->getTimestamp() - $now->getTimestamp() < 0)
                            echo "<button class='btn btn-success ml-3' id=" . $_GET['code'] . " onclick='takeTest(this)'>Proceed</button>";
                        else {
                            $diff = $startdate->getTimestamp() - $now->getTimestamp();
                            echo "<div class='btn btn-info ml-3'>Starts in " . ($diff > 86400 ? round($diff / 86400) . " days " : ($diff > 3600 ? round($diff / 3600) . " hours " : ($diff > 60 ? round($diff / 60) . " Minutes " : "A few seconds")));
                        }
                    } else if (isset($_GET['id'])) {
                        echo "<a class = 'btn btn-success' href='./profile.php'>Back</a>";
                    }
                    ?>

                </div>
            </div>
            <?php
            if ($_SESSION['ID'] == $test['hostID'])
                require('./ParticipantList.php');
            ?>
        </div>
    </div>
    <script>
        function takeTest(code) {
            window.location = "./TestTaking.php?code=" + code.id;
        }

        function JoinTest(code) {
            window.location = "../../server/tryJoinTest.php?code=" + code.id;
        }
    </script>
</body>

</html>