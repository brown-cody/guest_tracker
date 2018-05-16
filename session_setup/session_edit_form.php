<?php include('../view/header.php'); ?>

<main>
    <h2>Edit Session</h2>
    <p class="error"><?php if (isset($error) == TRUE) echo $error; ?></p>
    <form class="mainForm" action="index.php" method="post">
        <input type="hidden" name="action" value="session_edit">
        <label>Room:</label>
        <select name="roomNum">
            <?php foreach($rooms as $room): ?>
                <option value="<?php echo $room['roomNum']; ?>" <?php if ($room['roomNum'] === $sessionInfo['roomNum']) {echo 'selected';} ?> >
                    <?php echo $room['roomNum']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>Time:</label>
        <input type="time" name="time"  value="<?php echo $sessionInfo['time']; ?>">
        <br>
                
        <label>Show Code:</label>
        <input type="text" maxlength="3" class="code" name="showCode"  value="<?php echo $sessionInfo['showCode']; ?>">
        <br>
        
        <label>Incentive:</label>
        <input type="radio" name="incentive" value="No" <?php if ($sessionInfo['incentive'] === 'No') {echo 'checked';} ?> >&nbsp;No<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="incentive" value="Yes" <?php if ($sessionInfo['incentive'] === 'Yes') {echo 'checked';} ?> >&nbsp;Yes
        <br>
        
        <input type="hidden" name="sessionID" value="<?php echo ($sessionInfo['sessionID']); ?>">
        
        <button type="submit" class="mainButton">Submit</button>

    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>