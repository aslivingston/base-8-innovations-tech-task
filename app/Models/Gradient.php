<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gradient extends Model
{
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
