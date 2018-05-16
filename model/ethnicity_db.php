<?php

function get_ethnicities() {
    global $db;
    
    $query = 'SELECT * FROM ethnicity
              ORDER BY ethnicityID';
    $statement = $db->prepare($query);
    $statement->execute();
    $ethnicities = $statement->fetchAll();
    $statement->closeCursor();
    return $ethnicities;
}