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

    public function proposals()
    {
        return $this->belongsToMany(Proposal::class);
    }

    public function areaOfElection()
    {
        return $this->belongsTo(AreaOfElection::class);
    }
    public function fraction()
    {
        return $this->belongsTo(Fraction::class);
    }
    public function scopeIsNotAdmin($query)
    {
        return $query->where('is_admin', 0);
    }
    public function scopeDistrictID($query, $id)
    {
        return $query->whereHas('areaOfElection', function ($query) use ($id) {
            $query->whereHas('districts', function ($q) use ($id) {
                $q->where('id', $id);
            });
        });
    }
}
