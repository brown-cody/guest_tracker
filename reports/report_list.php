<?php include('../view/header.php'); ?>

<main>
    <h2>Reports</h2>
    
    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="daily_select">
        <button class="mainButton" type="submit">Daily</button>
    </form>
    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="monthly_select">
        <button class="mainButton" type="submit">Monthly</button>
    </form>
    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="yearly_select">
        <button class="mainButton" type="submit">Yearly</button>
    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>