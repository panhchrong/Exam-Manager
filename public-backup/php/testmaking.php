<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Making in progress</title>
    <?php
    require('../html/linker.html')
    ?>
    <script src="../js/test_making_handler.js" defer></script>
</head>

<body>
    <div class="container shadow p-3">
        <h1>Test Making</h1>
        <form id="test-form" action="../../server/NewTest.php" method="post">
            <div id='question-form'>
                <div class="justify-content-center row p-4 rounded">
                    <div id='test-container' class="justify-content-center row">
                        <div class="col-md-11 mt-2 shadow row rounded">
                            <h4>Question 1:</h4>
                            <textarea name="questions[]" class="col-md-12 m-1" type="text" placeholder="Question..." rows="3"></textarea>
                            <input name="option[]" class="col-md-10 m-1" style="height: 30px;" placeholder="Answer Option 1..">
                            <input name="option[]" class="col-md-10 m-1" style="height: 30px;" placeholder="Answer Option 2..">
                            <input name="option[]" class="col-md-10 m-1" style="height: 30px;" placeholder="Answer Option 3..">
                            <input name="option[]" class="col-md-10 m-1" style="height: 30px;" placeholder="Answer Option 4..">
                            <a id="1" class="btn btn-danger" style="color:white !important;" onclick="removeQuestion(this)">Remove</a>
                        </div>
                    </div>
                </div>
                <a class="col-md-12 mt-2 btn btn-secondary" style="color: white !important;" onclick="NewQuestion()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    New Question
                </a>
                <a class="mt-3 btn btn-secondary" href="browse.php">Cancel</a>
                <a class="mt-3 btn btn-success pr-4 pl-4" style="color : white;" onclick="TestValidating()">Next</a>
            </div>
            <hr class="h-1 w-100 mt-4 mb-4">
            <div id="config-form" style="pointer-events: none; opacity : 0.4;">
                <div class="justify-content-center row mt-2 p-4 rounded">
                    <div class="col-md-11 mt-2 row shadow rounded">
                        <h2>Test Configuration</h2>
                        <hr class="h-0 w-70">
                        <div class="form-group">
                            <label for="testname">Test Name: </label>
                            <input type="text" name="testname" id="testname" class="rounded">
                        </div>
                        <div class="form-group">
                            <label for="teststartdate">Test Start Date: </label>
                            <input type="datetime-local" name="teststartdate" id="teststartdate" class="rounded">
                        </div>
                        <div class="form-group">
                            <label for="testenddate">Test End Date: </label>
                            <input type="datetime-local" name="testenddate" id="testenddate" class="rounded">
                        </div>
                        <div class="form-group">
                            <label for="score">Score Per Question: </label>
                            <input type="number" name="score" id="score" class="rounded" placeholder="No floating number">
                        </div>
                        <div class="form-group">
                            <label for="testduration">Test Duration: </label>
                            <input type="number" name="testduration" id="testduration" placeholder="Minutes" class="rounded">
                        </div>
                        <div class="form-group">
                            <label for="public">Make it a Public Test: </label>
                            <input type="checkbox" name="public" id="public">
                        </div>
                        <div class="form-group row">
                            <label for="testdescription">Test Description: </label>
                            <textarea name="testdescription" id="testdescroption" cols="30" rows="5" class="rounded" placeholder="Say something about your test (Optional)..."></textarea>
                        </div>
                    </div>
                </div>
                <a class="mt-3 btn btn-secondary" style="width: 90px; color:white !important;" onclick="EditQuestion()">Back</a>
                <a class="mt-3 btn btn-success pr-4 pl-4" style="color:white" onclick="ConfigValidation()">Submit Test</a>
            </div>
        </form>
    </div>
</body>

</html>