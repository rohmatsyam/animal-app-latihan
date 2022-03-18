<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;
    protected $fillable = [
        'description'
    ];
    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}
