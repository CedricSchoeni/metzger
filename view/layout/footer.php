<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 26.01.2018
 * Time: 17:47
 */
?>

<!--==============================footer=================================-->

<footer>
    <div class="container_12">
        <div class="grid_12">
            <div class="socials">
                <a href="https://www.facebook.com/NESRI.DISCOUNT/?hc_ref=PAGES_TIMELINE"></a>
                <a href="https://twitter.com/nesridiscount"></a>
                <a href="https://www.pinterest.fr/NesriDiscount2/"></a>
                <a href="https://plus.google.com/102227333673129621016"></a>
            </div>
            <div class="copy">
                NesriDiscount &copy; 2018 | <a href="https://www.nsa.gov/resources/everyone/foia/assets/files/policy1-5.pdf" target="_blank">Privacy Policy</a>
            </div>
        </div>
    </div>
    <div class="dontLook">
        <?php $datBoi=$this;
        if($datBoi->sessionManager->isSet('alert')){
            ?>
            <script>customMessage("<?php echo$datBoi->sessionManager->getSessionItem('alert','title')?>","<?php echo$datBoi->sessionManager->getSessionItem('alert','content')?>",<?php echo$datBoi->sessionManager->getSessionItem('alert','good')?>)</script>
        <?php } $datBoi->sessionManager->unsetSessionArray('alert');
        ?>
    </div>
</footer>

</body>
</html>

