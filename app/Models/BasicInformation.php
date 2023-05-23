<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'documentable');
    }

    public function lot_amortizations()
    {
        return $this->hasMany(
            BasicInformationLotAmortization::class,
            'basic_information_id'
        );
    }

    public function taxes()
    {
        return $this->hasMany(Tax::class, 'basic_information_id');
    }

    public function actuals()
    {
        return $this->hasMany(Actual::class, 'basic_information_id');
    }
}
