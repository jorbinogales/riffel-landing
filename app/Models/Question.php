<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text',
        'people_id',
    ];

    /**
     * Get people that owns the question
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function people()
    {
        return $this->belongsTo(People::class);
    }

    /**
     * Get answering that owns the question
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answering()
    {
        return $this->hasOne(Answering::class);
    }


}
