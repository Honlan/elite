<?php
namespace Home\Controller;
use Think\Controller;
class WebController extends Controller {
    public function index(){
		session('elite_uid', '66183190');
    	
    	$this->pv = M('pv')->count();
    	$this->display();
    }
}