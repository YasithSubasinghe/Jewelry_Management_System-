<!-- Top Sale -->
<?php
//$product_shuffle=$product->getData();

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])) {
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
}
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>    <!--store value one by one-->
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="#"><img src="<?php echo $item['item_image'] ?? "./assests/10.jpg" ; ?>" alt="product" class="img-fluid"></a>
                    <div class="text-center">
                        <br>
                        <h6><?php echo $item['item_name'] ?? "Unknown" ; ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>Rs <?php echo $item['item_price'] ?? '0' ; ?></span>
                        </div>
                        <?php
                        if(isset($_SESSION['user_name'])){   ?>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '0'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? '0'; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-12">Added to Cart</button>';
                            }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-dark font-size-12">Add to Cart</button>';
                            }
                            ?>
                        </form>
                            <?php
                        }else{
                        ?>
                        <button type="submit" onclick="document.location='first.php'" class="btn btn-warning font-size-12">Add to Cart</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->