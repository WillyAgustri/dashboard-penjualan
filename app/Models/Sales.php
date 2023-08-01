<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $fillable = [
        'product_id',
        'product_name',
        'brand',
        'picture',
        'quantity',
        'price',
    ];

    public $primaryKey = 'product_id';

    public $incrementing = false;

    protected $keyType = 'string';
}