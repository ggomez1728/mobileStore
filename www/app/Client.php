<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identify', 'first_name', 'last_name', 'phone_number', 'email'];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitude', 'id_client', 'id');
    }


}
