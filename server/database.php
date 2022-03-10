<?php
function ConnectToDatabase($dbname)
{
    $servername = 'localhost';
    $username = 'root';
    $conn = new mysqli($servername, $username, '', $dbname);
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    return $conn;
}
function getAllTest()
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltest inner join tblperson on tbltest.hostID = tblperson.ID where ispublic = 1';
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function searchTest($searchby, $searchvalue)
{
    $conn = ConnectToDatabase('examdb');
    $query = "select * from tbltest inner join tblperson on tbltest.hostID = tblperson.ID where " . $searchby . " like '%" . $searchvalue . "%' and ispublic = 1";
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function getUserWithEmail($mail)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tblperson where email = ' . $mail;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row['id'] . $row['username'] . $row['email'] . $row['_password'];
        return $row;
    } else {
        return null;
    }
}
function getUserWithID($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tblperson where ID = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row['id'] . $row['username'] . $row['email'] . $row['_password'];
        return $row;
    } else {
        return null;
    }
}
function checkIfResultExist($testid, $perid)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltestresult where perid = ' . $perid . ' and testid = ' . $testid;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
function checkIfTestJoined($testid, $perid)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from testaccepted where perid = ' . $perid . ' and testid = ' . $testid;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
function getTestResultperID($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltestresult inner join tbltest on tbltest.testid = tbltestresult.testid where perid = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function JoinTest($testid, $perid)
{
    $sql = "insert into testaccepted values(" . $perid . ", " . $testid . ", 'ongoing')";
    $conn = ConnectToDatabase('examdb');
    if ($conn->query($sql) === TRUE)
        echo "";
    else echo "Error: " . $sql . "<br>" . $conn->error;
}
function getTestResultID($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltestresult where id = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function getTestResultDetail($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tblreturntest where resultid = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function InsertTest($hostID, $testname, $teststartdate, $testenddate, $testduration, $ispublic, $testscore, $testcode, $testdesc)
{
    $sql = "insert into tbltest values('', " . $hostID . ", '" . $teststartdate . "', '" . $testenddate . "', " . $testduration . ", " . $ispublic . ", " . $testscore . ", '" . $testcode . "', '" . $testname . "', '" . $testdesc . "')";
    $conn = ConnectToDatabase('examdb');
    //$conn->query($sql);
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function InsertQuestion($code, $question, $option1, $option2, $option3, $option4, $correctoption, $score)
{
    $sql = "insert into tblquestions values('', '" . $code . "', '" . addslashes($question) . "', '" . addslashes($option1) . "', '" . addslashes($option2) . "', '" . addslashes($option3) . "', '" . addslashes($option4) . "', '" . $correctoption . "', " . $score . ")";
    $conn = ConnectToDatabase('examdb');
    if ($conn->query($sql) === TRUE) {
    } else echo "Error: " . $sql . "<br>" . $conn->error;
}
function getPublishedTest($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltest where hostid = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    }
    return null;
}
function getTest($id)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltest where testid = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
function getTestCode($code)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tbltest where testcode = \'' . $code . '\'';
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}
function getParticipatedtest($id)
{
    $tests = [];
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from testaccepted where _status = \'ongoing\' and perid = ' . $id;
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($tests, getTest($row['testID']));
        }
        return $tests;
    } else return null;
}
function getQuestion($code)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from tblquestions where testcode = \'' . $code . '\'';
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    } else return null;
}
function countPaticipant($id)
{
    $sql = "select count(*) as x from testaccepted where testid = " . $id;
    $conn = ConnectToDatabase('examdb');
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
function getParticipantDetail($testid)
{
    $conn = ConnectToDatabase('examdb');
    $query = 'select * from testaccepted where testid = \'' . $testid . '\'';
    $result = $conn->query($query);
    if (!empty($result) && $result->num_rows > 0) {
        $query_result = array();
        while ($row = $result->fetch_assoc()) {
            array_push($query_result, $row);
        };
        return $query_result;
    } else return null;
}
function updateTestStatus_Overdue($testid)
{
    $conn = ConnectToDatabase('examdb');
    $query = "update testaccepted set _status = 'overdue' where _status = 'ongoing' and testid = " . $testid;
    $conn->query($query);
}
