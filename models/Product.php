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
    public $productname;
    public $description;
    public $image;
    public $rating;
    public $price;
    public $stock;






    protected function defaultValidationConfiguration()
    {
        //parent::defaultValidationConfiguration();
        $this->validator->isRequired('Productname');
        $this->validator->isRequired('price');
        $this->validator->isRequired('stock');
        $this->validator->minLength('name',1);
        $this->validator->maxLength('name',100);
        $this->validator->minLength('description',5);
    }


    public function save()
    {
        $this->queryBuilder->setMode(2)->setColsWithValues("Product",array('id','Productname'),array('',$this->productname))->executeStatement();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}