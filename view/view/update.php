<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 16:13
 */
?>

<?php $product = $this->product?>
<?php
$image="https://i.imgur.com/72xjDmY.jpg";
if(file_exists(__DIR__."/../../assets/images/products/".$product['image']) && strlen($product['image'])>0)
    $image="/Nesridiscount2/assets/images/products/".$product['image'];
?>
<div class="content">
    <div class="container_12">
        <div class="grid_12">
            <h3><span>Edit your Product</span></h3>
            <?php echo $this->formHelper->createForm("shop","/shop/edit/".$this->productID,"POST","Edit"); ?>
            <div class="success_wrapper">
                <div class="success">Data submitted!<br>
                    <strong>Your article can now be bought in the store.</strong>
                </div>
            </div>
            <fieldset>
                <input type="hidden" name="id" value="<?php echo$product['id']?>">
                <label class="Productname">
                    <input type="text" name="productname" placeholder="Product name" value="<?php echo$product['productname']?>">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Description">
                    <textarea name="description" placeholder="Description of Product"><?php echo$product['description']?></textarea>
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Image">
                    <input type="file" name="image" onchange="readURL(this);" placeholder="Product-Image.jpeg" accept="image/gif, image/jpeg, image/png image/jpg"/>
                    <img id="imeg" src="<?php echo$image?>" alt="your image">
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid image.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label class="Stock">
                    <input type="number" min="1" name="stock" placeholder="Stock" value="<?php echo$product['stock']?>" required>
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid number</span><span class="empty error-empty">*This field is required.</span> </label>
                <label for="price">
                    <input type="number"  step="0.05" name="price" placeholder="Price" value="<?php echo$product['price']?>" required>
                    <br class="clear">
                    <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
                <label for="discount">
                    <input type="number"  step="1" min="1" max="99" name="discount" placeholder="Discount in % (optional)" value="<?php echo$product['discount']*100?>">
                    <br class="clear">
                    </label>
                <input type="hidden" name="originalImage" value="<?php echo($image=='https://i.imgur.com/72xjDmY.jpg')? 'null' : $product['image']?>">
                <div class="btns">
                    <!--<button type="reset" class="btn">Clear</button>-->
                    <button type="submit" class="btn">Edit Product</button>
                </div>
            </fieldset>
            <?php echo $this->formHelper->endForm(); ?>
        </div>
    </div>
</div>
