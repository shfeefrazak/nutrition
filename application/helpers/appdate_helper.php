<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('getDayCountInBetween')) {

    function getDayCountInBetween($date1, $date2) {
        $d2 = strtotime($date2);
        $d1 = strtotime($date1);
        $datediff = $d2 - $d1;
        $dayCount = floor($datediff / (60 * 60 * 24));
        return $dayCount;
    }

}

if (!function_exists('getFirstDayOfMonth')) {

    function getFirstDayOfMonth($date = null) {
        $day = null;
        if ($date != null) {
            //date("Y-m-t", strtotime($day));
        } else {
            $day = date('Y-m-01 00:00:01');
        }
        return $day;
    }

}

if (!function_exists('getLastDayOfMonth')) {

    function getLastDayOfMonth($date = null) {
        $day = null;
        if ($date != null) {
            
        } else {
            $day = date('Y-m-t 23:59:59');
        }
        return date("Y-m-t 23:59:59", strtotime($day));
    }

}
if (!function_exists('appdateformat')) {

    function appdateformat($originalDate) {
        return date("d-m-Y H:i:s", strtotime($originalDate));
    }

}

if (!function_exists('getCurrentDateWithTime')) {

    function getCurrentDateWithTime() {
        date_default_timezone_set('Asia/Kolkata');
        return date('Y-m-d H:i:s');
    }

}
if (!function_exists('appDateFormat')) {

    function appDateFormat1($originalDate) {
        return date("d-m-Y H:i:s", strtotime($originalDate));
    }

}

if (!function_exists('uiDate2DBdate')) {

    function uiDate2DBdate($originalDate, $isTimeAdded = false) {
        if (isset($originalDate) && trim($originalDate) != '') {
            if ($isTimeAdded) {
                return date("Y-m-d H:i:s", strtotime($originalDate));
            } else {
                return date("Y-m-d", strtotime($originalDate));
            }
        } else {
            return '';
        }
    }

}

if (!function_exists('dbDate2UIdate')) {

    function dbDate2UIdate($originalDate, $isTimeAdded = false) {
        if (isset($originalDate) && trim($originalDate) != '') {
            if ($isTimeAdded) {
                return date("d-m-Y H:i:s", strtotime($originalDate));
            } else {
                return date("d-m-Y", strtotime($originalDate));
            }
        } else {
            return '';
        }
    }

}


if (!function_exists('getCurrentDate')) {

    function getCurrentDate() {
        date_default_timezone_set('Asia/Kolkata');
        return date("d/m/Y");
    }

}

if (!function_exists('getCurrentTime')) {

    function getCurrentTime() {
        date_default_timezone_set('Asia/Kolkata');
        return date("h:i a");
    }

}
if (!function_exists('getCurrentTime24')) {

    function getCurrentTime24() {
        date_default_timezone_set('Asia/Kolkata');
        return date("H:i:s");
    }

}



if (!function_exists('dateStrToTimestap_start')) {

    function dateStrToTimestap_start() {
        date_default_timezone_set('Asia/Kolkata');
        return date('Y-m-d H:i:s');
    }

}
if (!function_exists('convertStringtodate')) {

    function convertStringtodate($strDate) {

        $time = strtotime($strDate);

        $dateval = date('Y-m-d H:i:s', $time);
        return $dateval;
    }

}
if (!function_exists('dateStrToTimestap_end')) {

    function dateStrToTimestap_end() {
        date_default_timezone_set('Asia/Kolkata');
        return date('Y-m-d H:i:s');
    }

}

if (!function_exists('currentdateMilsec')) {

    function currentdateMilsec() {
        $milliseconds = round(microtime(true) * 1000);
        return $milliseconds;
    }

}



if (!function_exists('convertStringtodate')) {
function convertStringtodate($strDate){
   $time = strtotime($strDate);

                   $dateval = date('Y-m-d H:i:s',$time);
                   return $dateval;
}
}


