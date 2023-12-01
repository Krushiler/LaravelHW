<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class ScheduledPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'scheduled_at',
        'is_completed'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
