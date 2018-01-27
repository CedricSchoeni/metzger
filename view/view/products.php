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
        var_dump($this->products);
        if(isset($this->products))
        for ($i=1; $i<10; $i++) {


            ?>
            <div class="grid_4">
                <a href="https://i.imgur.com/72xjDmY.jpg" class="gal"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a>
                <div class="text1 col1">Product Name</div>
                Short Description or Price<br>
                <a href="#">Go to Product Details</a>
            </div>
            <?php
            if ($i % 3 == 0)
                echo "<div class=\"clear\">$i</div>";
        }?>

    </div>
  </div>
</div>
