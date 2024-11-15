<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function category () {
        return $this->belongsTo(Category::class);
    }
}
