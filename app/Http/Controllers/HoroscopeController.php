<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyHoroscope;
use App\Service\HoroscopeService;
use App\Http\Requests\HoroscopeRequest;
use App\Http\Requests\HoroscopeYearRequest;

class HoroscopeController extends Controller
{   
    public function __construct(){
        $this->horoscopeService = new HoroscopeService();
    }

    public function generateHoroscope(HoroscopeYearRequest $request){
        $signs = getZodiacSigns();
        return view('genereate_horoscope')->with('signs',$signs);
    }

    public function SaveHoroscope(HoroscopeYearRequest $request){
        $list = array();
        $year = $request->year;

        $existingHoroscope = DailyHoroscope::where('year', $year)->first();
        if(!is_null($existingHoroscope) && is_null($request->regenerate)){
            $msg = "Horoscope of ".$year." already exists. Do you want to regenerate ?";
            return redirect()->back()->with('exist', $msg)->withInput();
        }
        
        if(!is_null($request->regenerate)){
            DailyHoroscope::where('year', $year)->delete();
        }

        $j = 0;
        for($i = 1; $i <=12; $i++){
            for($month =1 ; $month <=12; $month++){
                $number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                for($d=1; $d<=$number; $d++){
                    $time=mktime(12, 0, 0, $month, $d, $year);  
                    $date = explode("-", date('Y-m-d-D', $time));     
                    if ($date[1]==$month){
                        $list[$j]['zodiac_id']= $i;
                        $list[$j]['score']= rand(1,10);
                        $list[$j]['day_str']= $date[3];
                        $list[$j]['day']= $date[2];
                        $list[$j]['month']= $date[1];
                        $list[$j]['year']= $date[0];
                        $j++;
                    }      
                }
            }
        }
        $result = DailyHoroscope::insert($list);
        if($result){
            $msg = "Horoscope of ".$year." genereated successfully";
            return redirect()->back()->with('success', $msg);
        }
        else{
            return redirect()->back()->with('error', "Couldn't save!")->withInput();
        }
    }

    public function horoscope(HoroscopeRequest $request){
        $currentRoute = $request->path();
        $signs = getZodiacSigns();
        $list = [];

        if($request->method() == 'POST'){
            $zodiac_id = $request->zodiac_id;
            $year = $request->year;
            $list = $this->horoscopeService->getHoroscope($zodiac_id, $year);
            return view('horoscope')->with('signs',$signs)->with('list',$list)->with('zodiac_id',$zodiac_id)->with('year',$year)->with('currentRoute', $currentRoute);
        }
        else{
            return view('horoscope')->with('signs',$signs)->with('currentRoute', $currentRoute);
        }
        
    }


    public function bestMonth(HoroscopeRequest $request){
        $signs = getZodiacSigns();
        $list = array();
        if($request->method() == 'POST'){
            $best_month = "";
            $zodiac_id = $request->zodiac_id;
            $year = $request->year;
            $query = "SELECT zodiac_id,`month`,`year`, (avg(score)) AS score FROM `daily_horoscopes` WHERE `year`='{$year}' AND zodiac_id = '{$zodiac_id}' GROUP BY `year`,`month`,`zodiac_id` ORDER BY score DESC";
            $result = \DB::select($query);
            if(count($result) > 0){
                $best_month = $result[0]->month;
                $list = $this->horoscopeService->getHoroscope($zodiac_id, $year, $best_month);
                $best_month = date("F", strtotime($year.'-'.$best_month.'-1'));
            }
            return view('best_month')->with('signs',$signs)->with('list',$list)->with('zodiac_id',$zodiac_id)->with('year',$year)->with('best_month',$best_month);
        }
        return view('best_month')->with('signs',$signs);
    }


    public function bestYear(HoroscopeYearRequest $request){
        $list = array();
        if($request->method() == 'POST'){
            $zodiac_id = "";
            $year = $request->year;
            $query = "SELECT zodiac_id,`year`, (AVG(score)) AS score FROM `daily_horoscopes` WHERE `year`='{$year}' GROUP BY zodiac_id, `year` ORDER BY score DESC";
            $result = \DB::select($query);
            if(count($result) > 0){
                $result = \DB::select($query);
                $zodiac_id = $result[0]->zodiac_id;
            }
            $list = $this->horoscopeService->getHoroscope($zodiac_id, $year);
            return view('best_year')->with('list',$list)->with('year',$year)->with('zodiac_id',$zodiac_id);
        }
        return view('best_year');
    }


    

}
