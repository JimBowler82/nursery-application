<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centre extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'description',
    ];

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }


    /**
     * Scope query where type is centre
     *
     * @param $query
     * @return mixed
     */
    public function scopeCentre($query)
    {
        return $query->where('type', 'centre');
    }

    /**
     * Scope query where type is setting
     *
     * @param $query
     * @return mixed
     */
    public function scopeSetting($query)
    {
        return $query->where('type', 'setting');
    }
}
