<?php

function get_session($sessionID) {
    global $db;
    $query = 'SELECT * FROM session
              WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":sessionID", $sessionID);
    $statement->execute();
    $sessionInfo = $statement->fetch();
    $statement->closeCursor();
    return $sessionInfo;
}

function get_sessions() {
    global $db;
    
    $query = 'SELECT * FROM session
              WHERE addedDate=curdate()
              ORDER BY time';
    $statement = $db->prepare($query);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

function get_sessions_ID() {
    global $db;
    
    $query = 'SELECT * FROM session
              WHERE addedDate=curdate()
              ORDER BY sessionID';
    $statement = $db->prepare($query);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

/*function get_date_sessions($date) {
    global $db;
    
    $query = 'SELECT * FROM session
              WHERE addedDate=:date
              ORDER BY time';
    $statement = $db->prepare($query);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}*/

function get_date_sessions($date) {
    global $db;
    
    $query = 'SELECT * FROM session
              WHERE addedDate LIKE :date
              ORDER BY time';
    $statement = $db->prepare($query);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

function session_add($roomNum, $time, $showCode, $incentive) {
    global $db;
    $query = 'INSERT INTO session
                 (addedDate, roomNum, time, showCode, incentive)
              VALUES
                 (now(), :roomNum, :time, :showCode, :incentive)';
    $statement = $db->prepare($query);
    $statement->bindValue(':roomNum', $roomNum);
    $statement->bindValue(':time', $time);
    $statement->bindValue(':showCode', $showCode);
    $statement->bindValue(':incentive', $incentive);
    $statement->execute();
    $statement->closeCursor();
}

function session_delete($sessionID) {
    global $db;
    $query = 'DELETE FROM session
              WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->execute();
    $statement->closeCursor();
}

function session_edit($sessionID, $roomNum, $time, $showCode, $incentive) {
    global $db;
    $query = 'UPDATE session
              SET roomNum = :roomNum, time = :time, showCode = :showCode, incentive = :incentive
              WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->bindValue(':roomNum', $roomNum);
    $statement->bindValue(':time', $time);
    $statement->bindValue(':showCode', $showCode);
    $statement->bindValue(':incentive', $incentive);
    $success = $statement->execute();
    $statement->closeCursor();    
}

function session_delete_today() {
    global $db;
    $query = 'DELETE FROM session
              WHERE addedDate = curdate()';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}