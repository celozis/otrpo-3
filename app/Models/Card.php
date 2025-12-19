<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    // для мира
    public function getReleaseDateWorldAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d.m.Y') : null;
    }
    public function setReleaseDateWorldAttribute($value)
    {
        $this->attributes['release_date_world'] = Carbon::parse($value)->format('Y-m-d');
    }

    // для россии
    public function getReleaseDateRussiaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d.m.Y') : null;
    }

    public function setReleaseDateRussiaAttribute($value)
    {
        $this->attributes['release_date_russia'] = Carbon::parse($value)->format('Y-m-d');
    }
}
