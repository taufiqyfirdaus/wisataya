<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = array('*');

    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class, 'id_penginapan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
