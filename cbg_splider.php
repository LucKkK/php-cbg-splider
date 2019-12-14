<?php 
function cbg(){
        header("Content-Type:text/html;charset=utf8");
        $http = "https://recommd.xyq.cbg.163.com/cgi-bin/recommend.py?callback=Request.JSONP.request_map.request_0&_=".time()."&act=recommd_by_role&server_id=367&areaid=25&server_name=%E6%98%9F%E6%B5%B7%E6%B9%BE&page=1&query_order=selling_time%20DESC&kindid=0&view_loc=equip_list&count=50";
        $s = file_get_contents($http);
        echo $http;
        $arr = array();
        $r=jsonp_decode($s,true);
        foreach ($r['equips'] as $k => $v) {
            $r['equips'][$k]['href'] = "https://xyq.cbg.163.com/equip?s=367&eid=".$v['eid'];
            // foreach ($v as $m => $n) {
            // 	if(!in_array($m, $arr)){
            // 		$arr[] = $m;
            // 	}
            // }
        }
// var_dump($arr);
        var_dump($r);
        // foreach ($r['equips'] as $key => $value) {
        // 	var_dump($value['highlights']);echo $value['href'];
        // }
}

function jsonp_decode($jsonp, $assoc = false)
    {
        $jsonp = trim($jsonp);
        if(isset($jsonp[0]) && $jsonp[0] !== '[' && $jsonp[0] !== '{') {
            $begin = strpos($jsonp, '(');
            if(false !== $begin)
            {
                $end = strrpos($jsonp, ')');
                if(false !== $end)
                {
                    $jsonp = substr($jsonp, $begin + 1, $end - $begin - 1);
                }
            }
        }

        return json_decode($jsonp, $assoc);
    }

cbg();

