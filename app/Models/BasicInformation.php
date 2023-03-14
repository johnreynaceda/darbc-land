<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lot_amortizations()
    {
        return $this->hasMany(BasicInformationLotAmortization::class, "basic_information_id");
    }

    public function tax()
    {
        return $this->hasMany(Tax::class, "basic_information_id");
    }


    public function actual()
    {
        return $this->hasMany(Actual::class, "basic_information_id");
    }
}
