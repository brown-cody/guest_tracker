<?php include('../view/header.php'); ?>

<main>
    <h2>Add Guest</h2>
    <p class="error"><?php if (isset($error) == TRUE) echo $error; ?></p>
    <form class="mainForm" action="index.php" method="post">
        <input type="hidden" name="action" value="guest_add">
        
        <label>First Name:</label>
        <input type="text" name="firstName" class="textBox">
        <br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" class="textBox">
        <br>
        
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male">&nbsp;Male<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="gender" value="Female">&nbsp;Female
        <br>
        
        <label>Age:</label>
        <input type="number" name="age" class="code" maxlength="3">
        <br>
        
        <label>Ethnicity:</label>
        <select name="ethnicityID" class="selectBox">
            <?php foreach($ethnicities as $ethnicity): ?>
                <option value="<?php echo $ethnicity['ethnicityID']; ?>">
                    <?php echo $ethnicity['ethnicityName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>Zip Code:</label>
        <input type="number" name="zipCode" class="zipCode" maxlength="5">
        <br>
        
        <label class="doubleWide">Premium Television Subscriber:</label>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="subscriber" value="No">&nbsp;No<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="subscriber" value="Yes">&nbsp;Yes
        <br>
        
        <button type="submit" class="mainButton">Submit</button>

    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>