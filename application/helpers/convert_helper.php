<?php
class convertfn{
    public $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    public function gci()
    {
        return $this->ci;
    }
}

function getcon()
{
    $obj = new convertfn();
    return $obj->gci();
}

function conDateTimeFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y H:i:s");
    }else{
        return $datetime;
    }
    
}

function conDateFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y");
    }else{
        return $datetime;
    }
    
}

function conDateFormat($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"Y-m-d");
    }else{
        return $datetime;
    }
}



function conPrice($priceinput)
{
    $oriprice = str_replace("," , "" , $priceinput);
    return $oriprice;
}

function conNumToNull($number)
{
    if($number == 0.0000 || $number == ""){
        return "";
    }else{
        return valueFormat($number);
    }
}

function conNumToText($number)
{
    if($number == 0.0000 || $number == ""){
        return "None";
    }else{
        return valueFormat($number);
    }
}


function getLeadtime($startDatetime , $finishDatetime)
{
    if($startDatetime != "" && $finishDatetime != ""){
        $current_date_time_sec = strtotime($startDatetime); 
        $future_date_time_sec = strtotime($finishDatetime); 
        $difference = $future_date_time_sec - $current_date_time_sec; 
        $hours = ($difference / 3600); 
        $minutes = ($difference / 60 % 60); 
        $seconds = ($difference % 60); 
        $days = ($hours / 24); 
        // $hours = ($hours % 24); 
        // echo "The difference is <br/>"; 
        // if ($days < 0) { 
        //     echo ceil($days) . " days AND "; 
        // } else { 
        //     echo floor($days) . " days AND "; 
        // } 
        return sprintf("%02d", $hours) . ":" . sprintf("%02d", $minutes) . ":" . sprintf("%02d", $seconds); 
    }else{
        return "";
    }
    
}

function getLeadtimeOnlytime($start_time , $end_time , $start_date , $end_date)
{
    if($start_time != "" && $end_time != ""){

        // Con Start , End  Date Sys
        $startOldCon = conDateFormat($start_date);
        $endOldCon = conDateFormat($end_date);



        $dateNow = date("Y-m-d");
        $conStart_time = "$startOldCon $start_time";
        $conEnd_time = "$endOldCon $end_time";

        $current_date_time_sec = strtotime($conStart_time); 
        $future_date_time_sec = strtotime($conEnd_time); 
        $difference = $future_date_time_sec - $current_date_time_sec; 
        $hours = ($difference / 3600); 
        $minutes = ($difference / 60 % 60); 
        $seconds = ($difference % 60); 
        $days = ($hours / 24); 
        // $hours = ($hours % 24); 
        // echo "The difference is <br/>"; 
        // if ($days < 0) { 
        //     echo ceil($days) . " days AND "; 
        // } else { 
        //     echo floor($days) . " days AND "; 
        // } 
        return sprintf("%02d", $hours) . ":" . sprintf("%02d", $minutes) . ":" . sprintf("%02d", $seconds); 
    }else{
        return "";
    }
    
}





?>