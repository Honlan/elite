<?php
namespace Home\Controller;
use Think\Controller;
class InfoController extends Controller {
    public function index(){
		session('elite_uid', '66183190');
    	
    	$this->display();
    }
}