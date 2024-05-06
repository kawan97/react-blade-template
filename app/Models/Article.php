<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    //language relationship
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
