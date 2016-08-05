<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mobiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
