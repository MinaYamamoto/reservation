<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'time'
    ];

    protected $casts = [
        'time' => 'datetime',
    ];

    public function reservation() {
        return $this->hasMany(Reservation::class);
    }

}
