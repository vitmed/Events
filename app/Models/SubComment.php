<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    protected $table = 'sub_comments';

    protected $fillable = ['text','comment_id'];

    use HasFactory;

    public function comment()
    {
        return $this->belongsTo(Event::class, 'comment_id','id' );
    }
}
