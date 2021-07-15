<?php

namespace App\Service;

use App\Models\DailyHoroscope;
use DB;

class HoroscopeService{
    
	public function getHoroscope($zodiac_id, $year, $month =""){
        $list = [];
        $result = [];
        $allData = DailyHoroscope::select('day_str', 'day', 'month', 'year', 'score')->where('zodiac_id',$zodiac_id)->where('year',$year);
        if($month != ""){
            $allData->where('month', $month);
        }
        $allData = $allData->get()->toArray();
        foreach($allData as $data){
            $list[$data['month']][] = $data;
        }
        foreach ($list as $key => $data) {
            $result[$key] = $this->organizeMonth($key, $data);
        }
        return $result;
    }


    public function organizeMonth($key, $data){
        $day = $data[0]['day_str'];
        if($day == 'Sun') $loop = 6;
        else if($day == 'Sat') $loop = 5;
        else if($day == 'Fri') $loop = 4;
        else if($day == 'Thu') $loop = 3;
        else if($day == 'Wed') $loop = 2;
        else if($day == 'Tue') $loop = 1;
        else if($day == 'Mon') $loop = 0;

        $start = []; $end = [];
        $startDate = $data[0]['year'].'-'.$data[0]['month'].'-'.$data[0]['day'];
        for($i = 0; $i < $loop; $i++){
            $newdate = date('Y-m-d-D', strtotime(($i-$loop).' days', strtotime($startDate)));
            $newdate = explode("-", $newdate); 
            $start[$i]['score']= "";
            $start[$i]['day_str']= $newdate[3];
            $start[$i]['day']= $newdate[2];
            $start[$i]['month']= $newdate[1];
            $start[$i]['year']= $newdate[0];
        }
        $lastDate = end($data);
        $endDate = $lastDate['year'].'-'.$lastDate['month'].'-'.$lastDate['day'];
        $endLoop = 43 - (count($start) + count($data));
        for($i=1;$i<$endLoop;$i++){
            $newdate = date('Y-m-d-D', strtotime($i.' days', strtotime($endDate)));
            $newdate = explode("-", $newdate); 
            $end[$i]['score']= "";
            $end[$i]['day_str']= $newdate[3];
            $end[$i]['day']= $newdate[2];
            $end[$i]['month']= $newdate[1];
            $end[$i]['year']= $newdate[0];
        }
        $result = array_merge($start, $data, $end);
        return $result;  
    }
}