<!--==============================Content=================================-->
<?php

$product = $this->product[0];
$tags = ($this->tag[0]['tagname'] != null) ? $this->tag : null;
$image="https://i.imgur.com/72xjDmY.jpg";
$path="/NesriDiscount/assets/images/products/";
if($product['image']!=null)
    $image=$path.$product['image'];
$target_dir = __DIR__."/../../../";
if(!file_exists($target_dir.$image))
    $image="https://i.imgur.com/72xjDmY.jpg";
    ?>
<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3 class="pb1"><span>Product Detail View</span></h3>
        <div class="grid_8"><img src="<?php echo$image?>" alt="product_image" class="img_inner fleft"></div>

      <div class="extra_wrapper">
        <div class="title"><?php echo$product['productname']?></div>
      <ul class="list l1">
          <li>Product Owner: <?php echo$product['username']?></li>
          <li>Price: <?php echo $this->htmlHelper->formatPrice($product['price'], $product['discount'])?></li>
          <li>Stock: <?php echo$product['stock']?></li>
          <li>
              <div class="sectionTitle">Tags</div>
              <?php if($tags){foreach($tags as $tag){?>
              <div class="tag"><?php echo$tag['tagname'];?></div>
              <?php }}?>

          </li>
          <?php if($product['rating']==null){?>
          <li>Rating: not yet rated</li>
          <?php }else {?>
          <li>Rating: <?php echo$product['rating']?>/5</li>
          <?php }?>
          <li>

              <?php echo $this->formHelper->createForm("user","/cart/addCart/$product[id]","POST","Buy"); ?>
              <input type="number" name="amount" value="1" min="1" max="<?php echo$product['stock']?>">
              <input type="hidden" name="id" value="<?php echo$product['id']?>">
              <div class="btns">
                  <button type="submit" class="btn">Add to Cart</button>
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
          <p class="description"><?php echo$product['description']?></p>
      </div>
  </div>
</div>
