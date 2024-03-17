<?php
ob_start();
//call header.php
include('header.php');
?>
<?php
//call _cart.php
//include('Partial File/_cart.php');
?>
<?php
    /*  include cart items if it is not empty */
    count($product->getData('cart')) ? include ('Partial File/_cart.php') :  include ('Partial File/notFound/_empty_cart.php');
    /*  include cart items if it is not empty */


?>
<?php
//call _top_sale.php
include('Partial File/_top_sale.php');
?>

<?php
//call Index_footer.php
include('Index_Footer.php');
?>
<!--test comment-->