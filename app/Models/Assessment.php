<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [
        'centreSetting',
        'user'
    ];

    protected $casts = [
        'questionData' => 'array',
        'completed' => 'boolean'
    ];

    public function centreSetting()
    {
        return $this->belongsTo(Centre::class, 'centre_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function getTotalNumberOfQuestionsAttribute()
    {
        return Question::count();
    }

    public function getTotalNumberOfQuestionsAnsweredAttribute()
    {
        return collect($this->questionData)->reduce(function ($acc, $subscale) {
            return $acc + collect($subscale['items'])->reduce(function ($acc, $item) {
                    return $acc + collect($item['questions'])->filter(function ($question) {
                            return !is_null($question['checked']);
                        })->count();
                }, 0);
        }, 0);

    }

    public function getCompletedValueAttribute()
    {
        return collect($this->questionData)->every(function($subscale) {
            return collect($subscale['items'])->every(function($item){
                return collect($item['questions'])->every( function($question) {
                    return !is_null($question['checked']);
                } );
            });
        });
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    public function scopeInProgress($query)
    {
        return $query->where('completed', false);
    }
}
