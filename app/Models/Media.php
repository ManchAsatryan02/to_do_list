<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // Unlink image function
    public function delete()
    {
        // Get image path
        $imagePath = 'images/'.$this->img;
        
        // Check file exist or not
        if (file_exists($imagePath)) {
            // Unlink
            unlink($imagePath);
        }

        // Delete operation
        return parent::delete();
    }
}
