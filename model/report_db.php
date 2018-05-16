<?php

function get_daily_session_report($date) {
     global $db;
    
    $query = 'SELECT * FROM session
              WHERE addedDate=:date 
              ORDER BY showCode';
    $statement = $db->prepare($query);
    $statement->bindValue(":date", $date);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

/*function get_daily_showCode_report($date) {
    global $db;
    
    $query = 'SELECT DISTINCT showCode FROM session
              WHERE addedDate=:date
              ORDER BY showCode';
    $statement = $db->prepare($query);
    $statement->bindValue(":date", $date);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}*/

function get_showCode_report($date) {
    global $db;
    
    $query = 'SELECT DISTINCT showCode FROM session
              WHERE addedDate LIKE :date
              ORDER BY showCode';
    $statement = $db->prepare($query);
    $statement->bindValue(":date", $date);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

function get_showcode_session($showCode) {
    global $db;
    
    $query = 'SELECT * FROM session
              WHERE showCode=:showCode
              LIMIT 1';
    $statement = $db->prepare($query);
    $statement->bindValue(":showCode", $showCode);
    $statement->execute();
    $session = $statement->fetch();
    $statement->closeCursor();
    return $session;
}

function get_daily_sessionID_report($date, $showCode) {
    global $db;
    
    $query = 'SELECT sessionID FROM session
              WHERE addedDate=:date and showCode=:showCode
              ORDER BY showCode';
    $statement = $db->prepare($query);
    $statement->bindValue(":date", $date);
    $statement->bindValue(":showCode", $showCode);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

function get_sessionID_report($date, $showCode) {
    global $db;
    
    $query = 'SELECT sessionID FROM session
              WHERE addedDate LIKE :date AND showCode=:showCode
              ORDER BY showCode';
    $statement = $db->prepare($query);
    $statement->bindValue(":date", $date);
    $statement->bindValue(":showCode", $showCode);
    $statement->execute();
    $sessions = $statement->fetchAll();
    $statement->closeCursor();
    return $sessions;
}

function get_daily_guestsessions($sessionID) {
    global $db;
    
    $query = 'SELECT * FROM guestsession
              WHERE sessionID=:sessionID
              ORDER BY guestID';
    $statement = $db->prepare($query);
    $statement->bindValue(":sessionID", $sessionID);
    $statement->execute();
    $guestSessions = $statement->fetchAll();
    $statement->closeCursor();
    return $guestSessions;
}

function get_daily_guest_report($date) {
    global $db;
    
    $query = $guestStatement;
    $statement = $db->prepare($query);
    $statement->execute();
    $guests = $statement->fetchAll();
    $statement->closeCursor();
    return $guests;
}