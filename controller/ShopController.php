<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 16:15
 */

namespace controller;


use models\Product;
use helper\fileUploader;

class ShopController extends BaseController implements ControllerInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function add()
    {
        if(!$this->renderer->sessionManager->isSet("User")){
            $this->httpHandler->redirect("base","index");
        }

        if($this->httpHandler->isPost()) {
            $data = $this->httpHandler->getData();
            $filename=null;
            if(count($_FILES)>0){
                $fileuploder = new fileUploader();
                $filename = $fileuploder->upload($_FILES['image']);
            }
            $product = new Product();
            $data['userfk']=$this->renderer->sessionManager->getSessionItem("User","ID");
            $data['image']=$filename;
            $product->patchEntity($data);
            if($product->isValid()){
                $product->save();
                //$this->httpHandler->redirect("shop","products");
            }
            if($product->isValid())
                echo "trulmeo";
            else
                echo"falselmeo";
            var_dump($data);
        }


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

    public function sell(){
        $this->add();
    }
    public function products(){
        $statement=$this->renderer->queryBuilder->setMode(0)->setTable('product')->executeStatement();
        $this->renderer->setAttribute('products',$statement);
    }

}