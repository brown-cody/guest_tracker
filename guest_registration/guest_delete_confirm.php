<?php include('../view/header.php'); ?>

<main>
        
    <p class="message">Are you sure you want to delete this guest?</p>
            
    <table>
        <th>Last</th>
        <th>First</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Ethnicity</th>
        <th>Zip Code</th>
        <th>Subscriber</th>
        
        <tr>

            <td><?php echo $guestInfo['lastName']; ?></td>
            <td><?php echo $guestInfo['firstName']; ?></td>
            <td><?php echo $guestInfo['gender']; ?></td>
            <td><?php echo $guestInfo['age']; ?></td>
            <td><?php foreach($ethnicities as $ethnicity) if ($ethnicity['ethnicityID'] == $guestInfo['ethnicityID']) echo $ethnicity['ethnicityName']; ?></td>
            <td><?php echo $guestInfo['zipCode']; ?></td>
            <td><?php echo $guestInfo['subscriber']; ?></td>

        </tr>

    </table>
    
    <div class="buttonGroup">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="guest_delete">
            <input type="hidden" name="guestID" value="<?php echo $guestInfo['guestID']; ?>">
            <button class="mainButton confirmButton" type="submit">Yes</button>
        </form>  

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="guest_view">
            <button class="mainButton confirmButton" type="submit">No</button>
        </form>
    </div>
    
    
    
    
</main>
    
<?php include('../view/footer.php'); ?>