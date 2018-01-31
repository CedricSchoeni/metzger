<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.12.2017
 * Time: 11:26
 */

namespace services;
use models\Answer;
use models\Profile;
use models\Questions;
use models\Role;
use models\Tags;
use models\User;

/**
 *
 * DatabaseSeed Test
 *
 * $dbseed = new \services\DatabaseSeed();
 * $dbseed->resetDatabase();
 */

class DatabaseSeed
{
    private $dbConnection;
    private $queryBuilder;


    /**
     * this will create a new connection to the db and delete the whole database
     * next it will create all tables with their primary keys
     * after that all constraints will be created
     * last test data is inserted in the newly created tables
     */
    public function resetDatabase(){

        session_destroy();

        $this->dbConnection = new \PDO('mysql:host=localhost;','root','');
        $this->queryBuilder = new QueryBuilder();

        $this->dbConnection->prepare($this->dropDatabase('nesridiscount'))->execute();
        $this->dbConnection->prepare($this->createDatabase('nesridiscount'))->execute();
        $this->dbConnection->prepare($this->useDatabase('nesridiscount'))->execute();
        //Create Table Statements
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS DBUser (ID INT PRIMARY KEY AUTO_INCREMENT,Email varchar(255),Username varchar(100),Password varchar(255),EndDate datetime);')->execute();
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS Tags (ID INT PRIMARY KEY AUTO_INCREMENT,TagName varchar(100));')->execute();
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS Product_Tag (ID INT PRIMARY KEY AUTO_INCREMENT,TagsFk int,ProductFk int);')->execute();
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS Product (ID INT PRIMARY KEY AUTO_INCREMENT,DBUserFK int,Productname varchar(100),Image varchar(100),Stock int,Rating int, Price float, Discount float, Description varchar(500) );')->execute();
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS Review(ID INT PRIMARY KEY AUTO_INCREMENT,DBUserFK int,ProductFk int, Title varchar(100), Content varchar(500), Rating int);')->execute();
        $this->dbConnection->prepare('CREATE TABLE IF NOT EXISTS Cart (ID INT PRIMARY KEY AUTO_INCREMENT,ProductFK int,UserFK int, Amount int);')->execute();
        //Alter Table Statements
        $this->dbConnection->prepare('ALTER TABLE Product_Tag ADD CONSTRAINT FOREIGN KEY (tagFK) REFERENCES Tag(id) ON DELETE RESTRICT;')->execute();
        $this->dbConnection->prepare('ALTER TABLE Product_Tag ADD CONSTRAINT FOREIGN KEY (productFK) REFERENCES Product(id) ON DELETE CASCADE;')->execute();
        $this->dbConnection->prepare('ALTER TABLE Cart ADD CONSTRAINT FOREIGN KEY (DBUserFK) REFERENCES DBUser(id) ON DELETE CASCADE;')->execute();
        $this->dbConnection->prepare('ALTER TABLE Cart ADD CONSTRAINT FOREIGN KEY (productFK) REFERENCES Product(id) ON DELETE CASCADE;')->execute();
        //$this->dbConnection->prepare('ALTER TABLE Product ADD CONSTRAINT FOREIGN KEY (Product_Tag) REFERENCES Product_Tag(id) ON DELETE RESTRICT')->execute();
        $this->dbConnection->prepare('ALTER TABLE DBUser ADD CONSTRAINT FOREIGN KEY (cartFK) REFERENCES Cart(id) ON DELETE CASCADE;')->execute();
        $this->dbConnection->prepare('ALTER TABLE Product ADD CONSTRAINT FOREIGN KEY (DBUserFK) REFERENCES DBUser(id) ON DELETE RESTRICT ')->execute();
        $this->dbConnection->prepare('ALTER TABLE Review ADD CONSTRAINT FOREIGN KEY (DBUserFK) REFERENCES DBUser(id) ON DELETE CASCADE;')->execute();


        $this->dbConnection = null;
        $this->dbConnection = DBConnection::getDbConnection();

        //Generate Base Data (Admin/Webhost User, Base Products)
        //TODO code



        // Creation of new Roles in DB
        /*
        $role = new Role();
        $data = [];
        $singleData1 = ['RoleName' => 'User'];
        $singleData2 = ['RoleName' => 'Admin'];
        $data[] = $singleData1;
        $data[] = $singleData2;
        foreach ($data as $singleData){
            $role->clearEntity();
            $role->patchEntity($singleData);
            if ($role->isValid(2)){
                $role->save();
            }
        }
        */
    }


    private function dropDatabase($dbName){
        $stmt = "drop database if exists ".$dbName;
        return$stmt;
    }

    private function createDatabase($dbName){
        $stmt = "create database if not exists ".$dbName;
        return$stmt;
    }
    private function useDatabase($dbName){
        $stmt = "use ".$dbName;
        return$stmt;
    }
}