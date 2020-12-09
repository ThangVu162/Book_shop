<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //

    protected $table ='books';

    /**
     *
     *  relationship 1-n (1 Category - n Book)
     *  
     *  relationship 1-n (1 Author - n Book)
     *  
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

}
