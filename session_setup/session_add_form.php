<?php include('../view/header.php'); ?>

<main>
    <h2>Add Session</h2>
    <p class="error"><?php if (isset($error) == TRUE) echo $error; ?></p>
    <form class="mainForm" action="index.php" method="post">
        <input type="hidden" name="action" value="session_add">
        <label>Room:</label>
        <select name="roomNum">
            <?php foreach($rooms as $room): ?>
                <option value="<?php echo $room['roomNum']; ?>">
                    <?php echo $room['roomNum']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>Time:</label>
        <input type="time" name="time">
        <br>
                
        <label>Show Code:</label>
        <input type="text" maxlength="3" class="code" name="showCode">
        <br>
        
        <label>Incentive:</label>
        <input type="radio" name="incentive" value="No">&nbsp;No<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="incentive" value="Yes">&nbsp;Yes
        <br>
        
        <button type="submit" class="mainButton">Submit</button>

    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>