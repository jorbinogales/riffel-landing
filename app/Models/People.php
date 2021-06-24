<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class People extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email'
    ];

    /**
     * Get all questions from people
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
