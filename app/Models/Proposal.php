<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTimeInterface;

class Proposal extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function scopeDraft($q, $isDraft = 1)
    {
        return $q->where('is_draft', $isDraft);
    }
    protected function serializeDate(DateTimeInterface $dates)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dates)->format('d-m-Y');
    }
}
