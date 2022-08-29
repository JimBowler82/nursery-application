<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // relation - subscale
    public function subscale()
    {
        return $this->belongsTo(Subscale::class);
    }

    // relation - questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
