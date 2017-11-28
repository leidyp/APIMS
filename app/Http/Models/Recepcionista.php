<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    protected $table = 'recepcionista';
    
    protected $primaryKey = 'rec_id';
    
    protected $guarded = [];

    public $timestamps = false;
}