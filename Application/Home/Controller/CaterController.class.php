<?php
namespace Home\Controller;
use Think\Controller;
class CaterController extends Controller {
    public function index(){
        session('elite_uid', '66183190');

    	// 历史每日总额
        $map = array();
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

    	// 实时餐饮总额
    	$now = time() % (24 * 3600) + strtotime('2014-11-03 08:00:00');
        $map = array();
    	$interval = 2;
    	$map['timestamp'] = array('ELT', $now - $interval * 4);
    	$todayMensa['timestamp'][] = date("H:i:s", $now - $interval * 4);
    	$todayMensa['amount'][] = intval(M('trade_today')->where($map)->sum('amount')/100);
    	$map['timestamp'] = array('ELT', $now - $interval * 3);
    	$todayMensa['timestamp'][] = date("H:i:s", $now - $interval * 3);
    	$todayMensa['amount'][] = intval(M('trade_today')->where($map)->sum('amount')/100);
    	$map['timestamp'] = array('ELT', $now - $interval * 2);
    	$todayMensa['timestamp'][] = date("H:i:s", $now - $interval * 2);
    	$todayMensa['amount'][] = intval(M('trade_today')->where($map)->sum('amount')/100);
    	$map['timestamp'] = array('ELT', $now - $interval * 1);
    	$todayMensa['timestamp'][] = date("H:i:s", $now - $interval * 1);
    	$todayMensa['amount'][] = intval(M('trade_today')->where($map)->sum('amount')/100);
    	$map['timestamp'] = array('ELT', $now - $interval * 0);
    	$todayMensa['timestamp'][] = date("H:i:s", $now - $interval * 0);
    	$todayMensa['amount'][] = intval(M('trade_today')->where($map)->sum('amount')/100);
    	$this->todayMensa = json_encode($todayMensa);
    	$this->now = $now;

    	$this->display();
    }

    public function realtime(){
    	// 根据时间戳获取实时数据
    	$now = $_POST['timestamp'];
    	$map = array();
    	$map['timestamp'] = array('ELT', $now);
    	echo M('trade_today')->where($map)->sum('amount')/100;
    }
}