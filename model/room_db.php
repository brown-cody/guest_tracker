<?php

function get_rooms() {
    global $db;
    
    $query = 'SELECT * FROM room
              ORDER BY roomID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}