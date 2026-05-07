<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gradient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'colour_start',
        'colour_end',
        'angle',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cssValue(): string
    {
        return "linear-gradient({$this->angle}deg, {$this->colour_start}, {$this->colour_end})";
    }
}
