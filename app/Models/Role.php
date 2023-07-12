<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Role extends Model
{
    use HasFactory;

    public function user(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function owner(): HasOne {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function list(): HasOne {
        return $this->hasOne(ToDoList::class, 'id', 'list_id');
    }
}
