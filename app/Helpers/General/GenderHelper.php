<?php


namespace App\Helpers\General;

class GenderHelper
{
    function transform($gender){
        if ($gender == 'mens') {
            $gender = 'male';
        } elseif ($gender == 'womens') {
            $gender = 'female';
        } elseif ($gender == 'all') {
            $gender = 'all';
        }
        else{
            $gender='unknown';
        }
        return $gender;
    }

    function re_transform($gender){
        if ($gender == 'male') {
            $gender = 'mens';
        } elseif ($gender == 'female') {
            $gender = 'womens';
        } elseif ($gender == null) {
            $gender = 'all';
        }
        else {
            $gender='unknown';
        }
        return $gender;
    }
}
