<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnail()
    {
        return asset('/images/' . $this->thumbnail);
    }

    public function getCountPenginapan($user)
    {
        return $this->where('user_id', $user)->count();
    }

    public function getCountPenginapanPublish($user)
    {
        return $this->where('user_id', $user)->where('status_publish', 1)->count();
    }

    public function getCountPenginapanNotPublish($user)
    {
        return $this->where('user_id', $user)->where('status_publish', 0)->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
