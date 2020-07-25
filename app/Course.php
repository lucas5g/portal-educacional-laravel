<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function disciplines()
    {
        return $this->hasMany('App\Discipline');
    }
}
