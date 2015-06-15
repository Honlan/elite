<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$ip = get_client_ip();
    	$ts = time();
    	if(!M('pv')->where('ip = "'.$ip.'" AND ts > '.($ts - 3600 * 3))->count()){
    		M('pv')->data(array('ip'=>$ip, 'ts'=>$ts))->add();
    	}
    	$this->display();
    }
}