<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name','price','location'];

    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class, 'event_id', 'id');
    }
}
