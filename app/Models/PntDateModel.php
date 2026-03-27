<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PntDateModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_pnt_dates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agent_id',
        'user_id',
        'last_year_date',
        'this_year_date',
        'current_year_date',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
