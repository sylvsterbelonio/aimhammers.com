<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Date {
 
  public function getMonth($month,$type)
        {
        $dataf=array('January','February','March','April','May','June','July','August','September','October','November','December');
        $datas=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $datas=array('Jan.','Feb.','Mar.','Apr.','May.','Jun.','Jul.','Aug.','Sep.','Oct.','Nov.','Dec.'); 
        
        if($type="full") return $dataf[val($month)];
        if($type="short") return $dataf[val($month)];      
        if($type="short-dot") return $dataf[val($month)];
        }
  
  public function getYearList($latestYear=2016,$oldestYear=1850,$default="Year")
        {
        $html="";
        for($i=$latestYear;$i>=$oldestYear;$i--)
              {
              $html.="<option value=$i>$i</option>";
              }
        return $html;
        }
  
  public function convertFullDateTime($date) 
        {         
         return date("F j, Y g:i a", strtotime($date));
        }
  
        public function nameFormat($value,$type)
              {
              if($type=="year")
                  return ($value>1) ? " Years " : " Year ";
              else if($type=="month")
                  return ($value>1) ? " Months " : " Month ";
              else if($type=="day")
                  return ($value>1) ? " Days " : " Day ";    
              else if($type=="week")
                  return ($value>1) ? " Weeks " : " Week ";     
              else if($type=="hour")
                  return ($value>1) ? " Hours " : " Hour ";              
              else if($type=="minute")
                  return ($value>1) ? " Minutes " : " Minute ";
              else if($type=="second")
                  return ($value>1) ? " Seconds " : " Second ";        
              else if($type=="milisecond")
                  return ($value>1) ? " Miliseconds " : " Milisecond ";                                             
              }
              
        public function getWeeks($value)      
              {
              if($value>=7)
                  {$tot = $value/7;
                  return round($tot,0)." ".$this->nameFormat($tot,"week");}
              else if($value==1)
                  {
                  return " Just Yesterday ";
                  }   
              else
                  {
                  return $value." ".$this->nameFormat($value,"day");
                  }
              }
        
        public function getHours($value)
              {
              if($value==1)
                  return $value." ".$this->nameFormat($value,"hour");
              if($value<=3)
                  return "Few " . $this->nameFormat($value,"hour");
              else
                  return $value." ". $this->nameFormat($value,"hour");
              }
      
        public function getMinutes($value)
              {
              if($value==1)
                  return $value." ".$this->nameFormat($value,"minute");
              if($value<=5)
                  return "Few " . $this->nameFormat($value,"minute");
              else
                  return $value." ". $this->nameFormat($value,"minute");
              }
  
  public function getTimeGap($data)
        {
        date_default_timezone_set('Australia/Currie');
        $datetime1 = new date();
        $datetime2 = new DateTime($data);
        //$interval = $datetime1->diff($datetime2);
        //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %S seconds');
        
        $unixOriginalDate = strtotime($data);
        $unixNowDate = strtotime('now');
        $interval = $unixNowDate - $unixOriginalDate ;
        
        $years = (int) ($interval / 13286000);
        $months = (int) ($interval / 2592000);
        $days = (int)($interval / 86400);
        $hours = (int)($interval / 3600);
        $minutes = (int)($interval / 60);
        $seconds = $interval;
    
        $years = $years;
        if($years>0) return $years.$this->nameFormat($years,"year") . "Ago";
        $months = $months;
        if($months>0) return $months.$this->nameFormat($months,"month") . "Ago";
        $days = $days;
        if($days>0) return  $this->getWeeks($days) . "Ago";
        $hours = $hours;
        if($hours>0) return  $this->getHours($hours) . "Ago";                        
        $minutes = $minutes;
        if($minutes>0) return  $this->getMinutes($minutes) . "Ago";          

        }
 
 }
?>
