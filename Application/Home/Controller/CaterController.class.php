<?php
namespace Home\Controller;
use Think\Controller;
class CaterController extends Controller {
    public function index(){
    	// 历史每日总额
    	$map['day'] = array(array('GT', strtotime('2014-11-03') - 30 * 24 * 3600), array('ELT', strtotime('2014-11-03')));
    	$map['gender'] = '男';
    	$dailyTradeSum['男'] = M('trade_daily_sum')->field('day, sum')->where($map)->order('day')->select();
    	$map['gender'] = '女';
    	$dailyTradeSum['女'] = M('trade_daily_sum')->field('day, sum')->where($map)->order('day')->select();
    	$temp = array();
    	foreach ($dailyTradeSum as $key => $value) {
    		foreach ($value as $k => $v) {
    			$temp[$key]['day'][] = date('m-d', $v['day']);
    			$temp[$key]['sum'][] = floatval($v['sum']/10000);
    		}
    	}
    	$this->dailyTradeSum = json_encode($temp);
    	print_r($temp);die;
    	$this->display();
    }
}