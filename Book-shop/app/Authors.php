<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    //

    protected $table ='authors';

    /**
     *
     *  relationship 1-n (1 Author - n Book)
     *  
     *
     *
     */
    

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
