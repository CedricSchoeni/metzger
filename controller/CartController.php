<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.01.2018
 * Time: 09:28
 */

namespace controller;


class CartController extends BaseController
{
    function cart(){
        if ($this->renderer->sessionManager->isSet('User')){
            $this->renderer->headerIndex = 7;
            $statement = $this->renderer->queryBuilder->setMode(0)->setTable('dbuser')
                ->setCols('product', array('id', 'productname', 'image', 'description'))
                ->joinTable('cart', 'dbuser', '0', 'userfk', true)
                ->joinTable('product', 'cart', '0', 'productfk')
                ->executeStatement();
            $this->renderer->setAttribute('cart', $statement);
        } else {
            $this->httpHandler->redirect('base', 'index');
        }
    }

}