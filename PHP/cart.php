<?php
    ob_start();
//Includes the header.php file that has been separated
    include('header.php');
?>
<?php
    if (isset($_SESSION['user_id'])) {
        count($item->getUserData($_SESSION['user_id'],'cart')) ? include('../Template/cart_preview.php') : include('../Template/notAvailable/cart_empty.php'); 
       
    }
    else {
        count($item->getUserData(0,'cart')) ? include('../Template/cart_preview.php') : include('../Template/notAvailable/cart_empty.php'); 
    }
    
   
            
?> 
<?php
//Includes the footer   .php file that has been separated
    include('footer.php');
?>