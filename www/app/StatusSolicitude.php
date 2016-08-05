<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusSolicitude extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status_solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'info'];

}
