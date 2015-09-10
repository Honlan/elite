<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		session('elite_uid', '66183190');
		if(!isset($_SESSION['elite_uid'])){
			$this->redirect('Index/index');
		}
	}
}
?>