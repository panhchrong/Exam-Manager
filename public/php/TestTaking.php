<?php
session_start();
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
    header("location: ./login.php");
    exit;
}
include("../../server/database.php");
$questions = null;
$testCode = $_GET['code'];
$questions = getQuestion($testCode);
$test = getTestCode($testCode);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing is in progress</title>
    <script src="../js/test_taking_handler.js" defer></script>
    <?php require("../html/linker.html") ?>
</head>

<body>
    <div class="col-md-12 bg-success p-3" style="position: fixed; top : 0; color:white;">
        <h5 id='timer'><?php echo $test['testDuration']; ?></h5>
        <h5 id='answered'><?php echo count($questions) ?></h5>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container justify-content-center" id='container'>
        <?php
        echo "<form action='../../server/GradeTest.php?code=" . $testCode . "' method='post' id='test-form'>";
        $num = 1;
        foreach ($questions as $question) {
            echo "<div class = 'col-md-12 shadow rounded p-3 mb-4 row'>";
            echo "<div class = 'col-md-12'>";
            echo "<p>" . $num . ". " . htmlspecialchars($question['question']) . "</p><br>";
            echo "</div>";
            //echo "<div class='form-check'";
            echo "<p class='ml-3'><input type = 'radio' class='form-check-input' id = 'choosedoption' value = 'a' name = 'choosedoption" . $num . "'> " . htmlspecialchars($question['option1']) . " </p>";
            echo "<p class='ml-3'><input type = 'radio' class='form-check-input' id = 'choosedoption' value = 'b' name = 'choosedoption" . $num . "'> " . htmlspecialchars($question['option2']) . " </p>";
            echo "<p class='ml-3'><input type = 'radio' class='form-check-input' id = 'choosedoption' value = 'c' name = 'choosedoption" . $num . "'> " . htmlspecialchars($question['option3']) . " </p>";
            echo "<p class='ml-3'><input type = 'radio' class='form-check-input' id = 'choosedoption' value = 'd' name = 'choosedoption" . $num . "'> " . htmlspecialchars($question['option4']) . " </p>";
            //echo "</div>";
            echo "</div>";
            $num++;
        }
        echo "<div class='col-md-12 shadow rounded p-3'>";
        echo "<button type='submit' class='btn btn-success'>Submit</button>";
        echo "</div>";
        echo "</form>";
        ?>
    </div>
</body>

</html>