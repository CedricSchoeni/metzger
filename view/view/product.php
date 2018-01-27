<!--==============================Content=================================-->
<?php
$product = $this->product[0];

$image="https://i.imgur.com/72xjDmY.jpg";
$path="/NesriDiscount/assets/images/products/";
if($product['discount']!=null)
    $product['price']=$product['price']*$product['discount'];
if($product['image']!=null)
    $image=$path.$product['image'];

?>
<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3 class="pb1"><span>Product Detail View</span></h3>
      <img src="<?php echo$image?>" alt="product_image" class="img_inner fleft">
      <div class="extra_wrapper">
        <div class="title"><?php echo$product['productname']?></div>
      <ul class="list l1">
          <li>Product Owner: <?php echo$product['username']?></li>
          <li>Price: <?php echo$product['price']?></li>
          <li>Stock: <?php echo$product['stock']?></li>
          <?php if($product['rating']==null){?>
          <li>Rating: not yet rated</li>
          <?php }else {?>
          <li>Rating: <?php echo$product['rating']?>/5</li>
          <?php }?>
          <li>
              <?php echo $this->formHelper->createForm("user","/user/register","POST","Register"); ?>
              <input type="number" name="stock" value="1" max="<?php echo$product['stock']?>">
              <div class="btns">
                  <button type="submit" class="btn">Buy</button>
              </div>
              <?php echo $this->formHelper->endForm(); ?>
          </li>
      </ul>
      </div>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
      <h3 class="head3"><span>Details</span></h3>
    </div>
      <div class="grid_12">
      <p><?php echo$product['description']?>
      </div>
  </div>
</div>
