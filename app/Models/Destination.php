<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'location',
        'photo_path',
        'estimated_price',
        'approval_status',
    ];
    // protected $guarded = ['approval_status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
