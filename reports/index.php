<?php
// Get the database connection to guest_tracker
require('../model/database.php');

// Get the models
require('../model/session_db.php');
require('../model/guest_db.php');
require('../model/ethnicity_db.php');
require('../model/guestsession_db.php');
require('../model/room_db.php');
require('../model/report_db.php');
require('count_functions.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'report_list';
    }
}  

$months = array('January'=>"01", 'February'=>"02", 'March'=>"03", 'April'=>"04", 'May'=>"05", 'June'=>"06", 'July'=>"07", 'August'=>"08", 'September'=>"09", 'October'=>"10", 'November'=>"11", 'December'=>"12");

switch ($action) {
    case 'report_list':
        include('report_list.php');
        break;    
    case 'daily_select':        
        include('daily_select.php');
        break;
    case 'daily_report':
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        
        $sessions = get_date_sessions($date);
        if ($sessions == NULL || $sessions == FALSE) {
            $error = 'Please select a day when sessions were run.';
            
            include('daily_select.php');
        } else {
            
            $showCodes = get_showCode_report($date);
            
            
            $showCodeSessions = show_code_count($showCodes, $date);
            $type = 'Daily';
            include('report.php');
        }
            
        break;
    case 'monthly_select':
        
        include('monthly_select.php');
        break;
    case 'monthly_report':
        
        
        $month = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_STRING);
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $date = $year.'-'.$month;
        $dateF = $date.'%';
        
        $sessions = get_date_sessions($dateF);
        if ($sessions == NULL || $sessions == FALSE) {
            $error = 'Please select a month when sessions were run.';
            
            include('monthly_select.php');
        } else {
            
            $showCodes = get_showCode_report($dateF);
            
            $showCodeSessions = show_code_count($showCodes, $dateF);
            $type = 'Monthly';
            include('report.php');
        }
        
        
        break;
    case 'yearly_select':
        include('yearly_select.php');
        break;
    case 'yearly_report':
        
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $date = $year;
        $dateF = $date.'%';
        
        $sessions = get_date_sessions($dateF);
        if ($sessions == NULL || $sessions == FALSE) {
            $error = 'Please select a year when sessions were run.';
            
            include('yearly_select.php');
        } else {
            
            $showCodes = get_showCode_report($dateF);
            
            $showCodeSessions = show_code_count($showCodes, $dateF);
            $type = 'Yearly';
            include('report.php');
        }
        
        
        break;
}
