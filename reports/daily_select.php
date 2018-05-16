<?php include('../view/header.php'); ?>

<main>
    <h2>Daily Report</h2>
    
    <?php if (isset($error)) {
        echo '<p class="error">'.$error.'</p>';}
    ?>
    
    <form action="index.php" method="post" class="mainForm">
        
        <input type="hidden" name="action" value="daily_report">
                
        <label class="narrowLabel">Date:</label>
        <input type="date" name="date">
        <br><br>
        <button class="mainButton" type="submit">Run</button>
        
        
    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>
