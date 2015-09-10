<?php
namespace Home\Controller;
use Think\Controller;
class HelperController extends CommonController {
    public function index(){
		session('elite_uid', '66183190');
    	
    	$this->display();
    }
}