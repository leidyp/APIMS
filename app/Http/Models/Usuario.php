<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Usuario extends Model implements Authenticatable
{
    protected $table = 'usuario';
    
    protected $primaryKey = 'us_id';
    
    protected $guarded = [];

    public $timestamps = false;

    use AuthenticableTrait;
    
    protected $fillable = ['us_nombre','us_user','us_password'];
    
    protected $hidden = [
    
      'us_password'
    
    ];

    public function persona(){
      return $this->hasOne('App\Http\Models\Persona','us_id');
    }
}