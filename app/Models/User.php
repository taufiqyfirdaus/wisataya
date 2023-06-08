<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getImage()
    {
        if($this->image == null){
            return asset('/images/profile/default.png');
        }
        return asset('/images/' . $this->image);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function ownsContent(Content $content)
    {  
        return auth()->id() === $content->user->id;   
    }
    public function ownsBudaya( Budaya $budaya)
    {  
        return auth()->id() === $budaya->user->id;   
    }
    public function ownsPenginapan( Penginapan $penginapan)
    {  
        return auth()->id() === $penginapan->user->id;   
    }
}
