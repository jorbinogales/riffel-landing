<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelognsTo;

class Rewards extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unid',
        'lawyer_id',
    ];


    /**
     * get the lawyer that owns this answering
     * 
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function lawyer(){
        return $this->belongsTo(Lawyer::class);
    }

}
