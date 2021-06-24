<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answering extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text',
        'lawyer_id',
        'question_id',
    ];

    /**
     * get the questing parent that this answering
     * 
     * @param Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * get the lawyer that owns this answering
     * 
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
