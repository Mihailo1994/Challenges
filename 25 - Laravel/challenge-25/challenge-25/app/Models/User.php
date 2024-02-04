<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    public function discussion() {
        return $this->hasMany(Discussion::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}


