<?php

function show_code_count($showCodes, $date) {
    $showCodeSessions = array();
    foreach ($showCodes as $showCode) {
            //echo '<br>'.$showCode['showCode'].'<br>';

            $male = 0;
            $female = 0;
            $a1824 = 0;
            $a2534 = 0;
            $a3549 = 0;
            $a50 = 0;
            $e1 = 0;
            $e2 = 0;
            $e3 = 0;
            $e4 = 0;
            $e5 = 0;
            $yes = 0;
            $no = 0;

            $sessionIDs = get_sessionID_report($date, $showCode['showCode']);
            foreach ($sessionIDs as $sessionID) {
                //echo $sessionID['sessionID'].'<br>';

                $guestSessions = get_daily_guestsessions($sessionID['sessionID']);
                foreach ($guestSessions as $guestSession) {
                    //echo $guestSession['guestID'];

                    $guest = get_guest($guestSession['guestID']);

                    if ($guest['gender'] == 'Male')
                        $male++;
                    else if ($guest['gender'] == 'Female')
                        $female++;

                    if ($guest['age'] <= 24)
                        $a1824++;
                    else if ($guest['age'] <= 34)
                        $a2534++;
                    else if ($guest['age'] <= 49)
                        $a3549++;
                    else if ($guest['age'] >= 50)
                        $a50++;

                    if ($guest['ethnicityID'] == 1)
                        $e1++;
                    else if ($guest['ethnicityID'] == 2)
                        $e2++;
                    else if ($guest['ethnicityID'] == 3)
                        $e3++;
                    else if ($guest['ethnicityID'] == 4)
                        $e4++;
                    else if ($guest['ethnicityID'] == 5)
                        $e5++;

                    if ($guest['subscriber'] == 'Yes')
                        $yes++;
                    else if($guest['subscriber'] == 'No')
                        $no++;
                }
            }
            $sessionData = get_showcode_session($showCode['showCode']);
            array_push($showCodeSessions, array(
                'showCode' => $sessionData['showCode'],
                'incentive' => $sessionData['incentive'],
                'Male' => $male,
                'Female' => $female,
                '18-24' => $a1824,
                '25-34' => $a2534,
                '35-49' => $a3549,
                '50+' => $a50,
                'White' => $e1,
                'Hispanic' => $e2,
                'Black' => $e3,
                'Asian' => $e4,
                'Native American' => $e5,
                'Yes' => $yes,
                'No' => $no));

        }

        return $showCodeSessions;
    }
    

