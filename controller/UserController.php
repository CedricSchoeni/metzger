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

        if($this->httpHandler->isPost()){
            $data = $this->httpHandler->getData();
            $user = new User();
            $user->patchEntity($data);
            if($user->isValid()){
                //echo'xd';
                $user->save();
                $this->httpHandler->redirect('user','index');
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
        // TODO: Implement edit() method.
    }


    public function login(){
        if($this->httpHandler->isPost() && isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] && $_POST['password']) {
            $user = $this->renderer->queryBuilder->setMode(0)->setTable('DBUser')->addCond('DBUser', 'Username', '0', $_POST['username'],false)->setCols('DBUser', array('ID', 'Username', 'Password', 'Email', 'EndDate'))->executeStatement();
            //var_dump($user);
            if ($user && password_verify($_POST['password'], $user[0]['Password'])) {
                $this->renderer->sessionManager->setSessionArray('User', $user[0]);
                //echo'right';
                $this->httpHandler->redirect('base', 'index');
            } else {
                $this->httpHandler->redirect('user','user');
                echo'wonrg';
            }
        } else {
            if ($this->renderer->sessionManager->isSet('User')){
                echo'right';
                $this->httpHandler->redirect('base','index');
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
        $this->httpHandler->redirect("user","login");
    }
    public function register(){
        $this->add();
    }
}