<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnail()
    {
        return asset('/images/' . $this->thumbnail);
    }

    public function getCountContent($user)
    {
        return $this->where('user_id', $user)->count();
    }

    public function getCountContentPublish($user)
    {
        return $this->where('user_id', $user)->where('status_publish', 1)->count();
    }

    public function getCountContentNotPublish($user)
    {
        return $this->where('user_id', $user)->where('status_publish', 0)->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
