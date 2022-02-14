<?php
session_start();
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
    header("location: ./login.php");
    exit;
}
?>
<form action="../../server/tryJoinTest.php" method='post'>
    <label for="code">test code: </label>
    <input type="text" name="code" id="code">
    <button type="submit">Join</button>
</form>