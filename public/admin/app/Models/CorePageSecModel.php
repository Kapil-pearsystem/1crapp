<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorePageSecModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_cp_sections';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'cp_id',
    ];

    public $timestamps = true;
    
    public function page()
    {
        return $this->belongsTo(CorePageModel::class, 'cp_id', 'id');
    }
}