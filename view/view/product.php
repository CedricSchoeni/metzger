<!--==============================Content=================================-->

<div class="content">
  <div class="container_12">
    <div class="grid_12">
      <h3 class="pb1"><span>Product Detail View</span></h3>
      <img src="https://i.imgur.com/1WiTDUZ.jpg" alt="" class="img_inner fleft">
      <div class="extra_wrapper">
        <div class="title">ProductName</div>
      <ul class="list l1">
          <li>Product Owner: Nesri</li>
          <li>Price: 4.20</li>
          <li>Stock: 10</li>
          <li>Rating: 5/5</li>
          <li>
              <?php echo $this->formHelper->createForm("user","/user/register","POST","Register"); ?>
              <input type="number" name="stock" value="1">
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
      <p>Fusce quis fermentum nisl. Ut tempus cometum urna is sed feugiat. Cras pulvinar lorem sagi isallvestibulumnisi nec gravida maecenas sit amet eros conr, convallis.</p>
      </div>
  </div>
</div>
