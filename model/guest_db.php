<?php

function get_last_guest() {
    global $db;
    $query = 'SELECT * FROM guest
              ORDER BY guestID DESC
              LIMIT 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $lastGuest = $statement->fetch();
    $statement->closeCursor();
    return $lastGuest;
}

function get_guest($guestID) {
    global $db;
    $query = 'SELECT * FROM guest
              WHERE guestID = :guestID';
    $statement = $db->prepare($query);
    $statement->bindValue(":guestID", $guestID);
    $statement->execute();
    $guest = $statement->fetch();
    $statement->closeCursor();
    return $guest;
}

function get_guests() {
    global $db;
    
    $query = 'SELECT * FROM guest
              WHERE addedDate=curdate()
              ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->execute();
    $guests = $statement->fetchAll();
    $statement->closeCursor();
    return $guests;
}

function guest_add($firstName, $lastName, $gender, $age, $ethnicityID, $zipCode, $subscriber) {
    global $db;
    $query = 'INSERT INTO guest
                 (addedDate, firstName, lastName, gender, age, ethnicityID, zipCode, subscriber)
              VALUES
                 (now(), :firstName, :lastName, :gender, :age, :ethnicityID, :zipCode, :subscriber)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':ethnicityID', $ethnicityID);
    $statement->bindValue(':zipCode', $zipCode);
    $statement->bindValue(':subscriber', $subscriber);
    $statement->execute();
    $statement->closeCursor();
}

function guest_delete($guestID) {
    global $db;
    $query = 'DELETE FROM guest
              WHERE guestID = :guestID';
    $statement = $db->prepare($query);
    $statement->bindValue(':guestID', $guestID);
    $statement->execute();
    $statement->closeCursor();
}

function guest_edit($guestID, $firstName, $lastName, $gender, $age, $ethnicityID, $zipCode, $subscriber) {
    global $db;
    $query = 'UPDATE guest
              SET firstName = :firstName, lastName = :lastName, gender = :gender, age = :age, ethnicityID = :ethnicityID, zipCode = :zipCode, subscriber = :subscriber
              WHERE guestID = :guestID';
    $statement = $db->prepare($query);
    $statement->bindValue(':guestID', $guestID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':ethnicityID', $ethnicityID);
    $statement->bindValue(':zipCode', $zipCode);
    $statement->bindValue(':subscriber', $subscriber);
    $success = $statement->execute();
    $statement->closeCursor();    
}

function guest_delete_today() {
    global $db;
    $query = 'DELETE FROM guest
              WHERE addedDate = curdate()';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}