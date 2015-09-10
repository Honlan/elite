<?php
namespace Home\Controller;
use Think\Controller;
class StatController extends CommonController {
    public function index(){
        session('elite_uid', '66183190');
        
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
    	$map = array();
        $map['id'] = array('like', $elite_uid.'%');
        $friends = M('users_friends')->where($map)->find();
        if (count($friends) == 0) {
            echo '{"nodes":[], "links":[]}';
        } else {
            $account = $friends['id'];
            $account = explode(':', $account);
            $group = $account[1];
            $account = $account[0];
            $from = '{"source": 0, "target": 1, "value": 12}';

            $friends = explode(',', $friends['friends']);
            $node = '[';
            $link = '[';
            $node = $node.'{"group": '.$group.', "name": '.$account.'},';
            foreach ($friends as $key => $value) {
                $value = explode(':', $value);
                $account = $value[0];
                $group = $value[1];
                $count = $value[2]; 
                $node = $node.'{"group": '.$group.', "name": '.$account.'},';

                $link = $link.'{"source": 0, "target": '.($key+1).', "value": '.$count.'},';
            }
            $node = substr($node, 0, strlen($node)-1);
            $node = $node.']';
            $link = substr($link, 0, strlen($link)-1);
            $link = $link.']';
            $result = '{"nodes":'.$node.', "links":'.$link.'}';
            echo $result;
        }
    }
}