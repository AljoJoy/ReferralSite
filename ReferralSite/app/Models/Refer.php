<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    use HasFactory;

    protected $fillable = [
        'refer_id',
        'referral_text',
        'level',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'refer_id','id');
    }
}
