<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['text','event_id'];

    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id','id' );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
