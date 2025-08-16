<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'area';

    public static function getAllCity($CityID) {
        $city = Area::where('parent_id', $CityID)->orderBy('weight', 'DESC')->get();
        $districts = [];
        foreach ($city as $item) {
            $district = Area::where('parent_id', $item['id'])->orderBy('weight', 'DESC')->get();
            $item->districts = $district;
        }
        return $city;
    }
}
