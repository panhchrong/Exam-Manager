<?php
$participants = getParticipantDetail($test['testID']);
if (empty($participants)) exit;
?>
<div class="col-md-10 p-3 mt-4 shadow rounded bg-success">
    <h3 style="color: white;">Participant List</h3>
</div>
<div class="col-md-10 p-3 shadow rounded">
    <?php
    echo "<table class='table table-striped'>";
    echo "<tr>";
    echo "<th>Test Taker Name</th>";
    echo "<th>Email</th>";
    echo "<th>Test Status</th>";
    echo "<th>Submit Date</th>";
    echo "<th>Score</th>";
    echo "</tr>";
    foreach ($participants as $p) {
        $person = getUserWithID($p['perID']);
        $result = checkIfResultExist($p['testID'], $p['perID']);
        echo "<tr>";
        echo "<td>" . $person['Username'] . "</td>";
        echo "<td>" . $person['Email'] . "</td>";
        echo "<td>" . $p['_status'] . "</td>";
        if (empty($result)) {
            echo "<td> - </td>";
            echo "<td> - </td>";
        } else {
            $date = new DateTime($result['SubmitDate']);
            echo "<td>" . $date->format('d M Y, h:i') . "</td>";
            echo "<td>" . $result['score'] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>