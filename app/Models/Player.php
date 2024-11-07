<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'back_number','height', 'weight', 'position', 'dominant_foot', 'team_id', 'rating','profile_photo','cover_photo',
    ];

    // Define the relationship with Team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
