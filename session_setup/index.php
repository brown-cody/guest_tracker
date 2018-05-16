<?php
// Get the database connection to guest_tracker
require('../model/database.php');

// Get the models
require('../model/session_db.php');
require('../model/guestsession_db.php');
require('../model/room_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'session_view';
    }
}  

switch ($action) {
    case 'session_view':
        
        $sessions = get_sessions();
        
        
        if (count($sessions) == 0) {
            $hide = TRUE;
            $message = 'No sessions have been set up for today.';
        }
        
        
        include('session_view.php');
        break;
        
    case 'session_add_form':
        $rooms = get_rooms();
        include('session_add_form.php');
        break;
    
    case 'session_add' :
        $roomNum = filter_input(INPUT_POST, 'roomNum', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
        $showCode = filter_input(INPUT_POST, 'showCode', FILTER_SANITIZE_STRING);
        $incentive = filter_input(INPUT_POST, 'incentive', FILTER_SANITIZE_STRING);
                
        if ($time == NULL || $time == FALSE) {
            $error = 'Please enter a valid session time.';
            $rooms = get_rooms();
            include('session_add_form.php');
        } else if ($showCode == NULL || $showCode == FALSE) {
            $error = 'Please enter a valid show code.';
            $rooms = get_rooms();
            include('session_add_form.php');
        } else if ($incentive == NULL || $incentive == FALSE) {
            $error = 'Please make an incentive selection.';
            $rooms = get_rooms();
            include('session_add_form.php');
        } else {
            $showCode = strtoupper($showCode);
            session_add($roomNum, $time, $showCode, $incentive);
            $sessions = get_sessions();
            include('session_view.php');
        }
        break;
        
    case 'session_edit_form':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $rooms = get_rooms();
        $sessionInfo = get_session($sessionID);
        
        include('session_edit_form.php');
        break;
    
    case 'session_edit':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $roomNum = filter_input(INPUT_POST, 'roomNum', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
        $showCode = filter_input(INPUT_POST, 'showCode', FILTER_SANITIZE_STRING);
        $incentive = filter_input(INPUT_POST, 'incentive', FILTER_SANITIZE_STRING);
        $sessionInfo = get_session($sessionID);
        $rooms = get_rooms();
                
        if ($time == NULL || $time == FALSE) {
            $error = 'Please enter a valid session time.';
            include('session_edit_form.php');
        } else if ($sessionID == NULL || $sessionID == FALSE) {
            $error = 'Invalid session ID.';
            include('session_edit_form.php');
        } else if ($showCode == NULL || $showCode == FALSE) {
            $error = 'Please enter a valid show code.';
            include('session_edit_form.php');
        } else if ($incentive == NULL || $incentive == FALSE) {
            $error = 'Please make an incentive selection.';
            include('session_edit_form.php');
        } else {
            session_edit($sessionID, $roomNum, $time, $showCode, $incentive);
            $sessions = get_sessions();
            $message = 'Session successfully updated.';
            include('session_view.php');
        }
        break;
    
    case 'session_delete_confirm':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $guestSessions = get_guestsession_check($sessionID);
        
        if ($guestSessions != NULL || $guestSessions != FALSE) {
            $error = 'You cannot delete a session that has registered guests.';
            $sessions = get_sessions();
            include('session_view.php');
        } else {
            $sessionInfo = get_session($sessionID);
            include('session_delete_confirm.php');
        }
        break;
    
    case 'session_delete':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        session_delete($sessionID);
        $sessions = get_sessions();
        
        if (count($sessions) == 0) {
            $hide = TRUE;
            $message = 'No sessions have been set up for today.';
        }
        
        
        $message = 'Session successfully deleted.';
        include('session_view.php');
        break;
        
}
