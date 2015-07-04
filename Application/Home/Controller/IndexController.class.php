<?php
namespace Home\Controller;
use Think\Controller;
// Private Function
function DateAdd ($interval, $number, $date) { 
    $date_time_array = getdate($date); 
    $hours = $date_time_array["hours"]; 
    $minutes = $date_time_array["minutes"]; 
    $seconds = $date_time_array["seconds"]; 
    $month = $date_time_array["mon"]; 
    $day = $date_time_array["mday"]; 
    $year = $date_time_array["year"]; 

    switch ($interval) { 
        case "yyyy": $year +=$number; break; 
        case "q": $month +=($number*3); break; 
        case "m": $month +=$number; break; 
        case "y": 
        case "d": 
        case "w": $day+=$number; break; 
        case "ww": $day+=($number*7); break; 
        case "h": $hours+=$number; break; 
        case "n": $minutes+=$number; break; 
        case "s": $seconds+=$number; break; 
    } 

    $timestamp = mktime($hours ,$minutes, $seconds,$month ,$day, $year); 
    return $timestamp;
}
// 路由配置
class IndexController extends Controller {
    public function index(){
    	$ip = get_client_ip();
    	$ts = time();
    	if(!M('pv')->where('ip = "'.$ip.'" AND ts > '.($ts - 3600 * 3))->count()){
    		M('pv')->data(array('ip'=>$ip, 'ts'=>$ts))->add();
    	}
    	$this->display();
    }

    // 获取地图数据
    public function mensa_status($query, $type){
		$timeformat = "%Y-%m-%d %X";
		$Mensa = M('mensa'); // 实例化Mensa对象
        //$Mensa = M('oneday'); // 实例化oneday对象
        // 数据初始化时间
        $stamp0 = "2014-11-03 05:00:00";
        $stamp1 = "2014-11-03 05:01:00";
        // 时间的查询条件
        $time_now = strftime($timeformat ,DateAdd("n" , $query, strtotime($stamp0))); // 从初始时刻开始，增加$query分钟
        $time_next = strftime($timeformat, DateAdd("n" , $query + 1, strtotime($stamp0)));    
        //  查询条件数组化
        $map['types'] = $type;
        $map['times'] = array('between',array($time_now, $time_next));
        // 把查询条件传入查询方法
        $data = $Mensa->where($map)->select();
        $data1 = json_encode($data);
        echo $data1;
    }
    
    // 获取各食堂分布数据
    public function sum_amount($query){
		$timeformat = "%Y-%m-%d %X";
        $Mensa = M('mensa'); // 实例化Mensa对象
        //$Mensa = M('oneday'); // 实例化oneday对象
        // 数据初始化时间
        $stamp0 = "2014-11-03 05:00:00";
        // 时间的查询条件
        $time_now = strftime($timeformat ,DateAdd("n" , $query, strtotime($stamp0))); // 从初始时刻开始，增加$query分钟
        // 复杂语句直接query, 拼接字符串用黑点.
        $select_header = "select amount  from  oneday  where times <";
        $select_time = "'".$time_now."'";
        $select_query = $select_header.$select_time;
        //echo $select_query;
        $data = $Mensa->query($select_query);
        $data1 = json_encode($data);
        echo $data1;
    }      
    
    // 获取消费总额数据
    public function mensa_amount($query){
		$timeformat = "%Y-%m-%d %X";
        $Mensa = M('mensa'); // 实例化Mensa对象
        //$Mensa = M('oneday'); // 实例化oneday对象
        // 数据初始化时间
        $stamp0 = "2014-11-03 05:00:00";
        $stamp1 = "2014-11-03 05:01:00";
        // 时间的查询条件
        $time_now = strftime($timeformat ,DateAdd("n" , $query, strtotime($stamp0))); // 从初始时刻开始，增加$query分钟
        // 复杂语句直接query, 拼接字符串用黑点.
        $select_header = "select toacount, accountname, SUM(amount) as 'sales' from  mensa_name where times <";
        $select_time = "'".$time_now."'";
        $select_group = " GROUP BY toacount ORDER BY SUM(amount) DESC";
        $select_query = $select_header.$select_time.$select_group;
        //echo $select_query;
        $data = $Mensa->query($select_query);
        $data1 = json_encode($data);
        echo $data1;
    }

}