<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('keygens')) {


    function keygens($type ='') {
        
        $rondom = sprintf("%04d", mt_rand(1, 9999));
        $rondom1 = sprintf("%03d", mt_rand(1, 999));
        
        $key = $type.$rondom.$rondom1;
        
        
        //printv($key,$num_str);
        return $key;
    }

}


