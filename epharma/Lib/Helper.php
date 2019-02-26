<?php

use Epharma\Model\Option;

if (!function_exists('option')) {

    function option($key) {
        $option = Option::valueOf($key);

        if ($option->count()) {
            $decoded = json_decode($option->first()->value);
            if (json_last_error() == JSON_ERROR_NONE) {
                return $decoded;
            } else {
                return $option->first()->value;
            }
        } else {
            return false;
        }
    }

}
 function send_sms($data)
    {
        $phone = $data['phone'];
        $newotp = isset($data['otp']) ? $data['otp'] : rand(100000, 999999);
        $message = 'Your OTP is : ' . $newotp;
        try {

            $msg = Twilio::message($phone, $message);
            \Log::info($msg);
            return $msg->error_message;
        } catch (\Services_Twilio_RestException $e) {
            return $e->getMessage();
        }
    }

function disPercentage($price, $disPer, $disAmnt, $catDis, $brandDis) {
    if ($catDis != 0 || $brandDis != 0) {
        $array = [
            0 => $catDis,
            1 => $brandDis
        ];
        $maxs = max($array);
        return $maxs;
    } elseif ($disPer != 0 || $disAmnt != 0) {
        if ($disPer != 0) {
            return $disPer;
        } else {
            return $disAmnt;
        }
    }
}

function cat_product_price($price, $disPer, $disAmnt, $catDis, $brandDis) {
    if ($catDis != 0 || $brandDis != 0) {
        $array = [
            0 => $catDis,
            1 => $brandDis
        ];
        $maxs = max($array);
        return number_format(($price - (($price * $maxs) / 100)), 2);
    } elseif ($disPer != 0 || $disAmnt != 0) {
        if ($disPer != 0) {
            return number_format(($price - (($price * $disPer) / 100)), 2);
        } else {
            return number_format(($price - $disAmnt), 2);
        }
    } else {
        return $price;
    }
}
