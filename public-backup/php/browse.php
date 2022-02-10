<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Host by: Rith Panhapich</p>
                    <p>Test Date: 1/24/2022 3:40</p>
                    <p>End Date: 1/24/2022 5:30</p>
                </div>

            </div>
        </div>
        <div class="col-md-12 mt-4 shadow">
            <h2>Test Published</h2>
            <hr class="h-0 w-100">
            <div class="row justify-content-center">
                <div class="col-md-3 test-container rounded-2 m-1">
                    <p class="text-warning">Test Code: X23bc</p>
                    <hr class="h-0 w-100 bg-warning">
                    <p>Test Name: Javascript</p>
                    <p>Participant: 28</p>
                    <p>Time Start: 1/24/2022 3:40</p>
                    <p>Time End: 1/24/2022 4:30</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('../html/footer.html')
    ?>
</body>

</html>