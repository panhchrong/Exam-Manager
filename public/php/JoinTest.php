<?php


session_start();
include("../../server/database.php");
if (!isset($_SESSION['ID']) || empty($_SESSION['ID'])) {
  header("location: ./login.php");
  exit;
}
if (isset($_POST['searchvalue']) && !empty($_POST['searchvalue'])) {
  $result = searchTest($_POST['searchBy'], $_POST['searchvalue']);
} else $result = getAllTest();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browsing - Public Test</title>
  <?php
  require('../html/header.html');
  ?>
</head>

<body>
  <section>
    <div class="col-md-12 shadow p-3 bg-dark">
      <form action="./JoinTest.php" method="post">
        <div>
          <span>
            <label for="searchby" style="color: white;">Search By</label>
          </span>
          <span>
            <select name="searchBy" id="searchby" class="form-select" style="width:18%">
              <option selected value="testCode">Test Code</option>
              <option value="tblperson.username">Host Name</option>
              <option value="testname">Test Name</option>
            </select>
          </span>
          <div class="mt-4">
            <span>
              <input type="text" name="searchvalue" id="searchbalue">
            </span>
            <span>
              <input type="submit" class="btn btn-success">
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-2-strong">
            <div class="card-body p-0">
              <table class="table table-dark table-hover mb-0">
                <thead style="background-color: #393939;">
                  <tr class="text-uppercase text-success">
                    <th scope="col">Test Code:</th>
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
                  if (!empty($result)) {
                    $now = new DateTime('now', new DateTimeZone("Asia/Phnom_Penh"));
                    foreach ($result as $row) {
                      $startdate = new DateTime($row['TestStartDate'], new DateTimeZone("Asia/Phnom_Penh"));
                      $enddate = new DateTime($row['TestEndDate'], new DateTimeZone("Asia/Phnom_Penh"));
                      if ($enddate->getTimestamp() - $now->getTimestamp() < 0) continue;
                      echo "<tr style='cursor:pointer;'" . "id = '" . $row['testCode'] . "' onclick = 'tryTakeTest(this)'>";
                      echo "<td>" . $row['testCode'] . "</td>";
                      echo "<td>" . $row["Username"] . "</td>";
                      echo "<td>" . $row["testName"] . "</td>";
                      echo "<td>" . $startdate->format('d M Y, h:i') . "</td>";
                      echo "<td>" . $enddate->format('d M Y, h:i') . "</td>";
                      echo "<td>" . $row["testDuration"] . "mn</td>";
                      echo "<td>" . $row["testScore"] . "</td></tr>";
                    }
                  } else echo "<h3 class='test-muted'>No Test Found :(<h3>";
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