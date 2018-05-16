<?php include('../view/header.php'); ?>

<main>
    <h2>Monthly Report</h2>
    
    <?php if (isset($error)) {
        echo '<p class="error">'.$error.'</p>';}
    ?>
    
    <form action="index.php" method="post" class="mainForm">
        
        <input type="hidden" name="action" value="monthly_report">
                
        <label>Month:</label>
        <select name="month">
            <?php foreach ($months as $monthName => $monthVal): ?>
                <option value="<?php echo $monthVal; ?>" <?php if (date("F") == $monthName) echo 'selected';?>><?php echo $monthName; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label>Year:</label>
        <input type="number" name="year" maxlength="4" value="<?php echo date("Y"); ?>" class="yearInput">
        
        <br><br>
        <button class="mainButton" type="submit">Run</button>
        
        
    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>