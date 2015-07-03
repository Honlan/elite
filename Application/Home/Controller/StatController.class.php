<?php
namespace Home\Controller;
use Think\Controller;
class StatController extends CommonController {
    public function index(){
    	$elite_uid = $_SESSION['elite_uid'];
    	$user = M('students')->where(array('id'=>$elite_uid))->find();
    	$this->user = $user;
    	$this->userjs = json_encode($user);
    	$tTraffic = array(round($user['t0']/(1024*1024),2),round($user['t1']/(1024*1024),2),round($user['t2']/(1024*1024),2),round($user['t3']/(1024*1024),2),round($user['t4']/(1024*1024),2),round($user['t5']/(1024*1024),2),round($user['t6']/(1024*1024),2),round($user['t7']/(1024*1024),2),round($user['t8']/(1024*1024),2),round($user['t9']/(1024*1024),2),round($user['t10']/(1024*1024),2),round($user['t11']/(1024*1024),2),round($user['t12']/(1024*1024),2),round($user['t13']/(1024*1024),2),round($user['t14']/(1024*1024),2),round($user['t15']/(1024*1024),2),round($user['t16']/(1024*1024),2),round($user['t17']/(1024*1024),2),round($user['t18']/(1024*1024),2),round($user['t19']/(1024*1024),2),round($user['t20']/(1024*1024),2),round($user['t21']/(1024*1024),2),round($user['t22']/(1024*1024),2),round($user['t23']/(1024*1024),2));
    	$yTraffic = array(round($user['y0']/(1024*1024),2),round($user['y1']/(1024*1024),2),round($user['y2']/(1024*1024),2),round($user['y3']/(1024*1024),2),round($user['y4']/(1024*1024),2),round($user['y5']/(1024*1024),2),round($user['y6']/(1024*1024),2),round($user['y7']/(1024*1024),2),round($user['y8']/(1024*1024),2),round($user['y9']/(1024*1024),2),round($user['y10']/(1024*1024),2),round($user['y11']/(1024*1024),2),round($user['y12']/(1024*1024),2),round($user['y13']/(1024*1024),2),round($user['y14']/(1024*1024),2),round($user['y15']/(1024*1024),2),round($user['y16']/(1024*1024),2),round($user['y17']/(1024*1024),2),round($user['y18']/(1024*1024),2),round($user['y19']/(1024*1024),2),round($user['y20']/(1024*1024),2),round($user['y21']/(1024*1024),2),round($user['y22']/(1024*1024),2),round($user['y23']/(1024*1024),2));
    	$hour = intval(date('H', time()));
    	for ($i=$hour; $i < 24; $i++) { 
    		$tTraffic[$i] = 0;
    	}
    	$this->tTraffic = json_encode($tTraffic);
    	$this->yTraffic = json_encode($yTraffic);
    	$this->display();
    }

    public function friend(){
    	$elite_uid = $_SESSION['elite_uid'];
    	echo '{"nodes":[{"group": 1, "name": "E72970"}, {"group": 1, "name": "D55866"}, {"group": 4, "name": "A50783"}, {"group": 6, "name": "C42994"}, {"group": 3, "name": "B52303"}, {"group": 3, "name": "A78954"}, {"group": 1, "name": "E58644"}, {"group": 1, "name": "B78206"}, {"group": 1, "name": "E39931"}], "links": [{"source": 0, "target": 1, "value": 12},{"source": 0, "target": 2, "value": 12},{"source": 0, "target": 3, "value": 12},{"source": 0, "target": 4, "value": 12},{"source": 0, "target": 5, "value": 12},{"source": 0, "target": 6, "value": 12},{"source": 0, "target": 7, "value": 12},{"source": 0, "target": 8, "value": 12}]}';
    }
}