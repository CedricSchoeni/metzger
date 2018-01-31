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
                ->setCols('product', array('productname', 'image', 'description', 'price', 'discount'))
                ->setCols('cart', array('id', 'amount'))
                ->joinTable('cart', 'dbuser', '0', 'userfk', true)
                ->joinTable('product', 'cart', '0', 'productfk')
                ->executeStatement();
            $this->renderer->setAttribute('cart', $statement);
        } else {
            $this->httpHandler->redirect('base', 'index');
        }
    }

    function changeAmount($id, $newAmount){
        $this::$dontRender = true;
        if ($id > 0){
            $stock = $this->renderer->queryBuilder->setMode(0)->setTable('cart')
                ->setCols('product', array('stock'))
                ->joinTable('product', 'cart', '0', 'productfk')
                ->addCond('cart', 'id', 0, $id, 'true')
                ->addCond('cart', 'userfk', 0, $this->renderer->sessionManager->getSessionItem('User', 'id'), 'false')
                ->executeStatement()[0]['stock'];

            if ($newAmount <= $stock && $newAmount > 0){
                $this->renderer->queryBuilder->setMode(1)->setTable('cart')
                    ->setColsWithValues('cart', array('amount'), array($newAmount))
                    ->addCond('cart', 'id', 0, $id, 'true')
                    ->addCond('cart', 'userfk', 0, $this->renderer->sessionManager->getSessionItem('User', 'id'), 'false')
                    ->executeStatement();
                echo$newAmount;
            }
        }
    }
}