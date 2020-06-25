<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'user_id',
        'text',
        'date',
        'priority',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
