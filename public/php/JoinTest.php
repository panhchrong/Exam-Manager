<?php
session_start();
include("../../server/database.php");
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
    header("location: ./login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
    require('../html/header.html');
    ?>
</head>
<body>
<section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card shadow-2-strong">
              <div class="card-body p-0">
                  <table class="table table-dark table-hover mb-0">
                    <thead style="background-color: #393939;">
                      <tr class="text-uppercase text-success">
                        <th scope="col">Host by:</th>
                        <th scope="col">Test Name:</th>
                        <th scope="col">Start Time:</th>
                        <th scope="col">End Time:</th>
                        <th scope="col">Duration:</th>
                        <th scope="col">Possible Score:</th>
                      </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = "select * from tbltest inner join tblperson on tbltest.hostID = tblperson.ID";
                            $conn = ConnectToDatabase('examdb');
                            $result = $conn->query($sql);
                            if(!empty($result)){
                                $now = new DateTime();
                                while($row = $result->fetch_assoc()) {
                                    if($row["isPublic"]==false)continue;
                                    $startdate = new DateTime($row['TestStartDate']);
                                    $enddate = new DateTime($row['TestEndDate']);
                                    if ($enddate->getTimestamp() - $now->getTimestamp() < 0) continue;
                                    echo "<tr style='cursor:pointer;'"."id = '" . $row['testCode'] . "' onclick = 'tryTakeTest(this)'>";
                                    echo "<td>".$row["Username"]."</td>";
                                    echo "<td>".$row["testName"]."</td>";
                                    echo "<td>".$startdate->format('d M Y, h:i')."</td>";
                                    echo "<td>".$enddate->format('d M Y, h:i')."</td>";
                                    echo "<td>".$row["testDuration"]."mn</td>";
                                    echo "<td>".$row["testScore"]."</td></tr>";
                                }
                                $conn->close();        
                            }
                        ?>

                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<?php
    require('../html/footer.html');
    ?>
    <script>
        function tryTakeTest(test) {
            window.location = "./TestDetail.php?type=join&code=" + test.id;
        }
    </script>
</body>
</html>