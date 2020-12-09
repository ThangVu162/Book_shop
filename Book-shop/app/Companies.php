<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    //

    protected $table ='companies';

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
