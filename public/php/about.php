<!DOCTYPE html>
<html lang="en">

<head>

</head>
<?php require("../../server/database.php");?>
<?php require('../html/header.html'); ?>
<?php include('../html/about.html');  ?>
<?php require('../html/footer.html'); ?>
<?php    
    function countTBL($tbl)
    {
        $sql = "select * from ".$tbl;
        $conn = ConnectToDatabase('examdb');
        $result = $conn->query($sql);
        return mysqli_num_rows($result);
    }
    echo '<script>
        document.getElementById("Happy_Clients").innerHTML = '.countTBL("tblperson").';
        document.getElementById("Assigned_Exams").innerHTML = '.countTBL("tbltest").';
        document.getElementById("Questions_Posted").innerHTML = '.countTBL("tblquestions").';
    </script>';
?>
</html>