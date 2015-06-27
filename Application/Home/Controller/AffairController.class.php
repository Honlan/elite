<?php
namespace Home\Controller;
use Think\Controller;
class AffairController extends Controller {
    public function index(){
    	$this->tags = M('tag_type_boy')->field('tag')->select();
    	$this->tagTypeBoy = json_encode(M('tag_type_boy')->select());
    	$this->tagTypeGirl = json_encode(M('tag_type_girl')->select());
    	
    	$trafficTimezone = M('traffic_timezone')->select();
    	foreach ($trafficTimezone as $key => $value) {
    		$data = array();
    		$data[] = $value['place'];
    		foreach ($value as $k => $v) {
    			if ($k == 'degree' || $k == 'place') continue;
    			else {
    				$data[] = intval($v);
    			}
    		}
    		$temp[$value['degree']][$value['place']] = $data;
    	}
    	$this->trafficTimezone = json_encode($temp);

    	$this->display();
    }
}