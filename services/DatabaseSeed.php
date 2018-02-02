<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.12.2017
 * Time: 11:26
 */

namespace services;
use models\Answer;
use models\Product;
use models\product_tag;
use models\Profile;
use models\Questions;
use models\Role;
use models\Tag;
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
        $user = new User();
        $data = [];
        $data_1 = ['email'=>'admin@admin.ch','username' =>'admin', 'password' => 'admin12','enddate' => date("Y-m-d H:i:s")];
        $data_2 = ['email'=>'ismail.buenuel@csbe.org','username' =>'ismail', 'password' => 'ismailB','enddate' => date("Y-m-d H:i:s")];
        array_push($data,$data_1);
        array_push($data,$data_2);
        foreach($data as $d){
            $_POST['data'] = $data;
            $user->clearEntity();
            $user->patchEntity($d);
            if ($user->isValid()){
                $user->save();
            }
        }


        $product = new Product();
        $proddata = [];
        $prod=[];
        $prod[0] = ['userfk' =>'1','productname' =>'CsBe 24/7 Support', 'image' =>'csbe_support.png','stock' => 200,'price' => 50, 'discount' =>0.2, 'description' =>'If the Clipboard data is in a format that the object does not support, the CanPaste property is False. For example, if you try to paste a bitmap into an object that only supports text, CanPaste will be False.'];
        $prod[1] = ['userfk' =>'1','productname' =>'Supreme Kurt', 'image' =>'kurt..png','stock' => 500,'price' => 200, 'discount' =>0.5, 'description' =>'„So, nun passt Alle gut auf. Ich zeige euch wie man einen Gott umbringt.“ (Prinzessin Mononoke)'];
        $prod[2] = ['userfk' =>'1','productname' =>'Kurt Original', 'image' =>'maybe_kurt.png','stock' => 2100,'price' => 420, 'discount' =>0.21, 'description' =>'🙂🙂🙂🙂🙂🙂🙂🙂🙂😭😭😭😭😭😭😭😭😭😭😭😭😭😭😭😭😭😭😭'];
        $prod[3] = ['userfk' =>'1','productname' =>'Mr Krabs', 'image' =>'maxresdefault (3).jpg','stock' => 20,'price' => 360, 'discount' =>0, 'description' =>'Spongebob Squarepants'];
        $prod[4] = ['userfk' =>'2','productname' =>'CsBe private lessons', 'image' =>'schmitz_v3.png','stock' => 1024,'price' => 1488, 'discount' =>0, 'description' =>'This new Border Warfare has come out on all consoles (WII U included).'];
        $prod[5] = ['userfk' =>'1','productname' =>'John Scarce', 'image' =>'ScarceIsThicc.jpg','stock' => 50,'price' => 1942, 'discount' =>0.25, 'description' =>'Hey what\'s up guys it\'s Scarce here.'];
        foreach($prod as $temp)
        array_push($proddata,$temp);
        foreach ($proddata as $p){
            $_POST['data'] = $prod;
            $product->clearEntity();
            $product->patchEntity($p);
            $product->save();
        }
        $tag = new Tag();
        $tags=[];
        $tags[0]=['tagname'=>'Official'];
        $tags[1]=['tagname'=>'Meme'];
        $tags[2]=['tagname'=>'Very Good'];
        $tags[3]=['tagname'=>'HD'];
        $tags[4]=['tagname'=>'SCRUM'];
        foreach($tags as $t){
            $_POST['data']=$tags;
            $tag->clearEntity();
            $tag->patchEntity($t);
            $tag->save();
        }
        $product_tag=new product_tag();

        $alreadyAdded=[];
        $count=0;
        for($a=0; $a<count($prod); $a++){
            $count++;
            for($i=0; $i<random_int(1,5);$i++){
                $t=random_int(1,count($tags));
                if(!in_array($t,$alreadyAdded)){
                    array_push($alreadyAdded,$t);
                    $tmp=['tagid'=>$t,'productid'=>$count];
                    $_POST['data']=$tmp;
                    $product_tag->clearEntity();
                    $product_tag->patchEntity($tmp);
                    $product_tag->save();
                }
            }
            $alreadyAdded=[];
        }





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