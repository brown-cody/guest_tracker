<?php include('../view/header.php'); ?>

<main>
        
    <p class="message">Are you sure you want to delete this session?</p>
            
    <table>
        <th>Room</th>
        <th>Time</th>
        <th>Show Code</th>
        <th>Incentive</th>

        <tr>

            <td><?php echo $sessionInfo['roomNum']; ?></td>
            <td><?php echo $sessionInfo['time']; ?></td>
            <td><?php echo $sessionInfo['showCode']; ?></td>
            <td><?php echo $sessionInfo['incentive']; ?></td>

        </tr>

    </table>
    
    <div class="buttonGroup">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="session_delete">
            <input type="hidden" name="sessionID" value="<?php echo $sessionInfo['sessionID']; ?>">
            <button class="mainButton confirmButton" type="submit">Yes</button>
        </form>  

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="session_view">
            <button class="mainButton confirmButton" type="submit">No</button>
        </form>
    </div>
    
    
    
    
</main>
    
<?php include('../view/footer.php'); ?>