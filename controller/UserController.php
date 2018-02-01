<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 25.10.2017
 * Time: 11:30
 */

namespace controller;


use models\User;
use services\DBConnection;
use services\SessionManager;

class UserController extends BaseController implements ControllerInterface
{

    public function index()
    {

    }

    public function test($id){

    }

    public function add()
    {
        $data = $this->httpHandler->getData();
        $statement=$this->renderer->queryBuilder->setMode(0)
            ->setTable('dbuser')
            ->setCols('dbuser',array('username','email'))
            ->executeStatement();
        $valid=true;

        foreach($statement as $tmp)
            if($tmp['username']==$data['username'] || $tmp['email']==$data['email']){
                $valid=false;
            }
        if($valid==false){
                /*$this->renderer->sessionManager->setSessionArray('alert',array('alert'=>1));
                $this->renderer->sessionManager->setSessionItem('alert','title',"'");
                $this->renderer->sessionManager->setSessionItem('alert','content','');
                $this->renderer->sessionManager->setSessionItem('alert','good',"true");*/

                $this->renderer->sessionManager->setSessionArray('alert',array('alert'=>true,'title'=>'Username or Email invalid!','content'=>'One or both of them is already registered!','good'=>'false'));
                /*$this->renderer->setAttribute('alertTitle','Username or Email invalid!');
                $this->renderer->setAttribute('alertContent','One or both of them is already registered!');
                $this->renderer->setAttribute('alertGood','false');
                var_dump($this->renderer->alert);*/
                $this->httpHandler->redirect('user','user');
            }

        if($this->httpHandler->isPost() && $valid==true){
            $user = new User();
            $user->patchEntity($data);
            if($user->isValid()){
                $user->save();
                $this->httpHandler->redirect('user','user');
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
        if($id!=$this->renderer->sessionManager->getSessionItem('User','id')){
            $this->httpHandler->redirect('base','index');
            die();
        }

        $this->httpHandler->redirect('user','user');

    }


    public function login(){
        if($this->httpHandler->isPost() && isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] && $_POST['password']) {
            $user = $this->renderer->queryBuilder->setMode(0)->setTable('DBUser')->addCond('DBUser', 'Username', '0', $_POST['username'],false)->setCols('DBUser', array('id', 'Username', 'Password', 'Email', 'EndDate'))->executeStatement();

            if ($user && password_verify($_POST['password'], $user[0]['Password'])) {
                $this->renderer->sessionManager->setSessionArray('User', $user[0]);
                $this->httpHandler->redirect('base', 'index');
            } else {
                $this->renderer->sessionManager->setSessionArray('alert',array(
                    'alert'=>true,
                    'title'=>'Username or Password invalid!',
                    'content'=>'Invalid Credentials.',
                    'good'=>'false'));
                $this->httpHandler->redirect('user','user');

            }
        } else {
            if ($this->renderer->sessionManager->isSet('User')){
                //echo'right';
                $this->httpHandler->redirect('shop','index');
            }
        }
    }
    public function usernameCheck(){
        $this->renderPage=false;
        if($this->httpHandler->isGet()){
            $data=$this->httpHandler->getData();
            $username=$data["q"];
            $statement= $this->queryBuilder->setMode("select")->setColumns("Username")->setFromTable("DBUser")
                ->addCondition("Username","=",$username);
            $res=$statement->executeStatement();
            if($res==[]){
                echo "Username not found in Database!";
            }else{
                echo "Username was found in Database";
            }
        }
    }
    public function logout(){
        session_destroy();
        $this->httpHandler->redirect("user","user");
    }
    public function register(){
        $this->add();
    }
    public function user(){
        $this->renderer->headerIndex = 5;
        $id = $this->renderer->sessionManager->getSessionItem('User', 'id');
        $stmnt = $this->renderer->queryBuilder->setMode(0)->setTable("dbuser")
            ->setCols('dbuser',array('id','username','email'))
            ->addCond('dbuser','id','0',$id,'')
            ->executeStatement();
        $this->renderer->setAttribute('user',$stmnt);
    }
}