<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lawyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'birth',
        'picture',
        'user_id',
    ];

 

    /**
     * @param Illuminate\Database\Eloquent\Relations\HasOne;
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


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
