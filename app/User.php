<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_id', 'name','name2', 'apellido', 'apellido2', 'email', 'tipo_doc', 'documento', 'profesion', 'cargo', 'tipo_contrato','celular', 'direccion','direccion2', 'uso_datos', 'uso_imagen', 'password','unidad_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'rol_id');
    }
    public function unidad()
    {
        return $this->belongsTo('App\Caracterizacion', 'unidad_id');
    }

}
