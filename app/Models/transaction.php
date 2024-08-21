<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_user',
        'quantite',
        'date_transaction',
        'reference_article',
        'emplacement'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
