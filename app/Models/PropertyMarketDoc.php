<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMarketDoc extends Model
{
    protected $table = 'propertymarket_docs';

    protected $fillable = [
        'propertymarket_id',
        'type',
        'path',
        'uploaded_by'
    ];
    public function property()
    {
        return $this->belongsTo(PropertyMarketModel::class, 'propertymarket_id', 'id');
    }
   
}
?>