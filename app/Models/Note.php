<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Note extends Model {
    use HasUuids;

    protected $fillable = ['user_id', 'name', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}