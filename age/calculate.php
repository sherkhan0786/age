<?php
   if(isset($_POST['year']))
   {
        $day = (float)$_POST['day'];
        $month = (float)$_POST['month'];
        $year = (float)$_POST['year'];
        $hour = (float)$_POST['hour'];
        $minute = (float)$_POST['minute'];
        $second = (float)$_POST['second'];
     
        calculate();
    }
       function calculate(){

           global $day, $month, $year, $hour, $minute, $second;
           $date1=date_create($year ."-".$month."-".$day." ".$hour.":".$minute.":".$second);
           $date2=date_create(date("Y-m-d H:i:s"));
           $diff=date_diff($date2,$date1);

           echo $diff->format("%y years %m months %d days %h hours %i minutes %s seconds");
       }
?>