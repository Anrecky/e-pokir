<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
