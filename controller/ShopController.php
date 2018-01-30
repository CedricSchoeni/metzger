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
            $data['userfk']=$this->renderer->sessionManager->getSessionItem("User","id");
            $data['image']=$filename;
            $product->patchEntity($data);
            if($product->isValid()){
                $newProductId = $product->save();
                $this->httpHandler->redirect("shop","products");
            }
            /*if($product->isValid())
                echo "trulmeo";
            else
                echo"falselmeo";
            var_dump($data);*/
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
        $this->renderer->headerIndex = 6;
        $this->add();
    }
    public function products(){
        $this->renderer->headerIndex = 2;
        $statement=$this->renderer->queryBuilder->setMode(0)->setTable('product')->addCond('product','stock',3,'0','');
        $this->renderer->setAttribute('products',$statement->executeStatement());
    }
    public function product(int $id){
        $this->renderer->headerIndex = 2;
        $statement=$this->renderer->queryBuilder->setMode(0)->setTable('Product')->setCols('Product',array('id','productname','image','price','discount','stock','rating','description'))
            ->setCols('DBUser',array('username'))
            ->joinTable('DBUser','Product','0','DBUserFK')
            ->addCond('product','id',0,$id,'');

        $this->renderer->setAttribute('product',$statement->executeStatement());
    }
    public function buy(int $id){
        if($this->httpHandler->isPost()){
            $data = $this->httpHandler->getData();
            if($data['id']!=$id || $data['stock']<$data['amount']){
                $this->httpHandler->redirect("base","index");
                die("error, invalid purchase");
            }
            $this->renderer->queryBuilder->setMode(1)->setTable('product')
                ->setColsWithValues('product',array('stock'),array($data['stock']-$data['amount']))
                ->addCond('product','id',0,$data['id'],'')
                ->executeStatement();
            $this->httpHandler->redirect('shop','products');
        }
    }


}