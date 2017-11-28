<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    protected $table = 'cita';
    
    protected $primaryKey = 'cita_id';
    
    protected $guarded = [];

    public $timestamps = false;
}