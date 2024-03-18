<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Num extends Model
{
    use HasFactory;
    protected $fillable = ['num'];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
