<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompliancesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_compliances';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'link',
        'new_tab',
        'priority',
        'status',
        'created_by',
    ];

    public $timestamps = true;
}