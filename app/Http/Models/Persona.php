<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    protected $table = 'persona';
    
    protected $primaryKey = 'per_id';
    
    protected $guarded = [];

    public $timestamps = false;
}