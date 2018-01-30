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
    private $id;
    public $userfk;
    public $productname;
    public $description;
    public $image;
    public $rating;
    public $price;
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
        return$this->queryBuilder->setMode(2)->setColsWithValues("product",array('id','dbuserfk','Productname','Image','Stock','Price','Description'),array('',$this->userfk,$this->productname,$this->image,$this->stock,$this->price,$this->description))->executeStatement();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}