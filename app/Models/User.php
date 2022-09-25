<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }
    public function district()
    {
        return $this->subDistrict->district;
    }
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
    public function scopeWhereDistrict($q, $name)
    {
        return $q->with(['subDistrict.district'])->whereHas('subDistrict', function ($query) use ($name) {
            return $query->whereHas('district', function ($qd) use ($name) {
                return $qd->where('name', 'like', "%$name%");
            });
        });
    }
}