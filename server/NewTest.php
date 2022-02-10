<?php
session_start();
include('./database.php');
$date = new DateTime('2020-02-03T5:00');
$date2 = new DateTime('2020-04-04T7:21');
$interval = $date->diff($date2);
function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function CaculateScore()
{
    $score = 0;
    foreach ($_POST['questions'] as $s)
        $score += $_POST['score'];
    return $score;
}
function getCheckBoxValue()
{
    return $_POST['public'] == true ? 1 : 0;
}
$code = generateRandomString(8);
InsertTest($_SESSION['ID'], $_POST['testname'], $_POST['teststartdate'], $_POST['testenddate'], $_POST['testduration'], getCheckBoxValue(), CaculateScore(), $code, $_POST['testdescription']);
for ($i = 0; $i < sizeof($_POST['questions']); $i++) {
    InsertQuestion($code, $_POST['questions'][$i], $_POST['option'][($i * 4) + 0], $_POST['option'][($i * 4) + 1], $_POST['option'][($i * 4) + 2], $_POST['option'][($i * 4) + 3], $_POST['correctoption'][$i], $_POST['score']);
}
//echo $interval->format('%R%a days and %H hours and %I minutes');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require('../public/html/linker.html');
    ?>
    <title>Test Processing</title>
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron row justify-content-center bg-light">
            <div class="col-md-6 rounded shadow mt-5">
                <div class="mt-3 p-3 bg-success rounded">
                    <h1 style="color:white">Test Created Successfully !!</h1>
                </div>
                <hr class="h-0 w-100 bg-secondary">
                <h3>Here's your test code: </h3>
                <center>
                    <h2 style="color:green" id='code'><?php echo  $code ?></h2>
                    <button id='copy' class="btn btn-default" onclick="CopyToClipboard()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </button>
                </center>
                <hr class="h-0 w-100 bg-secondary">
                <a href="../public/php/" class="btn btn-success btn-lg mb-3">Homepage</a>
            </div>
        </div>
    </div>
    <script>
        function CopyToClipboard() {
            var code = document.getElementById('code');
            navigator.clipboard.writeText(code.innerHTML)
            document.getElementById('copy').className = 'btn btn-success rounded';
        }
    </script>
</body>

</html>