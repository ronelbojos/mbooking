<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date_start',
        'date_end',
    ];

    public function setDateStartAttribute($dateStart)
    {
        $this->attributes['date_start'] = Carbon::parse($dateStart);
    }

    public function setDateEndAttribute($dateEnd)
    {
        $this->attributes['date_end'] = Carbon::parse($dateEnd);
    }
}
