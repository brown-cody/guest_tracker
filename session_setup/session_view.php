<?php include('../view/header.php'); ?>

<main>
    <div class="buttonGroup">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="session_add_form">
            <button class="mainButton inline" type="submit">Add Session</button>
        </form>

        <form action="../guest_registration/" method="post" class="<?php if (isset($hide)) echo 'hide'; ?>">
            <input type="hidden" name="action" value="guest_view">
            <button class="mainButton inline" type="submit">Add Guests</button>
        </form>
    </div>
    
    <?php if (isset($error)) {echo '<p class="error">'.$error.'</p>';} ?>
    <?php if (isset($message)) {echo '<p class="message">'.$message.'</p>';} ?>
    
        <table class="<?php if (isset($hide)) echo 'hide'; ?>">
            <tr>
                <th>Room</th>
                <th>Time</th>
                <th>Show Code</th>
                <th>Incentive</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php foreach($sessions as $session) : ?>

                    <tr>

                        <td><?php echo $session['roomNum']; ?></td>
                        <td><?php echo $session['time']; ?></td>
                        <td><?php echo $session['showCode']; ?></td>
                        <td><?php echo $session['incentive']; ?></td>
                        <td class="buttonCell">
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="session_edit_form">
                                <input type="hidden" name="sessionID" value="<?php echo $session['sessionID']; ?>">
                                <button type="submit" class="smallText">Edit</button>
                            </form>
                        </td>
                        <td class="buttonCell">
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="session_delete_confirm">
                                <input type="hidden" name="sessionID" value="<?php echo $session['sessionID']; ?>">
                                <button type="submit" class="smallText delete">Delete</button>
                            </form>
                        </td>

                    </tr>


            <?php endforeach; ?>

        </table>
    
        
    
    
    
    
</main>
    
<?php include('../view/footer.php'); ?>