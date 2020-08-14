<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomResetPasswordNotification;
use \DB;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class User extends Authenticatable implements Searchable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado_id', 'rol_id', 'name', 'apellido', 'email', 'tipo_doc', 'documento', 'profesion', 'cargo', 'tipo_contrato','celular', 'direccion','direccion2', 'uso_datos', 'uso_imagen', 'password','unidad_id','barrio','localidad'
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
    public function estado()
    {
        return $this->belongsTo('App\Model\Estado', 'estado_id');
    }
    public function unidad()
    {
        return $this->belongsTo('App\Model\Caracterizacion\Unidad', 'unidad_id');
    }
    public function buscarUsuarioPorCorreo( $correo = 'correo@uniandes.edu.co'){

      return $this::where('email', $correo)->first();
    }

    public function scopeBuscarpor($query, $unidad, $rol, $estado ) {
        if (($unidad) &&  ($rol) && ($estado)){
            return $query->where('estado_id', 'like', "%$estado%");
        }
    }

    public function getSearchResult(): SearchResult
    {
      // $urlEdit = route('user.edit', $this->id);
      $url = route('caracterizacion.create', $this->id);
      if( isset($this->caracterizacion) ){
        $url = route('caracterizacion.edit', $this->caracterizacion->id);
      }
       return new SearchResult($this, $this->name . " " . $this->apellido, $url);
    }
    public function caracterizacion()
    {
        return $this->hasOne('App\Model\Caracterizacion\Caracterizacion');
    }
}
