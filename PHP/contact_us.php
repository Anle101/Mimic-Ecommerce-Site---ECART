<?php
    ob_start();
//Includes the header.php file that has been separated
    include('header.php');
?>
     
        <?php
    //Includes the welcome section that has been separated
            include('../Template/contact_us_form.php');
        ?>


<?php
//Includes the footer.php file that has been separated
    include('footer.php');
?>