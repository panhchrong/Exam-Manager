<?php
session_start();
include("../../server/database.php");
if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
    $published_test = getPublishedTest($_SESSION['ID']);
    $participated_test = getParticipatedtest($_SESSION['ID']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing <?php echo " - " . $_SESSION['Username'] ?></title>
</head>

<body>
    <style>
        .test-container {
            border: 1px solid orange;
        }

        .test-container:hover {
            transition-duration: 200ms;
            border-color: green;
        }
    </style>
    <?php
    require('../html/header.html');
    include('../html/browse.html')
    ?>
    <div class="container mb-3">
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                New Test
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Join New Test</a>
                <a class="dropdown-item" href="./testmaking.php">Publish Your Own</a>
            </div>
        </div>
        <div class="col-md-12 mt-4 shadow">
            <h2>Test Accepted</h2>
            <hr class="h-0 w-100">
            <div class="row justify-content-center">
                <?php
                if (!empty($participated_test)) {
                    $now = new DateTime();
                    foreach ($participated_test as $test) {
                        $startdate = new DateTime($test['TestStartDate']);
                        $enddate = new DateTime($test['TestEndDate']);
                        if ($enddate->getTimestamp() - $now->getTimestamp() < 0) continue;
                        echo "<div class = 'col-md-3 test-container rounded-2 m-1' id = '" . $test['testCode'] . "' onclick = 'tryTakeTest(this)'>";
                        echo "<p class = 'text-warning'>Test Code: " . $test['testCode'] . "</p>";
                        echo "<hr class = 'h-0 w-100 bg-warning'";
                        echo "<p>Test Name: " . $test['testName'] . "</p>";
                        echo "<p>Time Start: " . $startdate->format('d M Y, h:i') . "</p>";
                        echo "<p>Time End: " . $enddate->format('d M Y, h:i') . "</p>";
                        echo "<p>Host By: " . getUserWithID($test['hostID'])['Username'] . "</p>";
                        echo "</div>";
                    }
                } else
                    echo "<h4 class = 'text-secondary'>Seem like your haven't partake in anything yet</h4>";
                ?>
            </div>
        </div>
        <div class="col-md-12 mt-4 shadow" id="published-test">
            <h2>Test Published</h2>
            <hr class="h-0 w-100">
            <div class="row justify-content-center">
                <?php
                if (!empty($published_test)) {
                    $now = new DateTime();
                    foreach ($published_test as $test) {
                        $startdate = new DateTime($test['TestStartDate']);
                        $enddate = new DateTime($test['TestEndDate']);
                        if ($enddate->getTimestamp() - $now->getTimestamp() < 0) continue;
                        echo "<div class = 'col-md-3 test-container rounded-2 m-1' id = '" . $test['testCode'] . "' onclick = 'tryTakeTest(this)'>";
                        echo "<p class = 'text-warning'>Test Code: " . $test['testCode'] . "</p>";
                        echo "<hr class = 'h-0 w-100 bg-warning'";
                        echo "<p>Test Name: " . $test['testName'] . "</p>";
                        echo "<p>Time Start: " . $startdate->format('d M Y, h:i') . "</p>";
                        echo "<p>Time End: " . $enddate->format('d M Y, h:i') . "</p>";
                        echo "<p>Participant: " . countPaticipant($test['testID'])['x'] . "</p>";
                        echo "</div>";
                    }
                } else
                    echo "<h4 class = 'text-secondary'>Seem like your haven't made anything yet</h4>";
                ?>
            </div>
        </div>
    </div>
    <?php
    require('../html/footer.html');
    ?>
    <script>
        function tryTakeTest(test) {
            window.location = "./TestDetail.php?code=" + test.id;
        }
    </script>
</body>

</html>