<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthTempCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_authtempcategory';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'status',
    ];

    public $timestamps = true;
    public function template()
    {
        return $this->hasOne(AuthTempModel::class, 'category', 'id')
                    ->where('agent_id', Auth::id());
    }
}