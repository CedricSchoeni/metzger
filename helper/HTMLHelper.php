<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 25.10.2017
 * Time: 10:46
 */

namespace helper;

class HTMLHelper extends BaseHelper
{
    public function formatPrice($price, $discount){
        return ($discount > 0) ? '<span class="oldPrice">'.$price.'</span>'.'<span class="newPrice">'.$price*(1 - $discount).'</span>' : '<span>'.$price.'</span>';
    }
}