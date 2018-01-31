<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.01.2018
 * Time: 09:08
 */
$cartItems = $this->cart;
?>

<div class="content">
    <div class="container_12">
        <h3 class="pb1"><span>Shopping Cart</span></h3>
        <?php if ($cartItems[0]['id']) foreach($cartItems as $cart){?>
        <div class="grid_12">
            <div class="grid_2"></div>
            <div class="grid_4"><img src="<?php echo($cart['image']) ? "/NesriDiscount/assets/images/products/".$cart['image'] :"https://i.imgur.com/72xjDmY.jpg";?>" alt="product_image" class="img_inner fleft"></div>
            <div class="grid_4 extra_wrapper">
                <div class="title"><?php echo$cart['productname']?></div>
                <ul class="list l1">
                    <li>Price: <?php echo$cart['price']*$cart['amount']?></li>
                    <li>Amount: <span id="<?php echo$cart['id']?>"><?php echo$cart['amount']?></span><br><button class="btn" onclick="changeAmount(<?php echo$cart['id']?>, 1);">+</button><button class="btn" onclick="changeAmount(<?php echo$cart['id']?>, -1);">-</button></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <?php } else {?>
            <div class="grid_12 text1 center">Your cart is empty</div>

        <?php }?>
        </div>
    </div>
</div>