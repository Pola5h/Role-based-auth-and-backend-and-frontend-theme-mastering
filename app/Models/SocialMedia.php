<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
