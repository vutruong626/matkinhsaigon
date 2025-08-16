<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function generateUniqueCode($model,$model_column)
    {
        do {
            $firstString = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
            $referal_code = $firstString.random_int(1000000, 9999999);
        } while ($model->where($model_column, $referal_code)->first());
  
        return $referal_code;
    }
}
