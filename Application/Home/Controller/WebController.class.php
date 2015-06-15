<?php
namespace Home\Controller;
use Think\Controller;
class WebController extends Controller {
    public function index(){
    	$this->pv = M('pv')->count();
    	$this->display();
    }
}