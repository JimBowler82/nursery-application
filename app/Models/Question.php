<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $appends = ['checked'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function getCheckedAttribute()
    {
        return null;
    }
}
