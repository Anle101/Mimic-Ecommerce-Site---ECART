<?php
    ob_start();
//Includes the header.php file that has been separated
    include('header.php');
?>
     <?php
    //Includes the product section that has been separated
            include('../Template/product_section.php');
        ?> 

     <?php
    //Includes the featured product section that has been separated
            include('../Template/featured_products.php');
        ?> 

<?php
//Includes the footer   .php file that has been separated
    include('footer.php');
?>