<?php include('../view/header.php'); ?>

<main>
    <h2>Yearly Report</h2>
    
    <?php if (isset($error)) {
        echo '<p class="error">'.$error.'</p>';}
    ?>
    
    <form action="index.php" method="post" class="mainForm">
        
        <input type="hidden" name="action" value="yearly_report">
                        
        <label>Year:</label>
        <input type="number" name="year" maxlength="4" value="<?php echo date("Y"); ?>" class="yearInput">
        
        <br><br>
        <button class="mainButton" type="submit">Run</button>
        
        
    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>