<?php


namespace App\Helpers\General;


use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class GenderHelper
{
    function transform($gender){
        if ($gender == 'mens') {
            $gender = 'male';
        } elseif ($gender == 'womens') {
            $gender = 'female';
        } elseif ($gender == 'all') {
            $gender = 'all';
        } else {
            abort(404, 'no category found');
        }
        return $gender;
    }
}
