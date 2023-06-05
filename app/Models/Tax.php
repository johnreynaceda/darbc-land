<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function basicInformation()
    {
        return $this->belongsTo(BasicInformation::class);
    }

    public function tax_receipt()
    {
        return $this->hasOne(TaxReceiptImage::class);
    }
}
