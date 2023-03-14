<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInformationLotAmortization extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function basic_information()
    {
        return $this->belongsTo(BasicInformation::class, "basic_information_id");
    }
}
