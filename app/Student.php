<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Student extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'student';
    protected $fillable = [
        'name','date','score'
    ];
    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }

    public function setCreatedAtAttribute($value)
    {
        // to Disable created_at
    }
}
