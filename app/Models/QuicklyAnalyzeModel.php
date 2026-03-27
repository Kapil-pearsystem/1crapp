<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QuicklyAnalyzeModel extends Model
{
    use HasFactory;
    protected $table = 'ws_quickly_analyze';

    protected $fillable = [
        'title', 'image', 'description', 'status', 'created_by'
    ];
}
