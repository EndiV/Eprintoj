<!--   product  -->
<?php
// request method post
/*if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);

    }
}*/
$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item) :
    if ($item['item_id'] == $item_id) :
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-6">
                        <img src="<?php echo $item['item_image'] ?? "./assests/h1.jpg" ?>" alt="product"
                             class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                            </div>
                            <div class="col">
                                <form method="post" action="index.php">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success form-control">In the Cart</button>';
                                    } else {
                                        echo '                            <button type="submit" name = "top_sale_submit" class="btn btn-warning form-control">Add to Cart</button>
';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown" ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand" ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">2 ratings | 2 answered questions</a>
                        </div>
                        <hr class="m-0">

                        <!---    product price       -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Cmimi I Meparshem:</td>
                                <td><strike>2800L</strike></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Cmimi Ne Oferte:</td>
                                <td class="font-size-20 text-danger">
                                    $<span><?php echo $item['item_price'] ?? 0 ?></span></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Ju Kurseni:</td>
                                <td><span class="font-size-16 text-danger">300L</span></td>
                            </tr>
                        </table>
                        <!---    !product price       -->

                        <!--    #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">24/48 Ore <br>Delivery</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">1 Vit <br>Garanci</a>
                                </div>
                            </div>
                        </div>
                        <!--    !policy -->
                        <hr>

                        <!-- order-details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery within 48 hours</small>
                            <small>Sold by <a href="#">Eprintoj </a>(2 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                                424201</small>
                        </div>
                        <!-- !order-details -->

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-baloo">Color:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-primary-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-second-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <div class="col-lg-6">
                                <!-- product qty section -->
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty</h6>
                                    <div class="px-4 d-flex font-rale">
                                        <button class="qty-up border bg-light" data-id="pro1"><i
                                                    class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light"
                                               disabled value="1" placeholder="1">
                                        <button data-id="pro1" class="qty-down border bg-light"><i
                                                    class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                                <!-- !product qty section -->
                            </div>
                        </div>

                        <!-- size -->
                        <div class="size my-3">
                            <h6 class="font-baloo">Masat :</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">S</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">M</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">L</button>
                                </div>
                            </div>
                        </div>
                        <!-- !size -->


                    </div>

                    <div class="col-12">
                        <h6 class="font-rubik py-3">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14">Hoodie I Bardhe 100% pambuk</p>

                    </div>
                </div>
            </div>
        </section>
        <!--   !product  -->
    <?php
    endif;
endforeach;
?>