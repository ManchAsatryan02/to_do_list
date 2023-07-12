<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
    
class ToDo extends Model
{
    use HasFactory;
     
    protected $with = [
        'images', 'tags'
    ];

    public function tags(): HasMany {
        return $this->hasMany(Tag::class, 'to_do_id', 'id');
    }

    public function images(): HasMany {
        return $this->hasMany(Media::class, 'to_do_id', 'id');
    }

    public function list(): HaOne {
        return $this->hasOne(ToDoList::class, 'id', 'list_id');
    }
}
