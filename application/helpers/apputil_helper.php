<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('format_yen')) {
    if (!function_exists('money_format')) {

        /**
         * PHP Native replacement for money_format
         *
         * @param $format
         * @param $number
         *
         * @return mixed
         */
        function money_format($format, $number) {
            $regex = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?' .
                    '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
            if (setlocale(LC_MONETARY, 0) == 'C') {
                setlocale(LC_MONETARY, '');
            }
            $locale = localeconv();
            preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
            foreach ($matches as $fmatch) {
                $value = floatval($number);
                $flags = array(
                    'fillchar' => preg_match('/\=(.)/', $fmatch[1], $match) ?
                    $match[1] : ' ',
                    'nogroup' => preg_match('/\^/', $fmatch[1]) > 0,
                    'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
                    $match[0] : '+',
                    'nosimbol' => preg_match('/\!/', $fmatch[1]) > 0,
                    'isleft' => preg_match('/\-/', $fmatch[1]) > 0
                );
                $width = trim($fmatch[2]) ? (int) $fmatch[2] : 0;
                $left = trim($fmatch[3]) ? (int) $fmatch[3] : 0;
                $right = trim($fmatch[4]) ? (int) $fmatch[4] : $locale['int_frac_digits'];
                $conversion = $fmatch[5];
                $positive = true;
                if ($value < 0) {
                    $positive = false;
                    $value *= -1;
                }
                $letter = $positive ? 'p' : 'n';
                $prefix = $suffix = $cprefix = $csuffix = $signal = '';
                $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
                switch (true) {
                    case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
                        $prefix = $signal;
                        break;
                    case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
                        $suffix = $signal;
                        break;
                    case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
                        $cprefix = $signal;
                        break;
                    case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
                        $csuffix = $signal;
                        break;
                    case $flags['usesignal'] == '(':
                    case $locale["{$letter}_sign_posn"] == 0:
                        $prefix = '(';
                        $suffix = ')';
                        break;
                }
                if (!$flags['nosimbol']) {
                    $currency = $cprefix .
                            ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
                            $csuffix;
                } else {
                    $currency = '';
                }
                $space = $locale["{$letter}_sep_by_space"] ? ' ' : '';
                $value = number_format($value, $right, $locale['mon_decimal_point'], $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
                $value = @explode($locale['mon_decimal_point'], $value);
                $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
                if ($left > 0 && $left > $n) {
                    $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
                }
                $value = implode($locale['mon_decimal_point'], $value);
                if ($locale["{$letter}_cs_precedes"]) {
                    $value = $prefix . $currency . $space . $value . $suffix;
                } else {
                    $value = $prefix . $value . $space . $currency . $suffix;
                }
                if ($width > 0) {
                    $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
                            STR_PAD_RIGHT : STR_PAD_LEFT);
                }
                $format = str_replace($fmatch[0], $value, $format);
            }
            return $format;
        }

    }
}

if (!function_exists('printv')) {

    function printv($val, $key = 'Key ', $color = '#0000FF') {

        if (strpos(base_url(), 'localhost')) {
            echo '<font color=' . $color . '><br/>' . $key . ' : <br/>';
            if (is_array($val)) {
                print_r($val);
            } else {
                echo $val;
            }
            echo '</font>';
        }
    }

}

if (!function_exists('lastqry')) {

    function lastqry($db, $key = 'QRY') {
        printv($db->last_query(), $key, '#800080');
    }

}
if (!function_exists('encodeemail')) {

    function encodeemail($email) {
        return str_replace("@", "-", $email);
    }

}

if (!function_exists('decodeemail')) {

    function decodeemail($email) {
        return str_replace("-", "@", $email);
    }

}

if (!function_exists('getval')) {

    function getval($arrayobj, $index, $isMode = 'NORMAL') {
        $value = isset($arrayobj[$index]) ? trim($arrayobj[$index]) : '';
        return $value;
    }

}
if (!function_exists('urlpattern')) {

    function urlpattern() {

        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        return $pattern;
    }

}

if (!function_exists('removespc')) {

    function removespc($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = str_replace('(', '-', $string);
        $string = str_replace(')', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
    }

}

if (!function_exists('strcrop')) {

    function strcrop($string, $maxCoun) {
        $len = strlen($string);
        $maxCoun = intval($maxCoun);
        if ($maxCoun > 3 && $len > $maxCoun) {
            $cropedstr = substr($string, 0, intval($maxCoun));
            $cropedstr = $cropedstr . '...';
            //printv(count_chars($string),'ppppppppppppppppppppppppppppppp','green');
            return $cropedstr;
        } else {
            return $string;
        }
    }

}
if (!function_exists('getActiveMenu')) {

    function getActiveMenu() {
        $CI = & get_instance();
        $message = $CI->session->userdata(Cons::currenPage_KEY);
        //$message = "Change feedbackmessager";
        if (isset($message) && trim($message) != "") {

            return $message;
        } else {
            return "";
        }
    }

}

if (!function_exists('removeFeedbackMessage')) {

    function removeFeedbackMessage($key = null) {
        // printv($_SESSION[Cons::feedbackmessageKey]);
        //unset($_SESSION[Cons::param_passing_through_session]);
        $CI = & get_instance();

        $CI->session->unset_userdata(($key == null ? Cons::feedbackmessageKey : $key));
    }

}

if (!function_exists('getFeedbackMessage')) {

    function getFeedbackMessage($key = null) {
        // printv($_SESSION[Cons::feedbackmessageKey]);
        //unset($_SESSION[Cons::param_passing_through_session]);
        $CI = & get_instance();
        $message = $CI->session->userdata(($key == null ? Cons::feedbackmessageKey : $key));
        //$message = "Change feedbackmessager";
        if (isset($message) && trim($message) != "") {
            removeFeedbackMessage($key);
            return $message;
        }
        removeFeedbackMessage();
    }

}

if (!function_exists('seoUrl')) {

    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

}

function limitString($string, $limit = 30) {
    // Return early if the string is already shorter than the limit
    if (strlen($string) < $limit) {
        return $string;
    }

    $regex = "/(.{1,$limit})\b/";
    preg_match($regex, $string, $matches);
    return $matches[1];
}
