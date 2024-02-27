<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'region_id',
        'user_id',
        'overview',
        'thumbnail',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookmark()
    {
        return $this->hasOne(Bookmark::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearch($query, $params)
    {
        if (!empty($params['genre_id'])) {
            $query->where('genre_id', $params['genre_id']);
        }
        if (!empty($params['region_id'])) {
            $query->where('region_id', $params['region_id']);
        }
        if(!empty($params['keyword'])) {
            $query->where('name' , 'like', '%' . $params['keyword'] . '%');
        }
    }

    public function scopeRegionSearch($query, $params)
    {
        if (!empty($region_id)) {
            $query->where('region_id', $region_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)) {
            $query->where('name' , 'like', '%' . $keyword . '%');
        }
    }
}
