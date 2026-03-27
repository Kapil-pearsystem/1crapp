<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalltoActionModel extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'tbl_call_to_actions';

    // Mass assignable attributes
    protected $fillable = [
        'title',
        'description',
        'left_link_title',
        'left_link_new_tab',
        'right_link_title',
        'right_link_new_tab',
        'left_link_url',
        'right_link_url',
        'section',
        'image',
        'status',
        'created_by',
    ];

    // If you're using timestamps (created_at, updated_at), this is optional
    public $timestamps = true;

    // Optionally, define relationships (example: creator user)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
