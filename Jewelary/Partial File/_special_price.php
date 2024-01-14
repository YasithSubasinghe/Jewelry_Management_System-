<!-- Special Price -->
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
$in_cart = $Cart->getCartId($product->getData('cart'));
?>
<section id="special-price">
    <div class="container">
       <!-- <h4 class="font-rubik font-size-20">Special Price</h4> -->
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <button class="btn" data-filter=".Necklace">Necklace</button>
            <button class="btn" data-filter=".Rings">Rings</button>
            <button class="btn" data-filter=".Earings">Earings</button>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use($in_cart){?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="#"><img src="<?php echo $item['item_image']??"./assests/28.jpg"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
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
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? '0'; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">Added to Cart</button>';
                                }else{
                                    echo '<button type="submit" name="special_price_submit" class="btn btn-dark font-size-12">Add to Cart</button>';
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
            </div>
            <?php }, $product_shuffle) ?>

        </div>
    </div>
</section>
<!-- !Special Price -->
<br>
