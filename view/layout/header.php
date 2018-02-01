<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 26.01.2018
 * Time: 17:47
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NesriDiscount</title>
    <meta charset="utf-8">
    <link rel="icon" href="/NesriDiscount/assets/images/favicon.ico">
    <link rel="shortcut icon" href="/NesriDiscount/assets/images/favicon.ico" />
    <link rel="stylesheet" href="/NesriDiscount/assets/css/main.css">
    <link rel="stylesheet" href="/NesriDiscount/assets/css/style.css">
    <link rel="stylesheet" href="/NesriDiscount/assets/css/camera.css">
    <link rel="stylesheet" href="/NesriDiscount/assets/css/form.css">
    <script src="/NesriDiscount/assets/js/jquery.js"></script>
    <script src="/NesriDiscount/assets/js/jquery-migrate-1.1.1.js"></script>
    <script src="/NesriDiscount/assets/js/superfish.js"></script>
    <script src="/NesriDiscount/assets/js/jquery.equalheights.js"></script>
    <script src="/NesriDiscount/assets/js/jquery.easing.1.3.js"></script>
    <script src="/NesriDiscount/assets/js/camera.js"></script>
    <script src="/NesriDiscount/assets/js/forms.js"></script>
    <script src="/NesriDiscount/assets/javascript/main.js"></script>
    <!-- Products Page -->
    <link rel="stylesheet" href="/NesriDiscount/assets/css/touchTouch.css">
    <script src="/NesriDiscount/assets/js/touchTouch.jquery.js"></script>
    <!--\Products Page/-->

</head>
<body  style="" class="">
<div id="alertContainer" class="customMessageContainer" style="visibility: hidden">
    <div class="customMessageBackground" id="alertBackground"></div>
    <div class="customMessageBox" id="alertBox">
        <div id="alertBoxTitle" class="customMessageTitle title"></div><a class="customMessageClose" id="alertBoxClose" onclick="closeMessage()">close</a>
        <div id="alertBoxContent" class="customMessageContent text1"></div>

    </div>
</div>
<!--==============================header=================================-->
<header>
    <div class="container_12">
        <div class="grid_12">
            <h1><a href="/base/index"><img src="/NesriDiscount/assets/images/notstolen_logo.png" alt="Boo House"></a> </h1>
            <div class="menu_block">
                <nav  class="" >
                    <ul class="sf-menu">
                        <li class="<?php if ($this->headerIndex == 0) echo'current'?>"><a href="/shop/index">Home</a></li>
                        <li class="<?php if ($this->headerIndex == 1) echo'current'?>"><a href="/base/about">About</a></li>
                        <li class="<?php if ($this->headerIndex == 2) echo'current'?>"><a href="/shop/products">Products</a></li>
                        <li class="<?php if ($this->headerIndex == 3) echo'current'?>"><a href="/base/partners">Our Partners</a></li>
                        <li class="<?php if ($this->headerIndex == 4) echo'current'?>"><a href="/base/contact">Contact Us</a></li>
                        <li class="<?php if ($this->headerIndex == 5) echo'current'?>"><a href="/user/user">You</a></li>
                        <?php if($this->sessionManager->isSet('User')){ ?>
                        <li class="<?php if ($this->headerIndex == 6) echo'current'?>"><a href="/shop/sell">Sell</a></li>
                        <li class="<?php if ($this->headerIndex == 7) echo'current'?>"><a href="/cart/cart">Cart</a></li>
                        <?php }?>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
