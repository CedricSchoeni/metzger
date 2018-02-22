<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 27.01.2018
 * Time: 15:17
 */

namespace models;


class Product extends Entity
{
    protected $id;
    public $userfk;
    public $productname;
    public $description;
    public $image;
    public $rating;
    public $price;
    public $discount;
    public $stock;






    protected function defaultValidationConfiguration()
    {
        //parent::defaultValidationConfiguration();
        $this->validator->isRequired('productname');
        $this->validator->isRequired('price');
        $this->validator->isRequired('userfk');
        $this->validator->isRequired('stock');
        $this->validator->minLength('productname',1);
        $this->validator->maxLength('productname',32);
        $this->validator->minLength('description',1);
    }


    public function save()
    {
        return$this->queryBuilder->setMode(2)->setColsWithValues("product",array('id','dbuserfk','Productname','Image','Stock','Price','Discount','Description'),array('',$this->userfk,$this->productname,$this->image,$this->stock,$this->price,$this->discount,$this->description))->executeStatement();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function edit(int $id){
        if($this->id!=$id)
            die();
        $this->queryBuilder->setMode(1)
            ->setColsWithValues('product',array('id','productname','image','stock','price','discount','description'),
                array($this->id,$this->productname,$this->image,$this->stock,$this->price,$this->discount,$this->description))
            ->addCond('product','id',0,$id,true)
            ->addCond('product','dbuserfk',0,$this->userfk,false)
            ->executeStatement();
    }



}