<!-- Shopping cart section  -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }

// save for later //11 05
/*if (isset($_POST['wishlist-submit'])){
    $Cart->saveForLater($_POST['item_id']);
 }*/
}
// reservation
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['reserve-submit'])) {
        $Cart->Reservation($_POST['item_id']);
    }
}

//if($_SERVER['REQUEST_METHOD'] == "POST"){
    //if (isset($_POST['reserve_submit'])) {
        // call method addToReserve
       // $reserve->addToReserve($_POST['user_id'], $_POST['item_id']);
   // }
//}
?>
    <section id="cart" class="py-3 mb-5">
        <div class="container-fluid w-75">  <!--Cart item container width-->
            <h5 class="font-robot font-size-20">Shopping Cart</h5>
            <!--  shopping cart items   -->
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    foreach ($product->getData('cart') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                    ?>
                    <!-- cart item -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="<?php echo $item['item_image'] ?? "./assets/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                            <small>Opna Gems & Jewellery</small>

                            <!-- product qty -->
                            <div class="qty d-flex pt-2">
                              <!--  <div class="d-flex font-rale w-25">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                    <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                </div>  -->
                                <form method="post">
                                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button type="submit" name="delete-cart-submit" class="btn font-baloo pl-0 pr-3 text-danger">Delete</button>
                                </form>

                                <!--11 04 added,only button tag was there-->
                                <!--<form method="post">
                                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                    <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                                </form> -->




                            </div>
                            <!-- !product qty -->

                        </div>

                        <div class="col-sm-2 text-right">
                            <div class="font-size-20 text-danger font-baloo">
                                RS <span class="product_price"><?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- !cart item -->
                        <?php
                        return $item['item_price'];
                    }, $cart); // closing array_map function
                    endforeach;
                    ?>

                </div>
                <!-- subtotal section-->
                <div class="col-sm-3">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> You can make reservation item for two days</h6>
                        <div class="border-top py-5">
                            <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">Rs <span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>

                            <form method="post">
                                <?php
                                if (isset($_POST['reserve-submit'])) {
                                ?>
                                    <h3 class="font robot font-size-20 text-danger py-3">Reserved</h3>

                                    <?php
                                }else{
                                ?>
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="reserve-submit" class="btn btn-warning mt-3">Reservation</button>

                                    <?php
                                }
                                ?>

                            </form>


                        </div>
                    </div>
                </div>
                <!-- !subtotal section-->
            </div>
            <!--  !shopping cart items   -->
        </div>
    </section>
<!-- !Shopping cart section  -->









