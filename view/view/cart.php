<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.01.2018
 * Time: 09:08
 */
$cartItems = $this->cart;
$price=0;
?>
<?php $datBoi=$this;
if($datBoi->sessionManager->isSet('alert')){
    ?>
    <script>customMessage("<?php echo$datBoi->sessionManager->getSessionItem('alert','title')?>","<?php echo$datBoi->sessionManager->getSessionItem('alert','content')?>",<?php echo$datBoi->sessionManager->getSessionItem('alert','good')?>)</script>
<?php } $datBoi->sessionManager->unsetSessionArray('alert');
?>
<div class="content">
    <div class="container_12">
        <h3 class="pb1"><span>Shopping Cart</span></h3>
        <?php if (!empty($cartItems)){ foreach($cartItems as $cart){?>
        <div class="grid_12 split">
            <div class="grid_2"></div>
            <div class="grid_4"><img src="<?php echo($cart['image']) ? "/NesriDiscount2/assets/images/products/".$cart['image'] :"https://i.imgur.com/72xjDmY.jpg";?>" alt="product_image" class="img_inner fleft"></div>
            <div class="grid_4 extra_wrapper">
                <div class="title"><?php echo$cart['productname']?></div>
                <ul class="list2">
                    <li>Price: <?php echo $this->htmlHelper->formatPrice($cart['price']*$cart['amount'], $cart['discount'], $cart['id'])?></li>
                    <li>Amount: <span id="<?php echo$cart['id']?>"><?php echo$cart['amount']?></span><br><button class="btn" onclick="changeAmount('<?php echo$cart['id']?>', 1, 'price<?php echo$cart['id']?>', <?php echo$cart['price']?>, <?php echo$cart['discount'] ?>);">+</button><button class="btn" onclick="changeAmount('<?php echo$cart['id']?>', -1, 'price<?php echo$cart['id']?>', <?php echo$cart['price']?>, <?php echo$cart['discount'] ?>);">-</button></li>
                    <li><button class="btn" onClick="location.href='/cart/remove/<?php echo$cart['id']?>'">Remove</button></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <?php $price+=$cart['price']*$cart['amount']*(1-$cart['discount']);}?>
            <div class="text1 center" >Price: <?php echo$this->htmlHelper->formatPrice($price, 0);?></div>
        <div class="btns">
            <button class="btn" onClick="location.href='/cart/buyCart'">Buy Cart</button>
        </div>




        <?php } else {?>
            <div class="grid_12 text1 center">Your cart is empty</div>
        <?php }?>
        </div>
    </div>
</div>