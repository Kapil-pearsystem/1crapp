<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbmSpandableModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_pbm_spandable_amount';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'agent_id', 'user_id', 'esa', 'ffa', 'fea', 'sfa', 'created_at', 'updated_at'];
    public $timestamps = true;
}
