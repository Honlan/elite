<?php
namespace Home\Controller;
use Think\Controller;
class AffairController extends Controller {
    public function index(){
        session('elite_uid', '66183190');
        
        // 网络流量分类统计
    	$this->tags = M('tag_type_boy')->field('tag')->select();
    	$this->tagTypeBoy = json_encode(M('tag_type_boy')->select());
    	$this->tagTypeGirl = json_encode(M('tag_type_girl')->select());
    	
        // 本硕博wifi流量时域分布
    	$trafficTimezone = M('traffic_timezone')->select();
    	$temp = array();
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

        // 洗浴统计
    	$bathStat = M('bath_stat')->select();
    	$temp = array();
    	foreach ($bathStat as $key => $value) {
    		$data = array();
    		foreach ($value as $k => $v) {
    			if ($k == 'code') continue;
    			else {
    				$data[] = intval($v);
    			}
    		}
    		if ($value['code'] == '1000091') {
    			$temp['闵行西区浴室'] = $data;
    		} else if ($value['code'] == '1000092') {
    			$temp['闵行北区浴室'] = $data;
    		} else if ($value['code'] == '1000093') {
    			$temp['闵行东区浴室'] = $data;
    		} else if ($value['code'] == '1000095') {
    			$temp['六期水控'] = $data;
    		}
    	}
    	$this->bathStat = json_encode($temp);
        $now = time() % (24 * 3600) + strtotime('2014-11-03 08:00:00');
        // 最近两小时实时洗浴
        $map = array();
        $map['toaccount'] = 1000091;
        $map['timestamp'] = array(array('EGT', $now - 3600 * 2), array('ELT', $now));
        $bathRealtime['1000091'] = M('bath_realtime')->where($map)->field('timestamp, count')->order('timestamp')->select();
        $map['toaccount'] = 1000092;
        $bathRealtime['1000092'] = M('bath_realtime')->where($map)->field('timestamp, count')->order('timestamp')->select();
        $map['toaccount'] = 1000093;
        $bathRealtime['1000093'] = M('bath_realtime')->where($map)->field('timestamp, count')->order('timestamp')->select();
        $map['toaccount'] = 1000095;
        $bathRealtime['1000095'] = M('bath_realtime')->where($map)->field('timestamp, count')->order('timestamp')->select();
        $temp = array();
        foreach ($bathRealtime as $key => $value) {
            foreach ($value as $k => $v) {
                $temp[$key]['timestamp'][] = date('H:i', $v['timestamp']);
                $temp[$key]['count'][] = intval($v['count']);
            }
        }
        $this->bathRealtime = json_encode($temp);

        // 一卡通 vs Wifi
        $students['女'] = M('students')->field('ecard, wifi')->where(array('gender'=>'女'))->select();
        $students['男'] = M('students')->field('ecard, wifi')->where(array('gender'=>'男'))->select();
        $temp = array();
        foreach ($students as $key => $value) {
            foreach ($value as $k => $v) {
                if (rand(0, 10) == 1) {
                   $temp[$key][] = [round(intval($v['ecard'])/100,1), round(floatval($v['wifi'])/1024,3)]; 
                }
            }
        }
        $this->students = json_encode($temp);

    	$this->display();
    }
}