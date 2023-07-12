<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tag extends Model
{
    use HasFactory;

    public function to_dos(): HasOne {
        return $this->hasOne(ToDo::class, 'to_do_id', 'id');
    }
}
