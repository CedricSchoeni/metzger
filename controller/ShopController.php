<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 16:15
 */

namespace controller;


use models\Product;

class ShopController extends BaseController implements ControllerInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function add()
    {
        $product = new Product();

    }

    public function view(int $id)
    {
        // TODO: Implement view() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function edit(int $id)
    {
        // TODO: Implement edit() method.
    }

}