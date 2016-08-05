<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mobile', 'status', 'id_client', 'fails', 'others'];

    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'id_client');
    }

    public function mobile_type()
    {
        return $this->hasOne('App\Mobile', 'id', 'mobile');
    }

    public function state_type()
    {
        return $this->hasOne('App\StatusSolicitude', 'id', 'status');
    }
}
