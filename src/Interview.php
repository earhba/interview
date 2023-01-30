<?php
class Interview{

    const EARTH_RADIUS = 6371000;
    public function __construct()
    {
        // not used 
    }
    public function ReverseArray($data_string){
        //remove . from string
        $data_string = str_replace(".","",$data_string);
        //string convert to array
        $data_array = explode(" ", $data_string);
        return array_reverse($data_array);
    }

    public function SortArray($string_array){
        
        sort($string_array);
        //convert arrry value to numbers
        $number_array = array_map(function ($array_item){
            return $array_item*1;
            }, $string_array);
        return $number_array;
    }
    
    public function GetDiffArray($array1,$array2){
        
        $result=array_diff($array1,$array2);
        return array_values($result);
    }

    public function GetDistance($place1,$place2){
        
        // convert from degrees to radians
        $latplace1 = deg2rad($place1['lat']);
        $lonplace1 = deg2rad($place1['lon']);
        $latplace2 = deg2rad($place2['lat']);
        $lonplace2 = deg2rad($place2['lon']);

        $lat = $latplace1 - $latplace2;
        $lon = $lonplace1 - $lonplace2;
        //calculation 
        $angle = 2 * asin(sqrt(pow(sin($lat / 2), 2) +
            cos($latplace1) * cos($latplace2) * pow(sin($lon/ 2), 2)));

        $distance_in_meter = $angle * self::EARTH_RADIUS;
        $distance_in_km = $distance_in_meter/1000;
        return round($distance_in_km,2);
    }

    public function GetHumanTimeDiff($time1,$time2){
    
        $time2 = new DateTime($time2);
        $time1 = new DateTime($time1);
        $diff = $time2->diff($time1);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        // human readable time  
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}