<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscale extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Item::class);
    }
}
