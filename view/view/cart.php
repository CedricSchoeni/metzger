<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.01.2018
 * Time: 09:08
 */
$product = $this->product[0];
?>

<div class="content">
    <div class="container_12">

        <div class="grid_12">
            <h3 class="pb1"><span>Shopping Cart</span></h3>
            <div class="grid_2"></div>
            <div class="grid_4"><img src="<?php echo$image?>" alt="product_image" class="img_inner fleft"></div>
            <div class="grid_4">
                <div class="title"><?php echo$product['productname']?></div>
                <ul class="list l1">
                    <li>Product Owner: <?php echo$product['username']?></li>
                    <li>Price: <?php echo$product['price']?></li>
                    <li>Stock: <?php echo$product['stock']?></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        </div>
    </div>
</div>