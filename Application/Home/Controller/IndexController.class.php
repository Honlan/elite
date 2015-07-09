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
    public function mensa_status(){
        $query = $_POST['query'];
        $type = $_POST['type'];

		$timeformat = "%Y-%m-%d %X";
		//$Mensa = M('mensa'); // 实例化Mensa对象
        $Mensa = M('oneday'); // 实例化oneday对象
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
        echo json_encode($data);
    }
    
    // 获取各食堂消费数据
    public function mensa_amount(){
        // 传参
        $query = $_POST['query'];

        $timeformat = "%Y-%m-%d %X";
        //$Mensa = M('mensa'); // 实例化Mensa对象
        $Mensa = M('oneday'); // 实例化oneday对象
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
        echo json_encode($data);
    }    

    // 获取消费总额数据
    public function sum_amount(){
        // 传参
        $query = $_POST['query'];

		$timeformat = "%Y-%m-%d %X";
        //$Mensa = M('mensa'); // 实例化Mensa对象
        $Mensa = M('oneday'); // 实例化oneday对象
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
    
    // 预测食堂人流量
    public function mensa_predict(){
        // 传参
        $query = $_POST['query'];
        //$mensa = $_GET['mensa'];
        $mensa = $_POST['mensa'];        
        // 边界条件
        // query是从00:00:00开始的分钟数,减去偏移量300
        // 预测的slice是5min,故还需除以5
        $tidx = ceil(($query-300)/5);
        // 移动窗口的单侧宽度为24*5=120min,所以上区间是180,下区间是24
        if ($tidx>180){
            $tlow = 204-47;
            $thigh = 204;
        }
        elseif ($tidx<25) {
            $tlow = 1;
            $thigh = 1+47;        
        }
        else{
            $tlow = $tidx-24; // 预测窗口23，历史窗口24，加上本身，窗口宽度共48位
            $thigh = $tidx+23;   
        }
        $windows_size = 48;
        // 取数据sql语句
        // select minhang1 from predict_ratios limit 10,48 #返回第10行数据(含)后的48条数据
        $Ratios = M('predict_ratios'); // 实例化predict_ratios对象
        // 复杂语句直接query, 拼接字符串用黑点.
        $select_header = "select ";
        $select_mensa =  "$mensa"." from predict_ratios limit ";
        $select_windows = "$tlow".", "."$windows_size";
        $select_query = $select_header.$select_mensa.$select_windows;
        // echo $select_query;
        $data = $Ratios->query($select_query);
        echo json_encode($data);
    }   
}