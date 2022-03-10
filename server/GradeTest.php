<?php
session_start();
include('./database.php');
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
    header("location: ../public/php/login.php");
    exit;
}
//print_r($_POST);
$questions = getQuestion($_GET['code']);
$test = getTestCode($_GET['code']);
$conn = ConnectToDatabase('examdb');
$conn->query('update testaccepted set _status = "completed" where perid = ' . $_SESSION['ID'] . ' and testid = ' . $test['testID']);
$num = 1;
$score = 0;
foreach ($questions as $question) {
    if (isset($_POST['choosedoption' . $num]) && $_POST['choosedoption' . $num] == $question['correctedOption']) {
        //echo 'correct';
        $score += $question['score'];
    }
    //echo $score;
    $num++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../public/html/linker.html') ?>
    <title>Your Grade</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-5 shadow rounded mt-4 justify-content-center">
            <div class="col-md-12 p-3 bg-success">
                <h4 style="color:white">
                    Your Grade
                </h4>
            </div>
            <center class="p-4">
                <?php
                $maxscore = $questions[0]['score'] * count($questions);
                $style = "";
                if ($score == $maxscore) $style = "color:gold";
                else if ($score < $maxscore && $score > round($maxscore / 2)) $style = "color:green";
                else $style = "color:red";
                echo '<h2 style="' . $style . '">' . $score . '/' . $maxscore . '</h2>';
                if (empty(checkIfResultExist($test['testID'], $_SESSION['ID']))) {
                    $now = new DateTime('now', new DateTimeZone("Asia/Phnom_Penh"));
                    $conn->query("insert into tbltestresult values('', " . $_SESSION['ID'] . ", " . $test['testID'] . ", '" . $now->format('Y-m-d\TH:i') . "', " . $score . ")");
                }
                ?>
            </center>
            <div class="col-md-12 p-3 bg-light">
                <a href="../public/php/" class="btn btn-success">Back To Homepage</a>
            </div>
        </div>
    </div>
</body>

</html>