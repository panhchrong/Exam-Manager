<?php
session_start();
include('../../server/database.php');
$conn = ConnectToDatabase('examdb');
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['email'])) {
    $sql = 'select * from tblperson where email = \'' . $_POST['email'] . '\'';
    $result = $conn->query($sql);
    if (!empty($result) && $result->num_rows > 0) {
        echo '<script>alert("This Email is taken please try another")</script>';
    } else {
        $sql = 'INSERT INTO tblperson(Username, Email, _Password) VALUES (\'' . $_POST['username'] . '\',\'' . $_POST['email'] . '\',\'' . $_POST['password'] . '\')';
        if ($conn->query($sql) === TRUE) {
            header('Location: ./login.php');
        }
    }
    $_POST['email'] = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 col-sm-4">
                <form action="./signup.php" method="post" id='signup'>
                    <h3 class="signin-text mb-3">Sign Up</h3>
                    <div class="form-group">
                        <label for="usernmae">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="retypepassword">Retype Password</label>
                        <input type="password" name="retypepassword" class="form-control" id="retypepassword">
                    </div>
                    <p id='err-msg' style="color:red"></p>
                    <a style="color:white !important" class="btn btn-info" onclick="validateInfo()">Sign Up</a>
                    <a class="btn button-style" href="Index.php">Cancel</a>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (!empty($_POST['username'])) echo '<script>document.getElementById(\'username\').value = \'' . $_POST['username'] . '\'</script>';
    if (!empty($_POST['password'])) echo '<script>document.getElementById(\'password\').value = \'' . $_POST['password'] . '\'</script>';
    if (!empty($_POST['retypepassword'])) echo '<script>document.getElementById(\'retypepassword\').value = \'' . $_POST['retypepassword'] . '\'</script>';
    unset($_POST['retypepassword']);
    unset($_POST['password']);
    unset($_POST['username']);

    ?>
    <script>
        var password = document.getElementById('password');
        var retypepassword = document.getElementById('retypepassword');
        var email = document.getElementById('email');
        var username = document.getElementById('username');

        function validatePassword() {
            if (password.value.length < 8) {
                document.getElementById('err-msg').innerHTML = "Password must be atleast 8 characters long";
                return false
            }
            return true
        }

        function checkRetypePassword() {
            if (password.value != retypepassword.value) {
                retypepassword.style = 'border-color : red !important';
                password.style = 'border-color : red !important';
                return false
            } else {
                password.style = 'border-color : green !important';
                retypepassword.style = 'border-color : green !important';
                return true
            }
        }

        function validateInfo() {
            if (password.value == '' || retypepassword.value == '' || email.value == '' || username.value == '') {
                document.getElementById('err-msg').innerHTML = 'You must complete the sign up form before submit';
                return;
            } else if (!checkRetypePassword()) {} else
                document.getElementById('signup').submit();
        }
        password.onchange = validatePassword;
        retypepassword.onchange = checkRetypePassword;
    </script>
</body>

</html>