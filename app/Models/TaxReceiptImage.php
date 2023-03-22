<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxReceiptImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }
}
