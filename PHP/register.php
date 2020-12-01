<?php
    ob_start();
//Includes the header.php file that has been separated
    include('header.php');
?>
     
        <?php
    //Includes the login section that has been separated
            include('../Template/register_form.php');
        ?>

<?php
//Includes the footer.php file that has been separated
    include('footer.php');
?>