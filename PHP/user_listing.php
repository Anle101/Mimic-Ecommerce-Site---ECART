<?php
    ob_start();
//Includes the header.php file that has been separated
    include('header.php');
?>
<?php
        include('../Template/user_listings.php');          
?> 
<?php
//Includes the footer   .php file that has been separated
    include('footer.php');
?>