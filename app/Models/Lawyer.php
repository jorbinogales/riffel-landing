<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lawyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth',
        'picture'
    ];

    /**
     * @param Illuminate\Database\Eloquent\Relations\HasMany;
     */

    public function answerings()
    {
        return $this->hasMany(Answering::class);
    }

    /**
     * @param Illuminate\Database\Eloquent\Relations\HasMany;
     */

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

     /**
     * @param Illuminate\Database\Eloquent\Relations\HasMany;
     */

    public function rewards()
    {
        return $this->hasMany(Rewards::class);
    }
    
    
}
