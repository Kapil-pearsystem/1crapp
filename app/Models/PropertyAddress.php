<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAddress extends Model
{

    use HasFactory;
    protected $table = 'property_address';
    public $timestamps = true;
    protected $fillable = ['id', 'prop_id', 'prop_street', 'prop_city', 'prop_state', 'prop_zip', 'created_at', 'updated_at'];

    public function mainProperty(){
        return $this->belongsOne(MainProperty::class, 'prop_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'prop_city');
    }

    public function state(){
        return $this->belongsTo(State::class, 'prop_state');
    }
}