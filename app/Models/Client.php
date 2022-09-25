<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory;

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
}
