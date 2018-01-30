<div class="dontLook">
    <script>
        $(function(){
            // Initialize the gallery
            $('.port a.gal').touchTouch();
        });
    </script>
</div>
<!--==============================Content=================================-->

<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3><span>Our Products</span></h3>
    </div>
    <div class="clear"></div>
    <div class="port">
        <?php

        $products=$this->products;
        //var_dump($products);
        $noImg="https://i.imgur.com/72xjDmY.jpg";
        $path="/NesriDiscount/assets/images/products/";
        for ($i=0; $i<count($products); $i++) {
            $image=$noImg;
            if($products[$i]['Image']!=null)
                $image=$path.$products[$i]['Image'];

            ?>
            <div class="grid_4">
                <a href="<?php echo$image?>" class="gal"><img src="<?php echo$image?>" alt=""></a>
                <div class="text1 col1 wordBreak"><?php echo$products[$i]['Productname']?></div>
                <div class="wordBreak"><?php echo$products[$i]["Description"]?></div><br>
                <a href="/shop/product/<?php echo$products[$i]['ID']?>">Go to Product Details</a>
            </div>
            <?php } ?>

    </div>
  </div>
</div>
