<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    protected $table = 'paciente';
    
    protected $primaryKey = 'pac_id';
    
    protected $guarded = [];

    public $timestamps = false;
}