<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //created relations cscm

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPostImageAttribute($value) {
        
        return asset($value);
        }

}
