<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualLotFieldNumbers extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function basicInformation()
    {
        return $this->belongsTo(BasicInformation::class);
    }
}
