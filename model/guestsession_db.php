<?php

function get_guestsession($guestID) {
    global $db;
    $query = 'SELECT * FROM guestsession
              WHERE guestID = :guestID
              ORDER BY sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":guestID", $guestID);
    $statement->execute();
    $guestSessions = $statement->fetchAll();
    $statement->closeCursor();
    return $guestSessions;
}

function get_guestsession_check($sessionID) {
    global $db;
    $query = 'SELECT * FROM guestsession
              WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":sessionID", $sessionID);
    $statement->execute();
    $guestSessions = $statement->fetchAll();
    $statement->closeCursor();
    return $guestSessions;
}


function get_guestsessions() {
    global $db;
    $query = 'SELECT * FROM guestsession
              WHERE addedDate=curdate()
              ORDER BY sessionID';
    $statement = $db->prepare($query);
    $statement->execute();
    $guestSessions = $statement->fetchAll();
    $statement->closeCursor();
    return $guestSessions;
}



function guestsession_add($guestID, $sessionID) {
    global $db;
    $query = 'INSERT INTO guestsession
                 (addedDate, guestID, sessionID)
              VALUES
                 (now(), :guestID, :sessionID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':guestID', $guestID);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->execute();
    $statement->closeCursor();
}

function guestsession_delete($guestID, $sessionID) {
    global $db;
    $query = 'DELETE FROM guestsession
              WHERE guestID = :guestID AND sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':guestID', $guestID);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->execute();
    $statement->closeCursor();
}

function all_guestsession_delete($guestID) {
    global $db;
    $query = 'DELETE FROM guestsession
              WHERE guestID = :guestID';
    $statement = $db->prepare($query);
    $statement->bindValue(':guestID', $guestID);
    $statement->execute();
    $statement->closeCursor();
}

function guestsession_delete_today() {
    global $db;
    $query = 'DELETE FROM guestsession
              WHERE addedDate = curdate()';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}