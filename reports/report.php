<?php include('../view/header.php'); ?>

<main>
    <h2><?php echo $type; ?> Report for <?php echo $date;?></h2>
     
    <?php foreach ($showCodeSessions as $session): ?>
        <table class="report">
            <caption>Show Code: <?php echo $session['showCode']; ?><br>Incentive - <?php echo $session['incentive']; ?></caption>
            
            <tr>
                <th colspan="2">Gender</th>
                <th colspan="2">Age</th>
                <th colspan="2">Ethnicity</th>
                <th colspan="2">Subscriber</th>
            </tr>
            
            <tr>
                <td class="right">Male</td>
                <td class="left">&nbsp;- <?php echo $session['Male'];?></td>
                <td class="right">18-24</td>
                <td class="left">&nbsp;- <?php echo $session['18-24'];?></td>
                <td class="right">White</td>
                <td class="left">&nbsp;- <?php echo $session['White'];?></td>
                <td class="right">Yes</td>
                <td class="left">&nbsp;- <?php echo $session['Yes'];?></td>
            </tr>
            <tr>
                <td class="right">Female</td>
                <td class="left">&nbsp;- <?php echo $session['Female'];?></td>
                <td class="right">25-34</td>
                <td class="left">&nbsp;- <?php echo $session['25-34'];?></td>
                <td class="right">Hispanic</td>
                <td class="left">&nbsp;- <?php echo $session['Hispanic'];?></td>
                <td class="right">No</td>
                <td class="left">&nbsp;- <?php echo $session['No'];?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="right">35-49</td>
                <td class="left">&nbsp;- <?php echo $session['35-49'];?></td>
                <td class="right">Black</td>
                <td class="left">&nbsp;- <?php echo $session['Black'];?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="right">50+</td>
                <td class="left">&nbsp;- <?php echo $session['50+'];?></td>
                <td class="right">Asian</td>
                <td class="left">&nbsp;- <?php echo $session['Asian'];?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="right">Native American</td>
                <td class="left">&nbsp;- <?php echo $session['Native American'];?></td>
                <td></td>
                <td></td>
            </tr>

        </table>
    <?php endforeach; ?>
</main>
    
<?php include('../view/footer.php'); ?>