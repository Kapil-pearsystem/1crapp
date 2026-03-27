<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbmIncomeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_pbm_incomes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_id',
        'user_id',
        'income_type',
        'income_source',
        'amount',
    ];
    public $timestamps = true;
}
