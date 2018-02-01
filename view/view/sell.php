<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 16:13
 */
?>

<div class="content">
    <div class="container_12">
        <div class="grid_12">
            <h3><span>Sell your Product</span></h3>
            <?php echo $this->formHelper->createForm("shop","/shop/sell","POST","Sell"); ?>
            <div class="success_wrapper">
                <div class="success">Data submitted!<br>
                    <strong>Your article can now be bought in the store.</strong>
                </div>
            </div>
            <fieldset>
                <label class="Productname">
                    <input type="text" name="productname" placeholder="Product name">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Description">
                    <textarea name="description" placeholder="Description of Product"></textarea>
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Image">
                    <input type="file" name="image" placeholder="Product-Image.jpeg">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid image.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Stock">
                    <input type="number" min="1" name="stock" placeholder="Stock">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid number</span><span class="empty error-empty">*This field is required.</span> </label>
                <label for="price">
                    <input type="number"  step="0.05" name="price" placeholder="Price" required>
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label for="discount">
                    <input type="number"  step="1" min="1" max="99" name="discount" placeholder="Discount (optional)">
                    <br class="clear">
                    </label>

                <div id="tags">
                    <label class="tag1">
                        <input type="text" name="tag1" placeholder="Tag" required>
                        <br class="clear">
                        <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                </div>
                <div class="btns">
                    <!--<button type="reset" class="btn">Clear</button>-->
                    <button style="" onclick="addTag();return false;" id="addTags" class="btn" >Add Tag</button>
                </div>
                <div class="btns">
                    <!--<button type="reset" class="btn">Clear</button>-->
                    <button type="submit" class="btn">Sell Product</button>
                </div>
            </fieldset>
            <?php echo $this->formHelper->endForm(); ?>
        </div>
    </div>
</div>
