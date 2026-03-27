<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClientsModel extends Model
{
    use HasFactory;

    protected $table = 'ws_our_clients';

    protected $fillable = [
        'name',
        'designation',
        'company',
        'location',
        'about',
        'rating',
        'contact',
        'video',
        'image',
        'status',
        'created_by',
    ];
}
