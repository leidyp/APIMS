<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    protected $table = 'medico';
    
    protected $primaryKey = 'med_id';
    
    protected $guarded = [];

    public $timestamps = false;
}