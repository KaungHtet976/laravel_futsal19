<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','blog_id'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function video(){
        return $this->belongsTo(video::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
