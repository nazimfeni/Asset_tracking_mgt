<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'asset_type_id',
        'description',
        'purchase_date',
        'purchase_price',
        'condition',
        'location',
        'used_by',
        'status',
    ];
}
