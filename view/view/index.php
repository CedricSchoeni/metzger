<div class="dontLook">
    <script>
        $(document).ready(function(){
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: false ,
                thumbnails: false,
                height: '32.92857142857143%',
                minHeight: '300',
                caption: false,
                navigation: true,
                fx: 'mosaic'
            });
        });

    </script>
</div>
<?php $arr=[]; $base="/NesriDiscount/assets/images/";
array_push($arr,$base."Trump.jpg");
array_push($arr,$base."Maintenance[1].png");
array_push($arr,$base."Finesse.jpg")
?>
<div class="slider_wrapper">
    <div id="camera_wrap" class="">
        <?php
            for($camI=0; $camI<count($arr);$camI++){
        ?>
        <div data-src="<?php echo $arr[$camI]?>">
        </div>
        <?php }?>
    </div>
</div>

<!--==============================Content=================================-->

<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h2>WELCOME TO MY NESRIDISCOUNT WHERE YOU CAN FIND<span>A RANGE OF HIGH-QUALITY <span class="col1">PRODUCTS</span> THAT CAN HELP YOUR LIFE
FLOURISH.</span></h2>
<h3><span>SERVICES</span></h3>
    </div>
    <div class="grid_4">
      <div class="icon">
        <img src="/NesriDiscount/assets/images/icon1.png" alt="">
        <div class="title">BUYING</div>Fusce quis fermentum nisl. Ut tempus cometum urna is sed feugiat. Cras pulvinar lorem sagi isallvestibulumnisi nec gravida maecenas sit amet eros conr, convallis.
      </div>
    </div>
    <div class="grid_4">
      <div class="icon">
        <img src="/NesriDiscount/assets/images/icon2.png" alt="">
        <div class="title">SWAGGING</div><span class="col1"><a href="https://ifunny.co" rel="dofollow"> Find </a></span>
          more dank memes than you could ever imagine.
      </div>
    </div>
    <div class="grid_4">
      <div class="icon">
        <img src="/NesriDiscount/assets/images/icon3.png" alt="">
        <div class="title">SELLING</div>Fusce quis fermentum nisl. Ut tempus cometum urna is sed feugiat. Cras pulvinar lorem sagi isallvestibulumnisi nec gravida maecenas sit amet eros conr, convallis.
      </div>
    </div>
    <div class="grid_12">
      <h3><span>Recent Works</span></h3>
    </div>
    <div class="clear"></div>
    <div class="works">
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
      <div class="clear"></div>
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
      <div class="grid_4"><a href="#"><img src="https://i.imgur.com/72xjDmY.jpg" alt=""></a></div>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
      <h3><span>Testimonials</span></h3></div>
      <div class="grid_6">
        <blockquote>
          <img src="https://png.icons8.com/dotty/128/000000/user-male.png" alt="" class="img_inner fleft">
          <div class="extra_wrapper">
            <p>“Lorem ipsum dolor sit amet, consecteturdiing elit. Ut sit amet lorem sit amet nunc mattisrt imperdiet ac sit amet dui.”</p>
            <span class="col2 upp">Lisa Smith  </span> - client
          </div>
        </blockquote>
      </div>
      <div class="grid_6">
        <blockquote>
          <img src="https://png.icons8.com/dotty/128/000000/user-male.png" alt="" class="img_inner fleft">
          <div class="extra_wrapper">
            <p>“Lorem ipsum dolor sit amet, consecteturdiing elit. Ut sit amet lorem sit amet nunc mattisrt imperdiet ac sit amet dui.”</p>
            <span class="col2 upp">James Bond  </span> - client
          </div>
        </blockquote>
      </div>

    
  </div>
</div>
