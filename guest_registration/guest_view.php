<?php include('../view/header.php'); ?>

<main>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="guest_add_form">
        <button class="mainButton" type="submit">Add Guest</button>
    </form>
    
    
    <p class="message"><?php if (isset($message)) echo $message; ?></p>
            
        <table class="<?php if (isset($hide)) echo 'hide'; ?>">
            <tr>
                <th>Last</th>
                <th>First</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Ethnicity</th>
                <th>Zip Code</th>
                <th>Subscriber</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($guests as $guest) : ?>
                
                <tr>
                    <td><?php echo $guest['lastName']; ?></td>
                    <td><?php echo $guest['firstName']; ?></td>
                    <td><?php echo $guest['gender']; ?></td>
                    <td><?php echo $guest['age']; ?></td>
                    <td><?php foreach($ethnicities as $ethnicity) if ($ethnicity['ethnicityID'] == $guest['ethnicityID']) echo $ethnicity['ethnicityName']; ?></td>
                    <td><?php echo $guest['zipCode']; ?></td>
                    <td><?php echo $guest['subscriber']; ?></td>
                    <td class="buttonCell">
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="add_guest_session_form">
                            <input type="hidden" name="guestID" value="<?php echo $guest['guestID']; ?>">
                            <button type="submit" class="smallText">Add Session</button>
                        </form>
                    </td>
                    <td class="buttonCell">
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="guest_edit_form">
                            <input type="hidden" name="guestID" value="<?php echo $guest['guestID']; ?>">
                            <button type="submit" class="smallText">Edit</button>
                        </form>
                    </td>
                    <td class="buttonCell">
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="guest_delete_confirm">
                            <input type="hidden" name="guestID" value="<?php echo $guest['guestID']; ?>">
                            <button type="submit" class="smallText delete">Delete</button>
                        </form>
                    </td>

                </tr>
                
                    <?php
                        
                        $guestSessions = get_guestsession($guest['guestID']);
                        
                        foreach($guestSessions as $guestSessionRow): ?>
                            <?php
                                
                                $sessionInfo = get_session($guestSessionRow['sessionID']);
                            ?>
                            <tr>
                            <td colspan="7">&nbsp;</td>
                            
                            <td colspan="2" class="alignLeft">
                                <?php echo $sessionInfo['time'].' Room '.$sessionInfo['roomNum'].' '.$sessionInfo['showCode']?>
                            </td>
                                <td class="buttonCell">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="guest_session_delete">
                                        <input type="hidden" name="guestID" value="<?php echo $guestSessionRow['guestID']; ?>">
                                        <input type="hidden" name="sessionID" value="<?php echo $guestSessionRow['sessionID']; ?>">
                                        <button type="submit" class="smallText delete">X</button>
                                </form>
                                </td>
                            </tr>
                    <?php endforeach; ?>
            
                

            <?php endforeach; ?>

        </table>
    
        
    
    
    
    
</main>
    
<?php include('../view/footer.php'); ?>