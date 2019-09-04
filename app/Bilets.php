<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bilets extends Model
{
    public static function add($data)
    {
        $bilet = new Bilets();
        $bilet->title = $data['title'];
        $bilet->save();
    }
}
