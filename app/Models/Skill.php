<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lawyer_id',
        'list_skill_id',
    ];
    
    /**
     * get the lawyer that owns this answering
     * 
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function skill()
    {
        return $this->hasOne(ListSkill::class);
    }
    
}
