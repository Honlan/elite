<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$account = $_POST['account'];
    	$password = $_POST['password'];
    	$user = M('students')->where(array('id'=>$account))->find();
    	if (count($user) > 0 & $password == $account) {
    		session('elite_uid', $user['id']);
    		echo 1;
    	} else {
    		echo 0;
    	}
    }

    public function state(){
    	if(isset($_SESSION['elite_uid'])){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }

    public function quit(){
    	session('elite_uid', null);
    	$this->redirect('Web/index');
    }
}