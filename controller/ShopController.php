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
use models\product_tag;
use models\Tag;
use controller\CartController;

class ShopController extends BaseController implements ControllerInterface
{

    public function index()
    {
        $this->renderer->headerIndex = 2;
        $statement=$this->renderer->queryBuilder->setMode(0)->setTable('product')
            ->addCond('product','stock',3,'0','true')
            ->addCond('product','discount',3,0,true)
            ->limitOffset(6);
        $this->renderer->setAttribute('products',$statement->executeStatement());
        $this->renderer->headerIndex=0;
    }

    public function add()
    {

        if(!$this->renderer->sessionManager->isSet("User")){
            $this->httpHandler->redirect("shop","index");
        }

        if($this->httpHandler->isPost() && isset($_POST['tag1']) && $_POST['tag1'] != "") {
            $data = $this->httpHandler->getData();
            $filename=null;
            if(count($_FILES)>0){
                $fileuploder = new fileUploader();
                $filename = $fileuploder->upload($_FILES['image']);
            }
            if(isset($data['discount'])){
                if($data['discount']<=0||$data['discount']>=100)
                    $data['discount']=0;
            }else
                $data['discount']=0;
            if($data['discount']!=0)
                $data['discount']=($data['discount']/100);
            $product = new Product();
            $data['userfk']=$this->renderer->sessionManager->getSessionItem("User","id");
            $data['image']=$filename;
            $product->patchEntity($data);
            if($product->isValid()){
                $newProductId = $product->save();
                for($i = 1; $i <= 5; $i++){
                    $key = 'tag'.$i;
                    if (isset($data[$key])){
                        $tagId = $this->renderer->queryBuilder->setMode(0)->setTable('tags')->addCond('tags', 'tagname', 0, $data[$key], false)->executeStatement();
                        if ($tagId){
                            // tag already exists;
                            $tagId = $tagId[0]['ID'];
                        } else {
                            // create new tag
                            $tag = new Tag();
                            $tag->patchEntity(array('tagname' => $data[$key]));
                            if ($tag->isValid()){
                                $tagId = $tag->save();
                            } else {
                                $tagId = -1;
                            }
                        }
                        if ($tagId > 0){
                            $product_tag = new product_tag();
                            $product_tag->patchEntity(array('tagid' => $tagId, 'productid' => $newProductId));
                            if ($product_tag->isValid()){
                                $product_tag->save();
                            }
                        }
                    } else {
                        break;
                    }
                }
                $this->httpHandler->redirect("shop","products");
            }
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
        //$hint="";
        $tmp=$this->renderer->queryBuilder->setMode(0)
            ->setTable('product')
            ->setCols('product',array('dbuserfk'))
            ->addCond('product','id',0,$id,true)
            ->executeStatement();
        $this::$dontRender=true;
        if($this->httpHandler->isPost() && $this->renderer->sessionManager->isSet('User') && $tmp[0]['dbuserfk']==$this->renderer->sessionManager->getSessionItem('User','id')){
            $data=$this->httpHandler->getData();
            $filename= ($data['originalImage']=='null')? null : $data['originalImage'];
            if(strlen($_FILES['image']['name'])>1){
                //$hint.="FileUploader-";
                $fileuploder = new fileUploader();
                $filename = $fileuploder->upload($_FILES['image']);
            }
            //$hint.="orig:".$data['originalImage'].";image:".$filename;
            if(isset($data['discount'])){
                if($data['discount']<=0||$data['discount']>=100)
                    $data['discount']=0;
            }else
                $data['discount']=0;
            if($data['discount']!=0)
                $data['discount']=($data['discount']/100);
            $product = new Product();
            $data['id']=$id;
            $data['userfk']=$this->renderer->sessionManager->getSessionItem("User","id");
            $data['image']=$filename;
            $product->patchEntity($data);
            if($product->isValid()){
                $product->edit($id);
                //echo"<br>end<br>";
                $this->createAlert('Edit successful!','Your product was updated successfully.'/*.$hint*/,true);
                $this->httpHandler->redirect('shop','product/'.$id);
            }else{
                $this->createAlert('Edit failed!','Invalid input was given.',false);
                $this->httpHandler->redirect('shop','product/'.$id);
            }
        }else{
            $this->createAlert('Edit failed!','Invalid form validity.',false);
            $this->httpHandler->redirect('shop','product/'.$id);
        }
    }

    public function update(int $id){
        $this->renderer->setAttribute('productID',$id);
        $product=$this->renderer->queryBuilder->setMode(0)->setTable('Product')
            ->setCols('Product',array('id','dbuserfk','productname','image','price','discount','stock','description'))
            ->addCond('Product','id',0,$id,false)
            ->executeStatement();
        if($product[0]['dbuserfk']!=$this->renderer->sessionManager->getSessionItem('User','id')){
            $this->createAlert('Invalid Edit!','You do not own the product you tried to edit!',false);
            $this->httpHandler->redirect('shop','products');
            die();
        }
        $this->renderer->setAttribute('product',$product[0]);
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
        $productStatement=$this->renderer->queryBuilder->setMode(0)->setTable('Product')
            ->setCols('Product',array('id','dbuserfk','productname','image','price','discount','stock','rating','description'))
            ->setCols('DBUser',array('username'))
            ->joinTable('DBUser','Product',0,'DBUserFK')
            ->addCond('product','id',0,$id,'')->executeStatement();

        $tagStatement=$this->renderer->queryBuilder->setMode(0)->setTable('Product')
            ->setCols('tags', array('id', 'tagname'))
            ->joinTable('product_tag', 'product', '0', 'productfk', true)
            ->joinTable('tags', 'product_tag', '0', 'tagsfk')
            ->addCond('product','id',0,$id,'')->executeStatement();
        $owner=false;
        if($productStatement[0]['dbuserfk']==$this->renderer->sessionManager->getSessionItem('User','id'))
            $owner=true;
        $this->renderer->setAttribute('owner',$owner);
        $this->renderer->setAttribute('product',$productStatement);
        $this->renderer->setAttribute('tag', $tagStatement);
    }

    public function buy(int $id){
        $this::$dontRender=true;
        if($this->httpHandler->isPost()){
            $data = $this->httpHandler->getData();
            if($data['id']!=$id || $data['stock']<$data['amount'] || !$this->renderer->sessionManager->isSet('User')){
                $this->httpHandler->redirect("shop","index");
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