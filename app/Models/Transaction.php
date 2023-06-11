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
        return $this->belongsTo(Penginapan::class);
    }

}
