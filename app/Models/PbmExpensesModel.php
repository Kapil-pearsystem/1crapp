<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbmExpensesModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_pbm_expenses';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'agent_id',
        'user_id',
        'expenses_name',
        'spandable_percent',
        'current_amount',
        'required_amount',
    ];
}
