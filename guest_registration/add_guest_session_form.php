<?php include('../view/header.php'); ?>

<main>
    <h2>Add Guest Session</h2>
    <p class="error"><?php if (isset($error) == TRUE) echo $error; ?></p>
    <form class="bigMainForm" action="index.php" method="post">
        <input type="hidden" name="action" value="add_guest_session">
        <input type="hidden" name="guestID" value="<?php echo $guest['guestID']; ?>">
        
        <label class="name"><?php echo $guest['firstName'].' '.$guest['lastName']; ?></label>
        <br><br>
        
        <label>Session:</label>
        <select name="sessionID" class="bigSelectBox">
                
            <?php foreach($sessions as $session): ?>
                                                        
                    <option value="<?php echo $session['sessionID']; ?>">

                        <?php echo $session['time'].' Room '.$session['roomNum'].' '.$session['showCode']; ?>

                    </option>
                
            <?php endforeach; ?>
            
        </select>
        <br>
        <br>
        <br>
        
        <button type="submit" class="mainButton">Submit</button>

    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>