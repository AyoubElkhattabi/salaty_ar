<?php
namespace App\Traits;
use DateTime;
use DateTimezone;
use IslamicNetwork\PrayerTimes\PrayerTimes as PrayerTimes;

trait PrayerInfo{



    function getPrayerInfo($timeZone,$methode,$latitude,$longitude){
        // Bring Data Of Prayer Times
        // ['Fajr','Sunrise','Dhuhr','Asr','Sunset','Maghrib','Isha','Imsak','Midnight']
        $prayerTimes = new PrayerTimes($methode);
        $times = $prayerTimes->getTimesForToday($latitude, $longitude,$timeZone);
        $dateNow = new DateTime();
        if($dateNow->format(DateTime::ATOM)>=$times['Isha']){
            $date = new DateTime('tomorrow', new DateTimezone($timeZone));
            $times = $prayerTimes->getTimes($date, $latitude, $longitude, null, PrayerTimes::LATITUDE_ADJUSTMENT_METHOD_ANGLE, null);
        }

        // Get The Next Prayer Times
        foreach($times as $key=>$val){
            if($key == 'Sunrise' || $key == 'Sunset') continue;
            if(time()< strtotime($times[$key]))
            {
            $nextTime = $key;
            break;
            }
        }

        //  get the Remaine Time for  next pray
        $diff = abs(strToTime($times[$nextTime]) - time());
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
        if(strlen($hours)==1) $hours = '0'.$hours;
        if(strlen($minutes)==1) $minutes = '0'.$minutes;
        if(strlen($seconds)==1) $seconds = '0'.$seconds;

        // Get Salat Times Formatted
        foreach($times as $key=>$val){
            $d = new DateTime($val);
            $c = $d->format('H:i');
            $times[$key] = $c;
        }


        return
        (object)[
            'prayerTimes'=>$times,
            'nextPrayer'=>$nextTime,
            'remaineTime'=>$hours.':'.$minutes.':'.$seconds
        ];


    }


}
