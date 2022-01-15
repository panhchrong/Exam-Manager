<?php
session_start();
include('../server/trylogin.php');

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $result = tryLogin($_POST['email'], $_POST['password']);
    if ($result) {
        echo $result['ID'];
        $_SESSION['ID'] = $result['ID'];
        if (isset($_POST['Remember']) && !empty($_POST['Remember'])) {
            setcookie('email', $_POST['email'], time() + 86400 * 30, '/');
            setcookie('password', $_POST['password'], time() + 86400 * 30, '/');
        }
        header('Location: ./index.html');
    } else {
        $msg = 'Incorrect email or password';
    }
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
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <!--Img-->
                <h1>Welcome to Quick-Test</h1>
            </div>
            <div class="col-md-6 col-sm-4">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h3 class="signin-text mb-3">Sign In</h3>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="Remember" class="form-check-input" id="checkbox">
                        <label class="form-checklabel" for="Remember">Remember Me</label>
                    </div>
                    <?php
                    if (isset($msg)) echo '<p style = "color:red">' . $msg . '</p>';
                    ?>
                    <button type="submit" class="btn btn-info">Login</button>
                    <a class="btn button-style" href="Index.html">Cancel</a>
                    <br>
                    <br>
                    <a class="col-md-8 col-sm-6 btn btn-warning" href="./signup.php">Dont have an Account yet?</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        echo '<script>';
        echo 'document.getElementById("email").value = "' . $_COOKIE['email'] . '";';
        echo 'document.getElementById("password").value = "' . $_COOKIE['password'] . '";';
        echo '</script>';
    }
    ?>
</body>

</html>